<?php
session_start();
if(isset($_POST["submit"])){
    $user=$_POST["username"];
    $pass=$_POST["password"];
    if($user=='admin' && $pass=='12345'){
        $_SESSION["username"]=$user;
        header('Location: index.php');
    }else{
        echo "tk mk không đúng";
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