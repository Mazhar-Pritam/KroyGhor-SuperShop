<?php
    session_start();
    $base_url = "http://localhost/KroyGhor-SuperShop/";
    require_once  ($_SERVER['DOCUMENT_ROOT'] . "/KroyGhor-SuperShop/crud/crud_class.php");
    $crud = new crud_class();
?>