<?php
include_once("connect.php");
$id='';
$tenTheThao='';
$hinhAnh='';
$maTheThao='';
$namRaDoi='';
$idNoiDung='';
$option='';
$isCheck=true;

if(isset($_GET["id"])){
    $id=$_GET["id"];
    try{
        $sql="SELECT*FROM thethao WHERE id=$id";
        $result=$conn->query($sql);
        if($result){
            $listtt=$result->fetch(PDO::FETCH_ASSOC);
            if($listtt){
                $tenTheThao=$listtt["tenTheThao"];
                $hinhAnh=$listtt["hinhAnh"];
                $maTheThao=$listtt["maTheThao"];
                $idNoiDung=$listtt["idNoiDung"];
                $namRaDoi=$listtt["namRaDoi"];
            }
        }
    }catch(\Throwable){
        echo "không thấy thông tin";
        die();
    }
}
if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $tenTheThao=$_POST["tenTheThao"];
    $hinhAnh=$_FILES["hinhAnh"];
    $maTheThao=$_POST["maTheThao"];
    $idNoiDung=$_POST["idNoiDung"];
    $namRaDoi=$_POST["namRaDoi"];

    $filename=$hinhAnh["name"];
    $sql='';
    if($isCheck){
        if($filename){
            $filename=time().$filename;
            $upload="uploads/".$filename;
            if(move_uploaded_file($hinhAnh["tmp_name"],$upload)){
                $sql="UPDATE thethao
                        SET tenTheThao='$tenTheThao',hinhAnh='$filename',maTheThao='$maTheThao',idNoiDung='$idNoiDung',namRaDoi='$namRaDoi'
                        WHERE id='$id'";
            }
        }else{
            $sql="UPDATE thethao
                        SET tenTheThao='$tenTheThao',maTheThao='$maTheThao',idNoiDung='$idNoiDung',namRaDoi='$namRaDoi'
                        WHERE id='$id'";
        }
        $result=$conn->query($sql);
        if($result){
            header('Location: index.php');
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

<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
    <label for="">Tên thể thao</label>
    <input type="text" name="tenTheThao" value="<?= $tenTheThao ?>"><br>
    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" id=""><br>
    <label for="">Mã thể thao</label>
    <input type="text" name="maTheThao" value="<?= $maTheThao ?>"><br>
    <select name="idNoiDung" id="">
        <?= $option ?>
    </select><br>
    <label for="">Năm ra đời</label>
    <input type="text" name="namRaDoi" value="<?= $namRaDoi ?>"><br>
    <input type="submit" name="submit" id="">
</form>