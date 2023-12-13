<?php


if(isset($_POST["submit"])){
    $user=$_POST["username"];
    $pass=$_POST["password"];
    if($user=='admin' && $pass=='12345'){
        setcookie('username',$user,time()+60*60*24);
        header('Location: index.php');
        echo "bạn chưa đăng xuất";
    }else{
        echo "tk và mk sai";
    }
}

?>

<form action="login.php" method="post">
    <label for="">Username</label>
    <input type="text" name="username" id=""><br>
    <label for="">Password</label>
    <input type="password" name="password" id=""><br>
    <input type="submit" name="submit" id="">
</form>