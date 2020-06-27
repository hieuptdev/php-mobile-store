<?php include_once('header.php');
    $prd_id = $_GET['prd_id'];
    $sql = "Delete from product
        where prd_id= $prd_id";
    $query = mysqli_query($conn, $sql);
    header('location:product.php');
