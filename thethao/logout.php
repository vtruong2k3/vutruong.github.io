<?php


if(isset($_COOKIE["username"])){
    setcookie('username','',time()+0);
    header('Location: index.php');
    
}else{
    echo "bạn chưa đăng xuâts";
}

?>