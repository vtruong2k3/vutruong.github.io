<?php 
include_once("connect.php");

$hang='';
$sql ="SELECT bangxe.id , tenLoaiXe,xuatSu,mauSac,hinhAnh,danhmuc.tenHangXe
        FROM bangxe 
        INNER JOIN danhmuc ON bangxe.idDanhMuc=danhmuc.id
";
$result=$conn->query($sql);
if($result){
    $listxe=$result->fetchAll(PDO::FETCH_ASSOC);

    if($listxe){
        foreach($listxe as $key => $item){
            $hang.='
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$item["tenLoaiXe"].'</td>
                <td>'.$item["xuatSu"].'</td>
                <td><input type="color" name="" id="" value="'.$item["mauSac"].'" disabled></td>
                <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style="width:150px"></td>
                <td>'.$item["tenHangXe"].'</td>
                <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
            </tr>
            ';
        }
    }
}
?>
<br>

<button ><a href="add.php">Thêm xe mới</a></button>
<table border="1px">
    <thead>
        <th>STT</th>
        <th>Tên loaị xe</th>
        <th>Xuất sứ</th>
        <th>Màu sắc</th>
        <th>Hình ảnh</th>
        <th>Danh mục</th>
        <th></th>
    </thead>
    <tbody>

        <?= $hang?>
    </tbody>
</table>