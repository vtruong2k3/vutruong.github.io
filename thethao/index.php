<?php
include_once("connect.php");
$hang='';
$sql="SELECT thethao.id, tenTheThao, hinhAnh, maTheThao,namRaDoi, noidung.tenNoiDung
        FROM thethao INNER JOIN noidung ON thethao.idNoiDung=noidung.id";
$result=$conn->query($sql);
if($result){
    $listTheThao=$result->fetchAll(PDO::FETCH_ASSOC);
    if($listTheThao){
        foreach($listTheThao as $key => $item){
            $hang.='
            
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["tenTheThao"].'</td>
                    <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style="width: 150px;"></td>
                    <td>'.$item["maTheThao"].'</td>
                    <td>'.$item["tenNoiDung"].'</td>
                    <td>'.$item["namRaDoi"].'</td>
                </tr>
            
            ';
        }
    }
}

?>
<table border="1px">
    <thead>
        <th>STT</th>
        <th>Tên thể thao</th>
        <th>Hình ảnh</th>
        <th>Mã thể thao</th>
        <th>Nội dung</th>
        <th>Năm ra đời</th>
        <th></th>
    </thead>
        
    <tbody>
            <?= $hang ?>
    </tbody>
</table>