<?php
include_once("connect.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];
    if($id){
        $sql="DELETE FROM nhanvien WHERE id=$id";
        $result=$conn->query($sql);
        if($result){
            header('Location: index.php');
        }
    }
}
?>