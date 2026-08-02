<?php
require_once '../component/connection.php';

if($_POST){

    $id = $_POST['id'];

    $category_id = !empty($_POST['category_id']) ? $_POST['category_id'] : null;
    $supplier_id = !empty($_POST['supplier_id']) ? $_POST['supplier_id'] : null;
    $expiry_date = !empty($_POST['expiry_date']) ? $_POST['expiry_date'] : null;

    $data = [
        "category_id"    => $category_id,
        "supplier_id"    => $supplier_id,
        "product_name"   => $_POST['product_name'],
        "brand"          => $_POST['brand'],
        "purchase_price" => $_POST['purchase_price'],
        "selling_price"  => $_POST['selling_price'],
        "stock"          => $_POST['stock'],
        "expiry_date"    => $expiry_date,
        "barcode"        => $_POST['barcode'],
    ];

    $result = $crud->common_update('products', $data, ["product_id" => $id]);

    if($result['status']){
        $_SESSION['message'] = array(
            "type" => "success",
            "title" => "Success",
            "message" => "Product updated successfully."
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
