<?php
include_once("connect.php");
$hang='';
$sql="SELECT thethao.id, tenTheThao,hinhAnh,maTheThao,namRaDoi,noidung.tenNoiDung
        FROM thethao INNER JOIN noidung ON thethao.idNoiDung=noidung.id
";
$result = $conn->query($sql);
if($result){
    $listtt=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listtt){
        foreach($listtt as $key =>$item){
            $hang.='
                <tr>
                    <td>'. $key+1 .'</td>
                    <td>'.$item["tenTheThao"].'</td>
                    <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style="width: 150px;"></td>
                    <td>'.$item["maTheThao"].'</td>
                    <td>'.$item["tenNoiDung"].'</td>
                    <td>'.$item["namRaDoi"].'</td>
                    <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                    <td><a onclick="return confirm(\'Bạn muốn xóa chứ\')" href="delete.php?id='.$item["id"].'">Xóa</a></td>
                </tr>
            ';
        }
    }
}
?>
<button><a href="add.php">Thêm mới</a></button>
<table border="1px">
    <thead>
        <th>STT</th>
        <th>Tên thể thao</th>
        <th>Hình ảnh</th>
        <th>Mã thể thao</th>
        <th>Nôi dung</th>
        <th>Năm ra đời</th>
        <th></th>
    </thead>
    <tbody>
        <?= $hang ?>
    </tbody>
</table>