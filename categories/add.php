<?php
require_once '../component/connection.php';

if($_POST){

    $data = [
        "category_name" => $_POST['category_name'],
    ];

    $result = $crud->common_insert('categories', $data);

    if($result['status']){
        $_SESSION['message'] = array(
            "type" => "success",
            "title" => "Success",
            "message" => "Category added successfully."
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
