<?php
include_once('header.php');
$prd_id = $_GET['prd_id'];
$sql_prd = "select * from product
            where prd_id=$prd_id";
$query_prd = mysqli_query($conn, $sql_prd);
$row_prd = mysqli_fetch_array($query_prd);

if (isset($_POST['sbm'])) {
    //Form element basic 

    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_warranty = $_POST['prd_warranty'];
    $prd_accessories = $_POST['prd_accessories'];
    $prd_promotion = $_POST['prd_promotion'];
    $prd_new = $_POST['prd_new'];

    //Form element advance
    //Product thumbnail
    $prd_image = $_FILES['prd_image']['name'];

    if ($prd_image == '') {
        $prd_image = $row_prd['prd_image'];
    } else {
        $prd_tmp_image = $_FILES['prd_image']['tmp_name'];
        move_uploaded_file($prd_tmp_image, 'img/products/' . $prd_image);
    }

    //Category
    $cat_id = $_POST['cat_id'];

    //Product status
    $prd_status = $_POST['prd_status'];

    //Product featured
    if (isset($_POST['prd_featured'])) {
        $prd_featured = $_POST['prd_featured'];
    } else {
        $prd_featured = 0;
    }

    //Product detail
    $prd_details = $_POST['prd_details'];
    $sql = "update product SET
            prd_name='$prd_name',
            prd_price=$prd_price,
            prd_warranty='$prd_warranty',
            prd_accessories='$prd_accessories',
            prd_new='$prd_new',
            prd_image='$prd_image',
            cat_id=$cat_id,
            prd_promotion='$prd_promotion',
            prd_status=$prd_status,
            prd_featured=$prd_featured,
            prd_details='$prd_details'
            where prd_id=$prd_id;
            ";
    // $sql = "insert into product(cat_id,prd_name,prd_image,prd_price,prd_warranty,prd_accessories,prd_new,prd_promotion,prd_status,prd_featured,prd_details)
    //     values('$cat_id','$prd_name','$prd_image','$prd_price','$prd_warranty','$prd_accessories','$prd_new'	,'$prd_promotion',	'$prd_status','$prd_featured','$prd_details')";
    mysqli_query($conn, $sql);
    header('location:product.php');
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row_prd">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active"><?php echo $row_prd['prd_name'] ?></li>
        </ol>
    </div>
    <!--/.row_prd-->

    <div class="row_prd">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm:<?php echo $row_prd['prd_name'] ?></h1>
        </div>
    </div>
    <!--/.row_prd-->
    <div class="row_prd">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="prd_name" required class="form-control" value="<?php echo $row_prd['prd_name']; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="prd_price" required value=<?php echo $row_prd['prd_price']; ?> class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input type="text" name="prd_warranty" required value="<?php echo $row_prd['prd_warranty']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input type="text" name="prd_accessories" required value="<?php echo $row_prd['prd_accessories']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input type="text" name="prd_promotion" required value="<?php echo $row_prd['prd_promotion']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input type="text" name="prd_new" value="<?php echo $row_prd['prd_new']; ?>" type="text" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" name="prd_image">
                            <br>
                            <div>
                                <img src="img/products/<?php echo $row_prd['prd_image'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cat_id" class="form-control">
                                <?php
                                //List category
                                $sql = "Select * from category";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                <option <?php if ($row_prd['cat_id'] == $row['cat_id']) {
                                                echo 'selected';
                                            } ?> value=<?php echo $row_prd['cat_id']; ?>><?php echo $row['cat_name']; ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                <option <?php if ($row_prd['prd_status'] == 1) {
                                            echo 'selected';
                                        } ?> value=1>Còn hàng</option>
                                <option <?php if ($row_prd['prd_status'] == 0) {
                                            echo 'selected';
                                        } ?> value=0>Hết hàng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input <?php if ($row_prd['prd_featured'] == 1) {  echo 'checked';} ?> name="prd_featured" type="checkbox" value=1>Nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="prd_details" class="form-control" row_prds="3"><?php echo $row_prd['prd_details'] ?></textarea>
                        </div>
                        <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row_prd -->

</div>
<!--/.main-->
<?php
include_once('footer.php');
?>