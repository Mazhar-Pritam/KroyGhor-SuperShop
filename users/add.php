<?php
require_once '../component/connection.php';

$error_message = "";

// Required field check
if(empty($_POST['role_id']) || empty($_POST['full_name']) || empty($_POST['email']) ||
   empty($_POST['password']) || empty($_POST['confirm_password'])){
    $error_message = "Please fill in all required fields.";
}

// Email format check
if(empty($error_message) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $error_message = "Please enter a valid email address.";
}

// Duplicate email check
if(empty($error_message)){
    $existing = $crud->common_select('users', '*', ['email' => $_POST['email']]);
    if($existing['status']){
        $error_message = "This email is already registered.";
    }
}

// Password length check
if(empty($error_message) && strlen($_POST['password']) < 6){
    $error_message = "Password must be at least 6 characters long.";
}

// Password confirmation check
if(empty($error_message) && $_POST['password'] !== $_POST['confirm_password']){
    $error_message = "Password and Confirm Password do not match.";
}

if(!empty($error_message)){
    $_SESSION['message'] = array(
        "type" => "danger",
        "title" => "Error",
        "message" => $error_message
    );
    echo "<script>window.location='create.php'</script>";
    exit;
}

$data = [
    "role_id" => $_POST['role_id'],
    "full_name" => $_POST['full_name'],
    "email" => $_POST['email'],
    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
    "phone" => $_POST['phone'],
    "status" => $_POST['status'],
    "created_at" => date('Y-m-d H:i:s'),
    "created_by" => $_SESSION['user_id']
];

$result = $crud->common_insert('users', $data);

if($result['status']){
    $_SESSION['message'] = array(
        "type" => "success",
        "title" => "Success",
        "message" => "User added successfully."
    );
    echo "<script>window.location='list.php'</script>";
} else {
    $_SESSION['message'] = array(
        "type" => "danger",
        "title" => "Error",
        "message" => $result['message']
    );
    echo "<script>window.location='create.php'</script>";
}
