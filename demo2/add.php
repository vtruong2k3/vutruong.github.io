<?php 




include_once('connect.php');
$tenLoaiXe="";
$xuatSu ="";
$idDanhMuc ='';
$mauSac ='';
$option="";
$errMauSac ='';
$errTenLoaiXe ='';
$errXuatSu ='';  
$errHinhAnh =''; 
$isCheck =true;
$sql="SELECT*FROM danhmuc";
$result=$conn->query($sql);
//khi người dùng submit

if(isset($_POST["submit"])){
    // echo "<pre>";
    // print_r($_POST);

    $tenLoaiXe = trim($_POST["tenLoaiXe"]);
    $xuatSu = trim($_POST["xuatSu"]);
    $mauSac = $_POST["mauSac"];
    $idDanhMuc = $_POST["idDanhMuc"];
    $image = $_FILES["hinhAnh"];

    // print_r([$tenLoaiXe,$xuatXu,$mauSac,$idDanhMuc,$image]);
    //validate

    if($tenLoaiXe == ''){
        $errTenLoaiXe ="Cần nhập tên xe";
        $isCheck =false;
    }

    if($xuatSu == ''){
        $errXuatSu ="Cần nhập xuất xứ";
        $isCheck =false;
    }

    $filename = $image["name"];
    if($filename ==""){
        $errHinhAnh = "Cần nhập file";
        $isCheck = false;
    }else{
        //lấy đuôi hình ảnh
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $arrAllow = ['png','jpg','jpeg'];

        if(!in_array($extension,$arrAllow)){
            $isCheck = false;
            $errHinhAnh ="Cần nhập hình ảnh";
        }
    }

    if($isCheck){
        // thêm vào cơ sở dữ liệu
        $filename = time().$filename;
        $uploads = 'uploads/'.$filename;

        if(move_uploaded_file($image["tmp_name"],$uploads)){
            $sql ="INSERT INTO bangxe(tenLoaiXe,xuatSu,	idDanhMuc,mauSac,hinhAnh)
                    VALUES ('$tenLoaiXe','$xuatSu','$idDanhMuc','$mauSac','$filename')";
            
            $result = $conn->query($sql);
            if($result){
                header('Location: index.php');
            }else{
                echo "lỗi khi thêm";
            }
        }

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


<form action="add.php" method="post" enctype="multipart/form-data">
    <label for="">Tên xe</label>
    <input type="text" name ="tenLoaiXe" value="<?= $tenLoaiXe ?>">
    <span style ="color:red"><?= $errTenLoaiXe ?></span> <br>

    <label for="">Xuất xứ</label>
    <input type="text" name ="xuatSu" value="<?= $xuatSu ?>">
    <span style ="color:red"><?= $errXuatSu ?></span> <br>

    <label for="">Danh mục</label>
    <select name="idDanhMuc" id="" >
        <?= $option?>
    </select> <br>

    <label for="">Màu sắc</label>
    <input type="color" name ="mauSac" value="<?= $mauSac ?>"> <br>

    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" id="inputImg">
    <span style ="color:red"><?= $errHinhAnh ?></span> <br>
    <img src="uploads/'.<?=$filename?>'" alt="" id="preViewImg" style ="width:200px"> <br>

    <input type="submit" name="submit" value="Gửi">



</form>

