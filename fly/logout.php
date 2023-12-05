<?php
if(isset($_COOKIE["username"])){
setcookie('username','',0);
header('Location: index.php');
}else{
    echo "bạn chưa đăng nhập";
}
?>