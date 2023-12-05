<?php
include_once("connect.php");
$id='';
$tenNhanVien='';
$hinhAnh='';
$maNhanVien='';
$phongBanId='';
$mail='';
$soDienThoai='';
$option='';
$isCheck=true;




if(isset($_GET["id"])){
    $id=$_GET["id"];
    if($id){
        try{
            $sql = "SELECT * FROM nhanvien WHERE id=$id";
            $result=$conn->query($sql);
            if($result){
                $listnv = $result->fetch(PDO::FETCH_ASSOC);
                if($listnv){
                    $id=$listnv["id"];
                    $tenNhanVien=$listnv["tenNhanVien"];
                    $hinhAnh=$listnv["hinhAnh"];
                    $maNhanVien=$listnv["maNhanVien"];
                    $phongBanId=$listnv["phongBanId"];
                    $mail=$listnv["mail"];
                    $soDienThoai=$listnv["soDienThoai"];
                }
            }
        }catch(\Throwable){
            echo "Không thấy nhân viên";
            die();
        }
    }
}

if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $tenNhanVien=$_POST["tenNhanVien"];
    $hinhAnh=$_FILES["hinhAnh"];
    $maNhanVien=$_POST["maNhanVien"];
    $phongBanId=$_POST["phongBanId"];
    $mail=$_POST["mail"];
    $soDienThoai=$_POST["soDienThoai"];

    $filename=$hinhAnh["name"];
    $sql='';
    if($isCheck){
        
        if($filename){
            $filename=time().$filename;
            $uploads='uploads/'.$filename;
            if(move_uploaded_file($hinhAnh["tmp_name"],$uploads)){
                $sql="UPDATE nhanvien
                SET tenNhanVien='$tenNhanVien', hinhAnh='$filename',maNhanVien='$maNhanVien', phongBanId='$phongBanId', mail='$mail',soDienThoai='$soDienThoai'
                WHERE id='$id'";
                
            }
        }else{
            $sql="UPDATE nhanvien
            SET tenNhanVien='$tenNhanVien',maNhanVien='$maNhanVien', phongBanId='$phongBanId', mail='$mail',soDienThoai='$soDienThoai'
            WHERE id='$id'";
           
        }
        $result=$conn->query($sql);
        if($result){
            header('Location: index.php');
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
                <option '.($item["id"] == $phongBanId ? 'selected': '' ).' value="'.$item["id"].'">'.$item["tenPhongBan"].'</option>
        ';
        }
    }
}
?>

<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$id?>">
    <label for="">Họ và tên</label>
    <input type="text" name="tenNhanVien" value="<?=$tenNhanVien?>"><br>
    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" value="<?=$hinhAnh?>"><br>
    <label for="">Mã nhân viên</label>
    <input type="text" name="maNhanVien" value="<?=$maNhanVien?>"><br>
    <select name="phongBanId" value="<?=$phongBanId?>">
        <?=$option?>
    </select><br>
    <label for="">Email</label>
    <input type="email" name="mail" value="<?=$mail?>"><br>
    <label for="">Số điên thoại</label>
    <input type="text" name="soDienThoai" value="<?=$soDienThoai?>"><br>
    <img src="uploads/<?=$hinhAnh?>" style="width: 150px;"> <br>
    <input type="submit" name="submit" >

</form>