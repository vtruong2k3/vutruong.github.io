<?php
include_once("./connect.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];
    if($id){
        try{
            $sql="SELECT*FROM bangxe WHERE id=$id";
            $result = $conn->query($sql);
            if($result){
                $bangxe=$result->fetch(PDO::FETCH_ASSOC);
                if($bangxe){
                    $sql="DELETE FROM bangxe WHERE id=$id";
                    $result=$conn->query($sql);
                    if($result){
                        header("Location: index.php");
                    }
                }
            }
        }catch(\Throwable){
            echo "không tìm thấy xe";
            die();
        }
    }
}
?>