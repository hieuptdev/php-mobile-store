<?php
ob_start();
session_start();
include_once('../../admin/database.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/cart.css">
    <link rel="stylesheet" href="../../css/search.css">
    <link rel="stylesheet" href="../../css/category.css">
    <link rel="stylesheet" href="../../css/product.css">
    <link rel="stylesheet" href="../../css/success.css">
    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../css/imagehover.css">
</head>

<body>


    <!--	Header	-->
    <div id="header">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <?php include_once('../logo/logo.php') ?>
                <!-- Logo -->

                <!-- search -->
                <?php include_once('../search/search_form.php'); ?>
                <!-- search -->

                <!-- Cart -->
                <?php include_once('../cart/cart_notify.php') ?>
                <!-- Cart -->

            </div>
        </div>
        <!-- Toggler/collapsibe Button -->


        <!-- Menu Responsive -->
        <?php include_once('../category/menu_responsive.php') ?>

        <!-- Menu Responsive -->


    </div>
    <!--	End Header	-->

    <!--	Body	-->
    <div id="body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav>
                        <!-- Menu -->
                        <?php include_once('../category/menu.php') ?>
                        <!-- Menu -->
                    </nav>
                </div>
            </div>
            <div class="row">
                <div id="main" class="col-lg-8 col-md-12 col-sm-12">
                    <!--	Slider	-->
                    <?php include_once('../slide/slide.php') ?>
                    <!--	End Slider	-->