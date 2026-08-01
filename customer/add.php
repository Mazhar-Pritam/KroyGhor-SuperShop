<?php
require_once '../component/connection.php';

if($_POST){

    $data = [
        "name"            => $_POST['name'],
        "gender"          => $_POST['gender'],
        "phone"           => $_POST['phone'],
        "email"           => $_POST['email'],
        "address"         => $_POST['address'],
        "membership_type" => $_POST['membership_type'],
    ];

    $result = $crud->common_insert('customers', $data);

    if($result['status']){
        $_SESSION['message'] = array(
            "type" => "success",
            "title" => "Success",
            "message" => "Customer added successfully."
        );
    } else {
        $_SESSION['message'] = array(
            "type" => "danger",
            "title" => "Error",
            "message" => $result['message']
        );
    }
}

echo "<script>window.location='create.php'</script>";
