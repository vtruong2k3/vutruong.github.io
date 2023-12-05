<?php
 include_once("connect.php");
 $tenLop="";
 $errtenLop="";
 $isCheck=true;
 $sql="SELECT*FROM lop";
 $result=$conn->query($sql);

 if(isset($_POST["submit"])){
    $tenLop=$_POST["tenLop"];

   #kiểm tra dữ liệu nhập vào
   if(empty($tenLop)){
    $errtenLop="vui lòng không để trống";
    $isCheck=false;
   }
  
   if($isCheck){
    $sql = "INSERT INTO lop(tenLop)
            VALUES ('$tenLop')";
            $result = $conn->query($sql);
            if($result){
                //echo "thêm thành chông";
                header ("Location: class.php");
            }else{
                echo "thêm thất bại";
            }
   }
}



?>
<form action="addclass.php" method="post">
<input type="hidden" name="id" value="<?php $id?>">
<label for="">Tên Lớp</label>
<input type="text" name="tenLop" value="<?= $tenLop?>"><span style="color:red"><?= $errtenLop?></span><br>
<input type="submit" value="Gửi" name="submit">
</form>