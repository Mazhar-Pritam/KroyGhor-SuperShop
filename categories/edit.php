<?php
require_once '../component/connection.php';

if($_POST){

    $id = $_POST['id'];

    $data = [
        "name"        => $_POST['name'],
        "description" => $_POST['description'],
    ];

    $result = $crud->common_update('categories', $data, ["categories_id" => $id]);

    if($result['status']){
        $_SESSION['message'] = array(
            "type" => "success",
            "title" => "Success",
            "message" => "Category updated successfully."
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
