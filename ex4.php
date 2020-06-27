<?php
// $course = array(
//     'mon hoc 1' => 'HTML & CSS',
//     'mon hoc 2' => 'PHP & MYSQL'
// );
// $arr = array(
//     'khoa hoc' => $course,
//     'thoi gian' => '6 thang'
// );
// //Duyệt mảng
// foreach ($arr['khoa hoc'] as $value) {
//     echo $value.'<br>';
// }


// $_SESSION['cart']['prd_id']=soluong;
$_SESSION['cart'][22] = 3;
$_SESSION['cart'][5] = 1;
$_SESSION['cart'][16] = 6;
$_SESSION = array(
        'cart' => array(16 => 6)
);
