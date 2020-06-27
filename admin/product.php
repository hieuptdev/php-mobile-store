<?php
include_once('header.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <?php if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
        } ?>
        <a href="add_product.php?tit=add_product" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            //thuat toan phan trang
                            $rows_per_page = 5;
                            $per_rows = $page * $rows_per_page - $rows_per_page;

                            $total_rows = mysqli_num_rows(mysqli_query($conn, "select * from product"));
                            $total_pages = ceil($total_rows / $rows_per_page);
                            $list_page = '';
                            //trang truoc
                            $page_prev = $page - 1;
                            if ($page_prev == 0) {
                                $page_prev = 1;
                            }

                            //phan trang giao dien
                            $list_page = '<li class="page-item"><a class="page-link" href="product.php?tit=product&page=' . $page_prev . '">&laquo</a></li>';

                            for ($i = 1; $i <=  $total_pages; $i++) {
                                $list_page .= '<li class="page-item"><a class="page-link" href="product.php?tit=product&page=' . $i . '">' . $i . '</a></li>';
                            }

                            //trang sau
                            $next_page = $page + 1;
                            if ($next_page > $total_pages) {
                                $next_page = $total_pages;
                            }

                            $list_page .= ' <li class="page-item"><a class="page-link" href="product.php?tit=product&page=' . $next_page . '">&raquo;</a></li>';
                            $sql = "Select * from product 
                                    inner join category 
                                    on product.cat_id= category.cat_id
                                    ORDER BY prd_id DESC
                                    limit $per_rows,$rows_per_page";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                            <tr>

                                <td style=""><?php echo $row['prd_id']; ?></td>
                                <td style=""><?php echo $row['prd_name']; ?></td>
                                <td style=""><?php echo $row['prd_price']; ?>vnd</td>
                                <td style="text-align: center"><img width="130" height="180" src="img/products/<?php echo $row['prd_image']; ?>"></td>
                                <td><span class="label label-<?php if ($row['prd_status'] == 1) {
                                                                        echo 'success';
                                                                    } else {
                                                                        echo 'danger';
                                                                    }
                                                                    ?>">
                                        <?php if ($row['prd_status'] == 1) {
                                                echo 'Còn hàng';
                                            } else {
                                                echo 'Hết Hàng';
                                            }
                                            ?> </span></td>
                                <td><?php echo $row['cat_name']; ?></td>
                                <td class="form-group">
                                    <a href="edit_product.php?tit=edit_product&prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <!-- <a href="del_product.php?prd_id=<?php echo $row['prd_id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
                                    <a type="button" class="btn btn-primary btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="glyphicon glyphicon-remove"></i></a>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalCenterTitle"><strong>Xác Nhận Xoá</strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xoá sản phẩm này !!!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <a type="button" href="del_product.php?prd_id=<?php echo $row['prd_id'] ?>" class="btn btn-danger">Xoá</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $list_page ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<?php
include_once('footer.php');
?>