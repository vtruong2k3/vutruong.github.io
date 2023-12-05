<?php
session_start();
if(isset($_SESSION["username"])){
    echo "xin chào".$_SESSION["username"];
    echo '<button><a href="logout.php">Đăng xuất</a></button>';
}else{
    echo '<button><a href="login.php">Đăng nhập</a></button>';
}


?>