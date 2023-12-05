<?php 
include_once('connect.php');

$tenLoaiXe="";
$xuatSu ="";
$idDanhMuc ='';
$mauSac ='';
$hinhAnh='';
$option="";
$errMauSac ='';
$errTenLoaiXe ='';
$errXuatSu ='';  
$errHinhAnh =''; 
$isCheck =true;

if(isset($_POST["submit"])){
    echo "<pre>";
    print_r($_POST);
}

$sql="SELECT*FROM danhmuc";
$result=$conn->query($sql);
if($result){
    $danhmuc=$result->fetchAll(PDO::FETCH_ASSOC);
    if($danhmuc){
        foreach($danhmuc as $item){
        $option.=' <option value="'.$item["id"].'">'.$item["tenHangXe"].'</option>';
        }

    }
}

?>

<form action="add.phhp" method="post" enctype="multipart/form-data">
    <label for="">Tên loại xe</label>
    <input type="text" name="tenLoaiXe" id=""><br>
    <label for="">Xuất Sứ</label>
    <input type="text" name="xuatSu" id=""><br>
    <label for="">Màu Sắc</label>
    <input type="color" name="mauSac" id=""><br>
    <select name="idDanhMuc" id="">
        <?= $option?>
    </select> <br>
    <input type="file" name="hinhAnh" id=""><br>
     
    <input type="submit" name="submit" id="" value="Gửi">

</form>