<?php
include_once("connect.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];
    if($id){
        try{
            $sql="DELETE FROM thucpham WHERE id=$id";
            $result=$conn->query($sql);
            if($result){
                header('Location: index.php');
            }

        }catch(\Throwable){
            echo "khôngg thấy thông tin";

        }
    }
}
?>