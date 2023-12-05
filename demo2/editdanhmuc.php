<?php
include_once("connect.php");
$id="";
$tenHangXe="";
$errTenHangXe="";
$check=true;




if(isset($_GET["id"])){
    $id=$_GET["id"];
    if($id){
        try{
            $sql="SELECT*FROM danhmuc WHERE id=$id";
            $result=$conn->query($sql);
            if($result){
                $danhmuc=$result->fetch(PDO::FETCH_ASSOC);
                if($danhmuc){
                    //echo "<pre>";
                    //print_r($danhmuc);
                    $id=$danhmuc["id"];
                    $tenHangXe=$danhmuc["tenHangXe"];
                }
            }
        }catch(\Throwable){
            echo "không thấy dữ liệu";
            die();
        }
    }
}
if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $tenHangXe=trim($_POST["tenHangXe"]);
    if(empty($tenHangXe)){
        $errTenHangXe="vui long không để trống";
        $check=false;
    }
    if($check){
        $sql="UPDATE danhmuc  SET  tenHangXe='$tenHangXe' WHERE id=$id";
        $result=$conn->query($sql);
        if($result){
            header("Location: danhmuc.php");
        }
    }
}
?>

<form action="editdanhmuc.php" method="post">
    <input type="hidden" name="id" value="<?= $id?>">
    <label for="">Tên hãng xe</label>
    <input type="text" name="tenHangXe" value="<?= $tenHangXe?>"><span style="coler:red"><?=$errTenHangXe?></span><br>
    <input type="submit" name="submit" value="Gửi">
</form>