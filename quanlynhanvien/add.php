<?php
include_once("connect.php");
$tenNhanVien='';
$hinhAnh='';
$maNhanVien='';
$phongBanId='';
$mail='';
$soDienThoai='';
$option='';
$isCheck=true;

if(isset($_POST["submit"])){
    $tenNhanVien=$_POST["tenNhanVien"];
    $hinhAnh=$_FILES["hinhAnh"];
    $maNhanVien=$_POST["maNhanVien"];
    $phongBanId=$_POST["phongBanId"];
    $mail=$_POST["mail"];
    $soDienThoai=$_POST["soDienThoai"];


    $filename=$hinhAnh["name"];
    if($isCheck){
        $filename=time().$filename;
        $uploads="uploads/".$filename;

        if(move_uploaded_file($hinhAnh["tmp_name"],$uploads)){
            $sql="INSERT INTO nhanvien(tenNhanVien,hinhAnh,maNhanVien,phongBanId,mail,soDienThoai)
                    VALUES ('$tenNhanVien','$filename','$maNhanVien','$phongBanId','$mail','$soDienThoai')
            ";
            $result=$conn->query($sql);
            if($result){
                header('Location: index.php');
            }
        }
    }
}





$sql="SELECT*FROM phongban";
$result=$conn->query($sql);
if($result){
    $listpb=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listpb){
        foreach($listpb as $item){
        $option.='
                <option value="'.$item["id"].'">'.$item["tenPhongBan"].'</option>
        ';
        }
    }
}
?>

<form action="add.php" method="post" enctype="multipart/form-data">
    <label for="">Họ và tên</label>
    <input type="text" name="tenNhanVien" id=""><br>
    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" id=""><br>
    <label for="">Mã nhân viên</label>
    <input type="text" name="maNhanVien" id=""><br>
    <select name="phongBanId" id="">
        <?=$option?>
    </select><br>
    <label for="">Email</label>
    <input type="email" name="mail" id=""><br>
    <label for="">Số điên thoại</label>
    <input type="text" name="soDienThoai" id=""><br>
    <input type="submit" name="submit" >

</form>