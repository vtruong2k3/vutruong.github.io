<?php 




include_once('connect.php');
$id="";
$tenLoaiXe="";
$xuatSu ="";
$idDanhMuc ='';
$mauSac ='';
$hinhAnh="";
$option="";
$errMauSac ='';
$errTenLoaiXe ='';
$errXuatSu ='';  
$errHinhAnh =''; 
$isCheck =true;
$sql="SELECT*FROM danhmuc";
$result=$conn->query($sql);
//khi người dùng submit

if(isset($_GET["id"])){
    $id=$_GET["id"];
    try {
        $sql = "SELECT * FROM bangxe WHERE id = $id";
        $result = $conn->query($sql);
        if($result){
            $bangxe = $result->fetch(PDO::FETCH_ASSOC);
            if($bangxe){
                 echo "<pre>";
                 print_r($bangxe);
                $id = $bangxe["id"];
                $tenLoaiXe=$bangxe["tenLoaiXe"];
                $xuatSu=$bangxe["xuatSu"];
                $mauSac=$bangxe["mauSac"];
                $hinhAnh=$bangxe["hinhAnh"];
                $idDanhMuc=$bangxe["idDanhMuc"];
            }
        }
    } catch (\Throwable $th) {
        echo "Không tìm thấy sinh viên";
        die();
    }
}

if($result){
    $listDanhMuc=$result->fetchAll(PDO::FETCH_ASSOC);

    if($listDanhMuc){
        ///echo "<pre>";
        ////print_r($listDanhMuc);
        foreach($listDanhMuc as $item){

        $option.=' <option value="'.$item["id"].'">'.$item["tenHangXe"].'</option>';

        }
    }
}


?>


<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="<?= $id ?>" id="">
    <label for="">Tên xe</label>
    <input type="text" name ="tenLoaiXe" value="<?= $tenLoaiXe ?>">
    <span style ="color:red"><?= $errTenLoaiXe ?></span> <br>

    <label for="">Xuất xứ</label>
    <input type="text" name ="xuatSu" value="<?= $xuatSu ?>">
    <span style ="color:red"><?= $errXuatSu ?></span> <br>

    <label for="">Danh mục</label>
    <select name="idDanhMuc" id="">
        <?= $option?>
    </select> <br>

    <label for="">Màu sắc</label>
    <input type="color" name ="mauSac" value="<?= $mauSac ?>"> <br>

    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" id="inputImg" >
    <span style ="color:red"><?= $errHinhAnh ?></span> <br>
    <img src="<?= $hinhAnh ?>" alt="" id="preViewImg" style ="width:200px"> <br>

    <input type="submit" name="submit" value="Gửi">



</form>

