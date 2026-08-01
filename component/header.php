<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/kroyghor-supershop/component/connection.php";
    if(!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']){
        echo "<script>window.location='{$base_url}login.php'</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.dashboardpack.com/adminty-html/pages/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jul 2026 05:05:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Adminty - Premium Admin Template by Colorlib</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="https://demo.dashboardpack.com/adminty-html/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&amp;display=swap" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/icon/icofont/css/icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/icon/feather/css/feather.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/plugins/%40fortawesome/fontawesome-free/css/all.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/css/theme/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/css/notification.css">
</head>


<body>
    <!-- Pre-loader start -->
    <!-- <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Pre-loader end -->
    <!-- Pre-loader end -->
    
