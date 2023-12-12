<?php
include_once("connect.php");

$tenTheThao='';
$hinhAnh='';
$maTheThao='';
$namRaDoi='';
$idNoiDung='';
$option='';
$isCheck=true;


if(isset($_POST["submit"])){
    $tenTheThao=$_POST["tenTheThao"];
    $hinhAnh=$_FILES["hinhAnh"];
    $maTheThao=$_POST["maTheThao"];
    $idNoiDung=$_POST["idNoiDung"];
    $namRaDoi=$_POST["namRaDoi"];

    $filename=$hinhAnh["name"];
    if($isCheck){
        $filename=time().$filename;
        $upload="uploads/".$filename;
        if(move_uploaded_file($hinhAnh["tmp_name"],$upload)){
            $sql="INSERT INTO thethao (tenTheThao,hinhAnh,maTheThao,idNoiDung,namRaDoi)
                    VALUES ('$tenTheThao','$filename','$maTheThao','$idNoiDung','$namRaDoi')
            ";

            $result=$conn->query($sql);
            if($result){
                header('Location: index.php');
            }
        }
    }
}

$sql="SELECT * FROM noidung";
$result = $conn->query($sql);
if($result){
    $listnd=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listnd){
        foreach($listnd as $item){
            $option.='<option '.($item["id"] == $idNoiDung ? 'selected': '' ).' value="'.$item["id"] .'">'.$item["tenNoiDung"].'</option>';
        }
    }
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
        <?= $option ?>
    </select><br>
    <label for="">Năm ra đời</label>
    <input type="text" name="namRaDoi" id=""><br>
    <input type="submit" name="submit" id="">
</form>