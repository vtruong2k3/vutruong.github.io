<?php
include_once("connect.php");
$tenThucPham='';
$hinhAnh='';
$idDanhMuc='';
$soLuong='';
$option='';
$isCheck=true;


if(isset($_POST["submit"])){

    $tenThucPham=$_POST["tenThucPham"];
    $hinhAnh=$_FILES["hinhAnh"];
    $idDanhMuc=$_POST["idDanhMuc"];
    $soLuong=$_POST["soLuong"];

    $filename = $hinhAnh["name"];
    if($isCheck){
      $filename=time().$filename;
      $uploads = "uploads/".$filename;
      if(move_uploaded_file($hinhAnh["tmp_name"],$uploads)){
         $sql="INSERT INTO thucpham(tenThucPham, hinhAnh, idDanhMuc, soLuong)
                VALUES ('$tenThucPham','$filename','$idDanhMuc','$soLuong')";
            $result=$conn->query($sql);
            if($result){
                header('Location: index.php');
            }
      }
    }
 }



$sql="SELECT * FROM danhmuc";
$result=$conn->query($sql);
if($result){
    $danhmuc=$result->fetchAll(PDO::FETCH_ASSOC);
    if($danhmuc){
        foreach($danhmuc as $item){
                $option.='
                     <option value="'.$item["id"].'">'.$item["tenDanhMuc"].'</option>
                ';
        }
    }

}

?>

<form action="add.php" method="post" enctype="multipart/form-data">
    <label for="">Tên thực phẩm</label>
    <input type="text" name="tenThucPham" id=""><br>
    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" id=""><br>
    <select name="idDanhMuc" id="">
       <?= $option ?>
    </select><br>
    <label for="">Số lượng</label>
    <input type="text" name="soLuong" id=""><br>
    <input type="submit" name="submit" id="">
</form>