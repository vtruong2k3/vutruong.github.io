<?php
    $localhost ="localhost";
    $databaseName = "db_plane3";
    $user = "root";
    $password ="";

    $conn = new PDO("mysql:host=$localhost;dbname=$databaseName", $user, $password);

    if($conn){
        echo "Kết nối thành công"."<br>";
    }else{
        echo "Kết nối không thành công";
    }

?>