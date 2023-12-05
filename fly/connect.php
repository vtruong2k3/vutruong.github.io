<?php
$localhost="localhost";
$databaseName="db_plane";
$user="root";
$password ="";

$conn=new PDO("mysql:host=$localhost;dbname=$databaseName",$user,$password);

if($conn){
echo "Kết nối thành công"."<br>";
}else{
echo "Kết nối thất bại";
}
?>