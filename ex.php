<?php
//I. Quy trinh kết nối MySQL
//Bước 1: Kết nỗi php với MySQL
$conn = mysqli_connect('localhost', 'root', '', 'vietpro_mobile_shop');
//BƯớc 2: Viết câu truy vấn MySQL
$sql = "Select * from user";

//Bước 3: Thực thi truy vấn SQL
$query = mysqli_query($conn, $sql);

//2. Thao tác vưới dữ liệu trả về từ câu truy vấn
echo $count = mysqli_num_rows($query);
// $arr = mysqli_fetch_array($query);

// for($i=0;$i<=$count;$i++){
//     echo $arr['user_full'];
// }
while ($arr = mysqli_fetch_array($query)) {
    echo $arr['user_mail'] .'<br>';
}
// $conn = mysqli_connect('localhost', 'root', '', 'vietpro_mobile_shop');
// $sql = "select * from user";
// $query = mysqli_query($conn, $sql);
// echo $count = mysqli_num_rows($query);
// while ($arr = mysqli_num_rows($query)) {
//     echo $arr['user_full'] ;
// }
//  echo '<pre>';
// print_r($arr);
//  echo '</pre>';
