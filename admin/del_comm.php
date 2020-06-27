<?php include_once('header.php');
    $comm_id = $_GET['comm_id'];
    $sql = "Delete from comment
        where comm_id= $comm_id";
    $query = mysqli_query($conn, $sql);
    header('location:comment.php');
