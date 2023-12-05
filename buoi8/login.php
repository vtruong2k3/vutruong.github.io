<?php
session_start();

if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    if($username=='admin'&& $password=='123456'){
        $_SESSION["username"]=$username;
        header('Location: index.php');
        
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