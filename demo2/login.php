<?php
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    if($username=='admin'&& $password=='123456'){
       // if(!isset($_COOKIE["username"])){
            setcookie('username',$username,time()+60*60*24);
            header('Location: index.php');
       // }else{
            echo "bạn chưa đăng xuất";
       // }
    }else{
        echo "sai tk và mk";
    }
}

?>

<form action="login.php" method="post">
    <label for="">Username</label>
    <input type="text" name="username" id=""><br>
    <label for="">Password</label>
    <input type="password" name="password" id=""><br>
    <input type="submit" name="submit" >
</form>