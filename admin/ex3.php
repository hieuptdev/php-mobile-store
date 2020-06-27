<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rows_per_page = 5;
//thuat toans phan trang

//per_rows
$per_rows = $page * $rows_per_page - $rows_per_page;
$sql = "Select * from product 
inner join category 
on product.cat_id= category.cat_id
limit $per_rows,$rows_per_page";
