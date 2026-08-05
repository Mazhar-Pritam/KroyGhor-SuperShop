<?php
require_once '../component/connection.php';

if($_POST){
    $id = $_GET['id'];
    $error_message = "";

    // Required field check
    if(empty($_POST['role_id']) || empty($_POST['full_name']) || empty($_POST['email']) || empty($_POST['status'])){
        $error_message = "Please fill in all required fields.";
    }

    // Email format check
    if(empty($error_message) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error_message = "Please enter a valid email address.";
    }

    // Duplicate email check (excluding this user)
    if(empty($error_message)){
        $existing = $crud->common_select('users', '*', ['email' => $_POST['email']]);
        if($existing['status']){
            foreach($existing['data'] as $row){
                if($row->id != $id){
                    $error_message = "This email is already registered.";
                    break;
                }
            }
        }
    }

    // Password change is optional; validate only if provided
    $new_password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if(empty($error_message) && (!empty($new_password) || !empty($confirm_password))){
        if(strlen($new_password) < 6){
            $error_message = "Password must be at least 6 characters long.";
        } elseif($new_password !== $confirm_password){
            $error_message = "Password and Confirm Password do not match.";
        }
    }

    // Prevent a user from changing their own status
    $status = $_POST['status'];
    if($id == $_SESSION['user_id']){
        $current = $crud->common_select('users', '*', ['id' => $id]);
        if($current['status']){
            $status = $current['data'][0]->status;
        }
    }

    if(!empty($error_message)){
        $_SESSION['message'] = array(
            "type" => "danger",
            "title" => "Error",
            "message" => $error_message
        );
        echo "<script>window.location='update.php?id=$id'</script>";
        exit;
    }

    $data = [
        "role_id" => $_POST['role_id'],
        "full_name" => $_POST['full_name'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
        "status" => $status,
        "updated_at" => date('Y-m-d H:i:s'),
        "updated_by" => $_SESSION['user_id']
    ];

    if(!empty($new_password)){
        $data["password"] = password_hash($new_password, PASSWORD_DEFAULT);
    }

    $result = $crud->common_update('users', $data, ["id" => $id]);

    if($result['status']){
        $_SESSION['message'] = array(
            "type" => "success",
            "title" => "Success",
            "message" => "User updated successfully."
        );
        echo "<script>window.location='list.php'</script>";
    } else {
        $_SESSION['message'] = array(
            "type" => "danger",
            "title" => "Error",
            "message" => $result['message']
        );
        echo "<script>window.location='update.php?id=$id'</script>";
    }
}
