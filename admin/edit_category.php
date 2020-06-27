<?php
include_once('header.php');
$cat_id = $_GET['cat_id'];
$sql_ctgr = "select * from category where cat_id=$cat_id";
$query_ctgr = mysqli_query($conn, $sql_ctgr);
$row_ctgr = mysqli_fetch_array($query_ctgr);
if (isset($_POST['sbm'])) {
	$cat_name = $_POST['cat_name'];
	$sql = "update category 
	set cat_name='$cat_name '
	where cat_id=$cat_id";
	mysqli_query($conn, $sql);
	header('location:category.php');
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li><a href="">Quản lý danh mục</a></li>
			<li class="active">Danh mục 1</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục:Danh mục 1</h1>
		</div>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-8">
						<!-- <div class="alert alert-danger">Danh mục đã tồn tại !</div> -->
						<form role="form" method="post">
							<div class="form-group">
								<label>Tên danh mục:</label>
								<input type="text" name="cat_name" required value="<?php echo $row_ctgr['cat_name']; ?>" class="form-control" placeholder="Tên danh mục...">
							</div>
							<button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
							<button type="reset" class="btn btn-default">Làm mới</button>
					</div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div>
	<!--/.main-->

	<?php
	include_once('footer.php');
	?>