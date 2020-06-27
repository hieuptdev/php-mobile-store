<?php
$str = "AAA BBB CCC DDD";
//EXPLODE
$arr = explode(' ', $str);
//IMPLODE
$str2 = implode('%', $arr);
$str2 = '%' . $str2 . '%';
// echo $str2;
//AAA%BBB%CCC%DDD

date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('Y-m-d H:i:s');
