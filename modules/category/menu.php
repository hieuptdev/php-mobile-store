<?php
$sql = "select * from category order by cat_id ASC";
$query = mysqli_query($conn, $sql);
?>
<div id="menu" class="collapse navbar-collapse">
    <ul>
        <?php while ($row = mysqli_fetch_array($query)) { ?>
            <li class="menu-item"><a href="../category/category.php?cat_id=<?php echo $row['cat_id']; ?>&cat_name=<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></a></li>
        <?php } ?>
    </ul>
</div>