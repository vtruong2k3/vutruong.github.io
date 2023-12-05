<?php
include_once("./connect.php");

$id="";
$hoVaTen='';
$khoa='';
$ngaysinh='';
$lopid='';

$errHoVaTen='';
$errKhoa='';
$errNgaySinh='';
$errLopId='';
$option="";
$isCheck = true;

if(isset($_GET["id"])){
    $id = $_GET["id"];
    if($id){
        
        try {
            $sql = "SELECT * FROM sinhvien WHERE id = $id";
            $result = $conn->query($sql);
            if($result){
                $sinhvien = $result->fetch(PDO::FETCH_ASSOC);
                if($sinhvien){
                    // echo "<pre>";
                    // print_r($sinhVien);
                    $id = $sinhvien["id"];
                    $hoVaTen = $sinhvien["hoVaTen"];
                    $khoa = $sinhvien["khoa"];
                    $ngaysinh = $sinhvien["ngaysinh"];
                    $lopid = $sinhvien["lopid"];
                }
            }
        } catch (\Throwable $th) {
            echo "Không tìm thấy sinh viên";
            die();
        }
    }
   
}
if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $hoVaTen=trim($_POST["hoVaTen"]);//trim giúp chúng ta loại bỏ khoảng trống
    $khoa=trim($_POST["khoa"]);
    $ngaysinh = $_POST["ngaysinh"];
    $lopid=$_POST["lopid"];
     #kiểm tra dữ liệu nhập vào
   if(empty($hoVaTen)){
    $errHoVaTen="vui lòng không để trống";
    $isCheck=false;
   }
   if(empty($khoa)){
    $errKhoa="Vui lòng không đẻ trống";
    $isCheck=false;
   }
   if(empty($ngaysinh)){
    $errNgaySinh="Vui lòng không để trống";
    $isCheck=false;
   }
   if($isCheck){
            $sql ="UPDATE sinhvien 
            SET hoVaTen ='$hoVaTen', khoa = '$khoa', ngaysinh ='$ngaysinh', lopid ='$lopid'
            WHERE id = $id";
             $result = $conn->query($sql);
            if($result){
                header('Location: index.php');
            }else{
                echo "Có lỗi khi thêm";
            }
        }
}
   
   
$sql = "SELECT*FROM lop";
$result = $conn->query($sql);
if($result){
    $listLop=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listLop){
        
        foreach($listLop as $item){
            $option.='<option '.($item['id']==$lopid?"selected":"").' value="'.$item["id"].'">'.$item["tenLop"].'</option>';
    
        }
    }
    
 }

?>
<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?= $id?>">
    <label for="">Họ và tên</label><br>

    <input type="text" name="hoVaTen" value="<?= $hoVaTen?>"><span style="color:red"><?= $errHoVaTen?></span><br>
    <label for="">Khoa</label>
    <input type="text" name="khoa" value="<?= $khoa?>" ><span style="color:red"><?= $errKhoa?></span><br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaysinh" id="" value="<?= $ngaysinh?>><span style="color:red"><?= $errNgaySinh?></span><br>

    <label for="">Lớp</label><br>
    <select name="lopid" id="">
        <option value="1">PHP1</option>
        <?php echo $option;?>
    </select><br>

    <input type="submit" value="Gửi" name="submit">
</form>