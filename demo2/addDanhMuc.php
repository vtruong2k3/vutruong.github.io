<?php
include_once("connect.php");
$tenHangXe="";
$errTenHangXe="";
$check=true;
$sql="SELECT*FROM danhmuc";
$result=$conn->query($sql);

if(isset($_POST["submit"])){
    $tenHangXe=$_POST["tenHangXe"];

    if(empty($tenHangXe)){
        $errTenHangXe="vui long không để trống";
        $check=false;

    }

    if($check){
        $sql="INSERT INTO danhmuc (tenHangXe) VALUES ('$tenHangXe')";
        $result=$conn->query($sql);
        if($result){
            header("Location: danhmuc.php");
        }
    }
}

?>

<form action="addDanhMuc.php" method="post">
    <label for="">Tên hãng xe</label>
    <input type="text" name="tenHangXe" value="<?= $tenHangXe?>"><span style="coler:red"><?=$errTenHangXe?></span><br>
    <input type="submit" name="submit" value="Gửi">
</form>