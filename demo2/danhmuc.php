<?php
include_once("connect.php");
$hienThi="";
$sql="SELECT * FROM danhmuc";
$result=$conn->query($sql);
if($result){
    $listDanhMuc=$result->fetchAll(PDO::FETCH_ASSOC);
    foreach($listDanhMuc as $key=>$item){
            $hienThi.='
            <tr>
            <td>'.($key+1).'</td>
            <td>'.$item["tenHangXe"].'</td>
            <td><a href="editdanhmuc.php?id='.$item["id"].'">Sửa</a></td>
            </tr>
            ';
    }
}

?>
<button><a href="addDanhMuc.php">Thêm Danh Mục</a></button>
<table border="1px">
<thead>
    <th>STT</th>
    <th>Tên hãng xe</th>
</thead>
<tbody>
<?= $hienThi ?>
</tbody>
</table>