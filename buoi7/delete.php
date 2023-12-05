<?php
include_once('connect.php');
#lấy giá trị trên url
if(isset($_GET["id"])){
    $id = $_GET["id"];
   
    try{
        $sql = "SELECT*FROM sinhvien WHERE id=$id";
        $result = $conn->query($sql);
        if($result){
            $sinhvien = $result-> fetch(PDO::FETCH_ASSOC);
            if($sinhvien){
                $sql="DELETE FROM sinhvien WHERE id=".$sinhvien["id"];
                $result = $conn->query($sql);
                if($result){
                    header('Location: index.php');
                }
            }
        }
    }catch (\Throwable $th) {
        echo "Không tìm thấy sinh viên";
        die();
    }
}
?>