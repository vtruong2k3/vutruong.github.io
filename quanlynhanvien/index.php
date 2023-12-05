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

$sql="SELECT nhanvien.id,tenNhanVien,hinhAnh,maNhanVien,mail,soDienThoai,phongban.tenPhongBan 
        FROM nhanvien INNER JOIN phongban ON nhanvien.phongBanId=phongban.id";

$result=$conn->query($sql);
if($result){
    $listnv=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listnv){
        foreach($listnv as $key => $item){
            $hang.='
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["tenNhanVien"].'</td>
                    <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style="width: 150px;"></td>
                    <td>'.$item["maNhanVien"].'</td>
                    <td>'.$item["tenPhongBan"].'</td>
                    <td>'.$item["mail"].'</td>
                    <td>'.$item["soDienThoai"].'</td>
                    <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                    <td><a href="delete.php?id='.$item["id"].'">Xóa</a></td>
                </tr>
            
            ';

        }
    }
}



?>
<button><a href="add.php">Thêm nhân viên</a></button>
<table border="1px">
    <thead>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Hình Ảnh</th>
        <th>Mã nhân viên</th>
        <th>Phòng ban</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th></th>
    </thead>
    
    <tbody>

        
        <?= $hang ?>
    </tbody>

</table>