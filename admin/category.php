<?php
include_once('header.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Quản lý danh mục</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div>
	<!--/.row-->
	<div id="toolbar" class="btn-group">
		<a href="add_category.php?tit=add_category" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> Thêm danh mục
		</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table data-toolbar="#toolbar" data-toggle="table">

						<thead>
							<tr>
								<th data-field="id" data-sortable="true">ID</th>
								<th>Tên danh mục</th>
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
							$rows_per_page = 3;
							$per_rows = $page * $rows_per_page - $rows_per_page;

							$total_rows = mysqli_num_rows(mysqli_query($conn, "select * from category"));
							$total_pages = ceil($total_rows / $rows_per_page);
							$list_page = '';
							$page_prev = $page - 1;
							if ($page_prev == 0) {
								$page_prev = 1;
							}

							$list_page .= '<li class="page-item"><a class="page-link" href="category.php?tit=category&page=' . $page_prev . '">&laquo;</a></li>';


							for ($i = 1; $i <= $total_pages; $i++) {
								$list_page .= '<li class="page-item"><a class="page-link" href="category.php?tit=category&page=' . $i . '">' . $i . '</a></li>';
							}
							$page_next = $page + 1;
							if ($page_next > $total_pages) {
								$page_next = $total_pages;
							}
							$list_page .= '<li class="page-item"><a class="page-link" href="category.php?tit=category&page=' . $page_next . '">&raquo;</a></li>';


							$sql = "select * from category 
							limit $per_rows,$rows_per_page";
							$query = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($query)) {
								?>

								<tr>
									<td style=""><?php echo $row['cat_id']; ?></td>
									<td style=""><?php echo $row['cat_name']; ?></td>
									<td class="form-group">
										<a href="edit_category.php?tit=edit_category&cat_id=<?php echo $row['cat_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
										<a href="del_category.php?tit=edit_category&cat_id=<?php echo $row['cat_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
									</td>
								</tr>
							<?php  } ?>
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