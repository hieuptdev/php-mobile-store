<form method="post">
    <input name="mua[]" type="checkbox" value="Xuân"> Xuan 
    <input name="mua[]" type="checkbox" value="Hạ"> Ha
    <input name="mua[]" type="checkbox" value="Thu"> Thu
    <input name="mua[]" type="checkbox" value="Đông"> Dong
    <input name="sbm" type="submit" value="Send">
</form>
<?php 
if(isset($_POST['sbm'])){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    foreach ($_POST['mua'] as $value) {
        
        echo $value.'<br>';
    }
} 
?>
