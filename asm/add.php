<?php 
include_once("connect.php");
$tenChuDe='';
$hinhAnh='';
$daChuDe='';
$soLuong='';
$ghiChu='';
$deTaiId='';
$option='';
$isCheck=true;

if(isset($_POST["submit"])){
    $tenChuDe=$_POST["tenChuDe"];
    $hinhAnh=$_FILES["hinhAnh"];
    $daChuDe=$_POST["daChuDe"];
    $soLuong=$_POST["soLuong"];
    $ghiChu=$_POST["ghiChu"];
    $deTaiId=$_POST["deTaiId"];


    $filename=$hinhAnh["name"];
    if($isCheck){
        $filename=time().$filename;
        $uploads="uploads/".$filename;

        if(move_uploaded_file($hinhAnh["tmp_name"],$uploads)){
            $sql="INSERT INTO chude(tenChuDe,hinhAnh,daChuDe,deTaiId,soLuong,ghiChu)
                VALUES ('$tenChuDe','$filename','$daChuDe','$deTaiId','$soLuong','$ghiChu');
            ";
            $result=$conn->query($sql);
            if($result){
                header('Location: index.php');
            }
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
<label for="">Tên Chủ Đề</label>
<input type="text" name="tenChuDe" id=""><br>
<label for="">Hình Anh</label>
<input type="file" name="hinhAnh" id=""><br>
<label for="">Đã chủ đề</label>
<input type="text" name="daChuDe" id=""><br>
<label for="">Số lượng</label>
<input type="text" name="soLuong" id=""><br>
<label for="">Ghi chú</label>
<input type="text" name="ghiChu" id=""><br>
<select name="deTaiId" id="">
<?= $option ?>
</select><br>

<input type="submit" name="submit" id="">


</form>