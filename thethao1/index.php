<?php
include_once("connect.php");
$hang='';
$sql="SELECT thucpham.id, tenThucPham, hinhAnh, danhmuc.tenDanhMuc, soLuong
        FROM thucpham INNER JOIN danhmuc ON thucpham.idDanhMuc=danhmuc.id";

$result=$conn->query($sql);

if($result){
    $listtp=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listtp){
        foreach($listtp as $key => $item){
            $hang.='
                <tr>
                    <td>'. $key+1 .'</td>
                    <td>'.$item["tenThucPham"].'</td>
                    <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style="width: 150px;"></td>
                    <td>'.$item["tenDanhMuc"].'</td>
                    <td>'.$item["soLuong"].'</td>
                    <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                    <td><a onclick="return confirm(\'Bạn muốn xóa chứ ? \')" href="delete.php?id='.$item["id"].'">Xóa</a></td>
                </tr>
            ';
        }
    }
}

?>
<button><a href="add.php">Yêu THỦY</a></button>
<table border="1px">
    <thead>
        
        <th>STT</th>
        <th>Tên thực phẩm</th>
        <th>Hình ảnh</th>
        <th>Danh mục</th>
        <th>Số lượng</th>
        <th></th>
    </thead>
        <?= $hang?>
    <tbody>

    </tbody>
</table>