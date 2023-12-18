<?php
include_once("connect.php");
$hang='';
$sql="SELECT user_name, image, email, phone, address, roles.role_name
        FROM users INNER JOIN roles ON users.id_role=roles.id_role";
    $result=$conn->query($sql);
    if($result){
        $listuer=$result->fetchAll(PDO::FETCH_ASSOC);
        if($listuer){
            foreach($listuer as $key => $item){
                $hang.='
                <tr>
                    <td>'. $key+1 .'</td>
                    <td>'.$item["user_name"].'</td>
                    <td><img src="uploads/'.$item["image"].'" alt="" style="width: 150px;"></td>
                    <td>'.$item["email"].'</td>
                    <td>'.$item["phone"].'</td>
                    <td>'.$item["address"].'</td>
                    <td>'.$item["role_name"].'</td>
                    <td><a href="edit.php?id='.$item["id_user"].'"></a></td>
                </tr>
                ';
            }
        }
    }
?>
<button><a href="add.php">Thêm mới</a></button>
<table>
    <thead>
        <th>STT</th>
        <th>Name</th>
        <th>Image</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Role</th>
        <th></th>
    </thead>
    <tbody>
       
        <?= $hang ?>
    </tbody>
</table>