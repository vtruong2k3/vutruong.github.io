<?php
include_once("connect.php");

if(isset($_GET)){
    $id=$_GET["id"];
    if($id){
        try{
            $sql="DELETE FROM chude WHERE id=$id";
            $result=$conn->query($sql);
            if($result){
                header('Location: index.php');
            }
        }catch(\Throwable){
            echo "không thấy dữ liệu";

        }
    }
}
?>