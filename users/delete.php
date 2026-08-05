<?php
require_once '../component/connection.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    if($id == $_SESSION['user_id']){
        $_SESSION['message'] = array(
            "type" => "danger",
            "title" => "Error",
            "message" => "You cannot delete your own account."
        );
        echo "<script>window.location='list.php'</script>";
        exit;
    }

    // Soft delete: never permanently remove a user
    $data = [
        "deleted_at" => date('Y-m-d H:i:s'),
        "updated_at" => date('Y-m-d H:i:s'),
        "updated_by" => $_SESSION['user_id']
    ];

    $result = $crud->common_update('users', $data, ["id" => $id]);

    if($result['status']){
        $_SESSION['message'] = array(
            "type" => "success",
            "title" => "Deleted",
            "message" => "User deleted successfully."
        );
    } else {
        $_SESSION['message'] = array(
            "type" => "danger",
            "title" => "Error",
            "message" => $result['message']
        );
    }
}

echo "<script>window.location='list.php'</script>";
