<?php
include_once("connect.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];
    try{
        if($id){
            $sql="DELETE FROM thethao WHERE id=$id";
            $result=$conn->query($sql);
            if($result){
                header('Location: index.php');
            }
        }
    }catch(\Throwable){
        echo "không thấy thông tin";
    }
}
?>