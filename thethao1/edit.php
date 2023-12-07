<?php
include_once("connect.php");
$id='';
$tenThucPham='';
$hinhAnh='';
$idDanhMuc='';
$soLuong='';
$option='';
$isCheck=true;
if(isset($_GET["id"])){
    $id=$_GET["id"];
    if($id){
        try{
            $sql="SELECT * FROM thucpham WHERE id=$id";
            $result=$conn->query($sql);
            if($result){
                $thucpham=$result->fetch(PDO::FETCH_ASSOC);
                if($thucpham){
                    $tenThucPham=$thucpham["tenThucPham"];
                    $hinhAnh=$thucpham["hinhAnh"];
                    $idDanhMuc=$thucpham["idDanhMuc"];
                    $soLuong=$thucpham["soLuong"];
                }
            }

        }catch(\Throwable){
            echo "khôngg thấy thông tin";

        }
    }
}
if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $tenThucPham=$_POST["tenThucPham"];
    $hinhAnh=$_FILES["hinhAnh"];
    $idDanhMuc=$_POST["idDanhMuc"];
    $soLuong=$_POST["soLuong"];

    $filename = $hinhAnh["name"];
    if($isCheck){
        $sql='';
      

      if($filename){
        $filename=time().$filename;
        $uploads = "uploads/".$filename;
            if(move_uploaded_file($hinhAnh["tmp_name"],$uploads)){
                
                    $sql="UPDATE thucpham
                            SET tenThucPham='$tenThucPham',hinhAnh='$filename',idDanhMuc='$idDanhMuc',soLuong='$soLuong'
                            WHERE id='$id'";
                
             }
        }else{
            $sql="UPDATE thucpham
                            SET tenThucPham='$tenThucPham',idDanhMuc='$idDanhMuc',soLuong='$soLuong'
                            WHERE id='$id'";
        }
        $result=$conn->query($sql);
        if($result){
            header('Location: index.php');
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
                     <option '.($item["id"] == $idDanhMuc ? 'selected': '' ).' value="'.$item["id"].'">'.$item["tenDanhMuc"].'</option>
                ';
        }
    }

}
?>

<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
    <label for="">Tên thực phẩm</label>
    <input type="text" name="tenThucPham" value="<?= $tenThucPham ?>"><br>
    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" value="<?= $hinhAnh ?>"><br>
    <select name="idDanhMuc" id="">
       <?= $option ?>
    </select><br>
    <label for="">Số lượng</label>
    <input type="text" name="soLuong" value="<?= $soLuong ?>"><br>
    <input type="submit" name="submit" id="">
</form>