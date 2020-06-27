<?php
include_once('../../template/header.php');
$cat_id = $_GET['cat_id'];
$cat_name = $_GET['cat_name'];
$sql = "select * from product
        where cat_id=$cat_id";
$query = mysqli_query($conn, $sql);
mysqli_num_rows($query);

?>
<style></style>
<!--	List Product	-->
<div class="products">
    <h3><?php echo $cat_name ?> (hiện có <?php echo mysqli_num_rows($query); ?> sản phẩm)</h3>
    <?php $i = 0;
    while ($row = mysqli_fetch_array($query)) {
        if ($i == 0) { ?>
            <div class="product-list card-deck">
            <?php } ?>
            <div class="product-item card text-center">
                <a href="../product/product.php?prd_id=<?php echo $row['prd_id']; ?>">
                
                <figure class="imghvr-fade" style="background-color:white;">
                    <img src="../../admin/img/products/<?php echo $row['prd_image']; ?>" alt="Vietpro Academy">
                    <figcaption style="background-color:white; color:black;">
                        <p style="font-size:9px;"><?php echo $row['prd_details']; ?></p>
                    </figcaption>
                </figure>
            </a>
                <h4><a href="../product/product.php?prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
                <p>Giá Bán: <span><?php echo $row['prd_price']; ?>đ</span></p>
            </div>
            <div class="mask"></div>
            <?php
            $i++;
            if ($i == 3) {
                $i = 0;
                ?>
            </div>
        <?php }
    }
    if ($i % 3 != 0) { ?>
    </div>
<?php } ?>

</div>
<!--	End List Product	-->
<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rows_per_page = 9;
// $per_rows = $page * $rows_per_page - $rows_per_page;
$total_rows = mysqli_num_rows(mysqli_query($conn, "select * from category order by cat_id ASC"));
$total_pages = ceil($total_rows / $rows_per_page);
$list_page = '';
for ($i = 1; $i <= $total_pages; $i++) {
    $list_page .= '' . $i . '</a></li>';
}
?>
<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="category.php?cat_id=1&cat_id=' . $cat_id . '&page=">1</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>

</div>

<?php
include_once('../../template/footer.php');
?>