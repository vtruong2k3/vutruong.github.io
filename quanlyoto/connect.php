<?php
$localhost="localhost";
$databaseName="w18412_qlyoto";
$user="root";
$password ="";

$conn=new PDO("mysql:host=$localhost;dbname=$databaseName",$user,$password);

if($conn){
echo "Kết nối thành công"."<br>";
}else{
echo "Kết nối thất bại";
}
?>