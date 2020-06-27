<?php
    include_once('header.php');
    $cat_id=$_GET['cat_id'];
    $sql="delete from category where cat_id=$cat_id";
    $query=mysqli_query($conn,$sql);
    header('location:category.php');

?>