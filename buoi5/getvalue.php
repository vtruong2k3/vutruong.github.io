<?php

if(isset($_POST["submit"])){//isset để kiểm tra một biến có tồn tại hay ko

$username = $_POST["user"];
echo $username.'<br>';
$password = $_POST["pass"];
    echo $password;

}
?>