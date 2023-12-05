<?php
include_once("connect.php");
session_start();

if(isset($_SESSION["username"])){
    echo "xin chào".$_SESSION["username"];
    echo '<button><a href="logout.php">Đăng xuất</a></button>';
}else{
    echo '<button><a href="login.php">Đăng nhập</a></button>';
}

$hang='';
$sql="SELECT chude.id,tenChuDe,hinhAnh,daChuDe,soLuong,ghiChu,detai.tenDeTai
        FROM chude INNER JOIN detai ON chude.deTaiId=detai.id";


$result=$conn->query($sql);
if($result){
    $listcd=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listcd){
        foreach($listcd as $key => $item){
           $hang.='
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$item["tenChuDe"].'</td>
                <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style="width: 150px;"></td>
                <td>'.$item["daChuDe"].'</td>
                <td>'.$item["soLuong"].'</td>
                <td>'.$item["ghiChu"].'</td>
                <td>'.$item["tenDeTai"].'</td>
                <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                <td><a href="delete.php?id='.$item["id"].'">Xóa</a></td>
            </tr>
           ';
        }
    }
}
?>
<button><a href="add.php">Thêm chủ đề</a></button>
<table border="1px">
    <thead>
        <th>STT</th>
        <th>Tên chủ Đề</th>
        <th>Hình Ảnh </th>
        <th>Đã chủ đề</th>
        <th>Số lượng</th>
        <th>Ghi chứ</th>
        <th>Đề tài</th>
        <th></th>
    </thead>
    <tbody>
       
        <?= $hang ?>
    </tbody>
</table>