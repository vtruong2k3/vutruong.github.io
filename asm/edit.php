<?php
include_once("connect.php");
$id='';
$tenChuDe='';
$hinhAnh='';
$daChuDe='';
$soLuong='';
$ghiChu='';
$deTaiId='';
$option='';
$isCheck=true;

if(isset($_GET["id"])){

    $id=$_GET["id"];
    if($id){
        try{
            $sql="SELECT * FROM chude WHERE id=$id";
            $result = $conn->query($sql);
            if($result){
                $listcd=$result->fetch(PDO::FETCH_ASSOC);
                if($listcd){
                    $tenChuDe=$listcd["tenChuDe"];
                    $hinhAnh=$listcd["hinhAnh"];
                    $daChuDe=$listcd["daChuDe"];
                    $soLuong=$listcd["soLuong"];
                    $ghiChu=$listcd["soLuong"];
                    $deTaiId=$listcd["deTaiId"];
                }
            }
        }catch(\Throwable){
            echo "không thấy dữ liệu";
            die();
        }
    }

}


if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $tenChuDe=$_POST["tenChuDe"];
    $hinhAnh=$_FILES["hinhAnh"];
    $daChuDe=$_POST["daChuDe"];
    $soLuong=$_POST["soLuong"];
    $ghiChu=$_POST["soLuong"];
    $deTaiId=$_POST["deTaiId"];


    if($isCheck){
        $filename=$hinhAnh["name"];
        $sql='';
        if($filename){
            $filename=time().$filename;
            $uploads='uploads/'.$filename;
            if(move_uploaded_file($hinhAnh["tmp_name"],$uploads)){
                $sql="UPDATE chude
                SET tenChuDe='$tenChuDe',hinhAnh='$filename',daChuDe='$daChuDe',$deTaiId='deTaiId',$soLuong='soLuong',$ghiChu='ghiChu'
                WHERE id='$id'
                ";
            }else{
                $sql="UPDATE chude
                SET tenChuDe='$tenChuDe',daChuDe='$daChuDe',$deTaiId='deTaiId',$soLuong='soLuong',$ghiChu='ghiChu'
                WHERE id='$id'
                ";
            }
            $result=$conn->query($sql);
        }
    }
}


$sql="SELECT * FROM detai";
$result = $conn->query($sql);
if($result){
    $listdt=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listdt){
        foreach($listdt as $item){
            $option.='
            <option value="'.$item["id"].'">'.$item["tenDeTai"].'</option>
            ';
        }
    }
}
?>


<form action="add.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
<label for="">Tên Chủ Đề</label>
<input type="text" name="tenChuDe" value="<?= $tenChuDe ?>"><br>
<label for="">Hình Anh</label>
<input type="file" name="hinhAnh" value="<?= $hinhAnh ?>"><br>
<label for="">Đã chủ đề</label>
<input type="text" name="daChuDe" value="<?= $daChuDe ?>"><br>
<label for="">Số lượng</label>
<input type="text" name="soLuong" value="<?= $soLuong ?>"><br>
<label for="">Ghi chú</label>
<input type="text" name="ghiChu"value="<?= $ghiChu ?>"><br>
<select name="deTaiId" id="">
<?= $option ?>
</select><br>

<input type="submit" name="submit" id="">


</form>