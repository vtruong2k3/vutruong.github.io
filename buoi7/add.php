<?php
require_once("connect.php");
$hoVaTen='';
$khoa='';
$ngaysinh='';
$lopid='';

$errHoVaTen='';
$errKhoa='';
$errNgaySinh='';
$errLopId='';
$isCheck = true;
$option="";
$sql = "SELECT*FROM lop";
$result = $conn->query($sql);

if(isset($_POST["submit"])){
    $hoVaTen=trim($_POST["hoVaTen"]);//trim giúp chúng ta loại bỏ khoảng trống
    $khoa=trim($_POST["khoa"]);
    $ngaysinh = $_POST['ngaysinh'];
    $lopid=$_POST["lopid"];
   // echo "<pre>";
   // print_r([$hoVaTen,$khoa,$ngaysinh,$lopid]);

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
    $sql = "INSERT INTO sinhvien(hoVaTen,khoa,ngaysinh,lopid)
            VALUES ('$hoVaTen','$khoa','$ngaysinh','$lopid')";
            $result = $conn->query($sql);
            if($result){
                //echo "thêm thành chông";
                header ("Location: index.php");
            }else{
                echo "thêm thất bại";
            }
   }
}

if($result){
    $listLop=$result->fetchAll(PDO::FETCH_ASSOC);
   
    if($listLop){
        echo "<pre>";
        print_r($listLop);
        foreach($listLop as $item){
            $option.='<option '.($item['id']==$lopid?"selected":"").' value="'.$item["id"].'">'.$item["tenLop"].'</option>';
    
        }
    }
    
    }
    echo htmlspecialchars($option);
?>
<form action="add.php" method="post">
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