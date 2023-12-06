<?php
include_once("connect.php");
 $id='';
 $tenTheThao='';
 $hinhAnh='';
 $maTheThao='';
 $idNoiDung='';
 $namRaDoi='';
 $option='';
 $isCheck=true;

 if(isset($_POST["submit"])){
    $tenTheThao=$_POST["tenTheThao"];
    $hinhAnh=$_FILES["hinhAnh"];
    $maTheThao=$_POST["maTheThao"];
    $idNoiDung=$_POST["idNoiDung"];
    $namRaDoi=$_POST["namRaDoi"];

    
 }


?>

<form action="add.php" method="post" enctype="multipart/form-data">
<label for="">Tên thể thao</label>
<input type="text" name="tenTheThao" id=""><br>
<label for="">Hình ảnh</label>
<input type="file" name="hinhAnh" id=""><br>
<label for="">Mã thể thao</label>
<input type="text" name="maTheThao" id=""><br>
<select name="idNoiDung" id="">

</select>
<label for="">Năm ra đời</label>
<input type="text" name="namRaDoi" id=""><br>
<input type="submit" name="submit" id="">
</form>