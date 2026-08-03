<?php
require_once '../component/connection.php';

 $crud->conn->begin_transaction();

    $data = [
        "product_name" => $_POST['product_name'],
        "purchase_price" => $_POST['purchase_price'],
        "selling_price" => $_POST['selling_price'],
        "barcode" => $_POST['barcode'],
        "category_id" => $_POST['category_id'],
        "supplier_id" => $_POST['supplier_id'],
        "brand" => $_POST['brand'],
        "created_at" => date('Y-m-d H:i:s'),
        "created_by" => $_SESSION['user_id']
    ];

    $result = $crud->common_insert('products', $data);

    if($result['status']){
        // set opening balance for the product in stock_transfers table
        $stock_data = [
            "product_id" => $result['data'],
            "quantity" => $_POST['opening_stock'],
            "status" => 1,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => $_SESSION['user_id']
        ];
        $crud->common_insert('stock_transfers', $stock_data);
        if($result['status']){
            $crud->conn->commit();
             $_SESSION['message'] = array(
                "type" => "success",
                "title" => "Success",
                "message" => "Product added successfully."
            );
        } else {
            $crud->conn->rollback();
                $_SESSION['message'] = array(
                    "type" => "danger",
                    "title" => "Error",
                    "message" => $result['message']
                );
        }

       
    } else {
        $_SESSION['message'] = array(
            "type" => "danger",
            "title" => "Error",
            "message" => $result['message']
        );
    }


echo "<script>window.location='list.php'</script>";
