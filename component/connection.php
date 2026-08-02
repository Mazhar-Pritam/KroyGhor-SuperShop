<?php
    session_start();
    $base_url = "http://localhost/kroyghor-supershop/";
    require_once  ($_SERVER['DOCUMENT_ROOT'] . "/kroyghor-supershop/crud/crud_class.php");
    $crud = new crud_class();
?>