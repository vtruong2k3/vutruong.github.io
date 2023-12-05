<?php
include_once("connect.php");

if(isset($_COOKIE["username"])){
    echo "xin chào".$_COOKIE["username"];
    echo '<button><a href="logout.php">Đăng xuất</a></button>';
}else{
    echo '<button><a href="login.php">Đăng nhập</a></button>';
}
    

$hang='';
$sql='SELECT flights.id ,flight_number, image, total_passengers,description,airlines.airline_name
        FROM flights INNER JOIN airlines ON flights.airline_id=airlines.id
';



$result=$conn->query($sql);

if($result){
    $listflights=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listflights){
        foreach($listflights as $key => $item){
            $hang.='
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["flight_number"].'</td>
                    <td><img src="uploads/'.$item["image"].'" alt="" style="width:150px"></td>
                    <td>'.$item["total_passengers"].'</td>
                    <td>'.$item["description"].'</td>
                    <td>'.$item["airline_name"].'</td>
                    <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                    <td><a href="delete.php?id='.$item["id"].'">Xóa</a></td>
                </tr>
            ';
        }
    }
}



?>
<br>

<button><a href="add.php">Thêm mới</a></button>
<table border="1px">
    <thead>
        <th>STT</th>
        <th>Flight Number</th>
        <th>Image</th>
        <th>Total Passengers</th>
        <th>Description</th>
        <th>Airline</th>
        <th></th>
       
    </thead>
    <tbody>
       
        <?= $hang ?>
    </tbody>
</table>