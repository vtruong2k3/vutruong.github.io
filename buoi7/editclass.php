<?php
include_once("connect.php");
$tenLop="";
$errtenLop="";
$isCheck=true;


if(isset($_GET["id"])){
    $id=$_GET["id"];
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id){
            $sql = "SELECT * FROM lop WHERE id = $id";
            try {
                $result = $conn->query($sql);
                if($result){
                    $lop = $result->fetch(PDO::FETCH_ASSOC);
                    if($lop){
                         //echo "<pre>";
                         //print_r($lop);
                        $id = $lop["id"];
                        $tenLop = $lop["tenLop"];
                        
                    }
                }
            } catch (\Throwable $th) {
                echo "Không tìm thấy lop";
                die();
            }
        }
    }
}
if(isset($_POST["submit"])){
    $id =$_POST["id"];
    // echo $id;
    // die();
    $tenLop = trim($_POST["tenLop"]);
    

     //Kiểm tra dữ liệu
    if(empty($tenLop)){
        $errHoVaTen ="Người dùng nhập ";
        $isCheck= false;
    }
    
    if($isCheck){
        $sql ="UPDATE lop 
        SET tenLop ='$tenLop'
        WHERE id = $id";

        // echo $sql;
        // die();
        $result = $conn->query($sql);
        if($result){
            header('Location: class.php');
        }else{
            echo "Có lỗi khi thêm";
        }
    }
}

?>
<form action="editclass.php" method="post">
<input type="hidden" name="id" value="<?= $id ?>">
<label for="">Tên Lớp</label>
<input type="text" name="tenLop" value="<?= $tenLop?>"><span style="color:red"><?= $errtenLop?></span><br>
<input type="submit" value="Gửi" name="submit">
</form>