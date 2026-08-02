<?php
require_once '../component/connection.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $result = $crud->common_delete('categories', ["id" => $id]);

    if($result['status']){
        $_SESSION['message'] = array(
            "type" => "success",
            "title" => "Success",
            "message" => "Category deleted successfully."
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
