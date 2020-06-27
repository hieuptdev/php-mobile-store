<style>

</style>
<?php
$sql = "select * from product
        where prd_featured=1
        Limit 6";
$query = mysqli_query($conn, $sql);
?>
<div class="products">
    <h3>Sản phẩm nổi bật</h3>
    <?php $i = 0;
    while ($row = mysqli_fetch_array($query)) {
        if ($i == 0) { ?>
    <div class="product-list card-deck">
        <?php } ?>
        <div class="product-item card text-center " title="<?php echo $row['prd_details']; ?>">
            <a class="test" href="../product/product.php?prd_id=<?php echo $row['prd_id']; ?>">
                <figure class="imghvr-fade" style="background-color:white;">
                    <img src="../../admin/img/products/<?php echo $row['prd_image']; ?>" alt="Vietpro Academy">
                    <figcaption style="background-color:white; color:black;">
                        <p style="font-size:9px;"><?php echo $row['prd_details']; ?></p>
                    </figcaption>
                </figure>
            </a>
            <h4><a href="../product/product.php?prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name'] ?></a></h4>
            <p>Giá Bán: <span><?php echo $row['prd_price']; ?>đ</span></p>
        </div>

        <?php $i++;
            if ($i == 3) {
                $i = 0;
                ?>
    </div>
    <?php } ?>
    <?php } ?>
</div>