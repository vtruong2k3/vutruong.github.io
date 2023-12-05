<?php
    include_once("connect.php");
    //print_r($conn);
    $hang='';
    $sql = "SELECT*FROM lop ";
    $result = $conn->query($sql);

    if($result){
        //gán danh sách sinh viên vào biến
        //trả về 1 array danh sách
        $listLop = $result->fetchAll(PDO::FETCH_ASSOC);

        if($listLop){
            

            foreach($listLop as $key => $item){
                $hang .= '
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["tenLop"].'</td>
                    <td> <a href="editclass.php?id='.$item["id"].'">Sửa</a></td>
                </tr>';
            }
        }
    }
?>

<button><a href="addclass.php">Thêm Lớp</a></button>

<table border>
    <thead>
       
        <th>STT</th>
        <th>Tên</th>
        <th></th>
    </thead>
    <tbody>
        <?php echo $hang; ?>
    </tbody>
</table>