<?php
if(isset($_COOKIE["username"])){
setcookie('username','',time()-60*60*24);
header('Location: index.php');
}else{
    echo "Bạn chưa đăng nhập";
}
?>