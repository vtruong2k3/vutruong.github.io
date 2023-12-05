<?php
include_once("connect.php");
if(isset($_GET)){
    $id=$_GET["id"];
    try{
        $sql="DELETE FROM flights WHERE id=$id";
        $result=$conn->query($sql);
        if($result){
            header('Location: index.php');
        }
    }catch(\Throwable $th){
        echo "Không thấy máy bay";
        die();
    }
}
?>