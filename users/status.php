<?php
require_once '../component/connection.php';

if(isset($_GET['id']) && isset($_GET['status'])){

    $id = $_GET['id'];
    $status = $_GET['status'];

    // Only Active / Inactive are valid values for this column
    if($status !== 'Active' && $status !== 'Inactive'){
        $_SESSION['message'] = array(
            "type" => "danger",
            "title" => "Error",
            "message" => "Invalid status value."
        );
        echo "<script>window.location='list.php'</script>";
        exit;
    }

    if($id == $_SESSION['user_id']){
        $_SESSION['message'] = array(
            "type" => "danger",
            "title" => "Error",
            "message" => "You cannot change your own status."
        );
        echo "<script>window.location='list.php'</script>";
        exit;
    }

    $data = [
        "status" => $status,
        "updated_at" => date('Y-m-d H:i:s'),
        "updated_by" => $_SESSION['user_id']
    ];

    $result = $crud->common_update('users', $data, ["id" => $id]);

    if($result['status']){
        $_SESSION['message'] = array(
            "type" => "success",
            "title" => "Success",
            "message" => $status == 'Active' ? "User activated successfully." : "User deactivated successfully."
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
