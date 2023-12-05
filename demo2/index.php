<?php
    //Hiển thị danh sách
    //gọi file connect
    include_once('connect.php');
    
        if(isset($_COOKIE["username"])){
            echo "Xin chào".$_COOKIE["username"];
            echo '<button><a href="logout.php">Đăng xuất</a></button>';
        }else{
            echo '<button><a href="login.php">Đăng nhập</a></button>';
        }







    //lấy danh sách xe
    $sql = 'SELECT bangxe.id, tenLoaiXe,xuatSu,idDanhMuc,mauSac,hinhAnh, danhmuc.tenHangXe
            FROM bangxe INNER JOIN danhmuc ON bangxe.idDanhMuc = danhmuc.id';

    $result = $conn->query($sql);
    $hang ='';
    if($result){
        $listXe = $result->fetchAll(PDO::FETCH_ASSOC);
        if($listXe){
            // echo "<pre>";
            // print_r($listXe);
            foreach($listXe as $key => $item){
                $hang .= '
                    <tr>
                        <td>'. ($key+1) .'</td>
                        <td>'.$item["tenLoaiXe"].'</td>
                        <td>'.$item["xuatSu"].'</td>
                        <td><input type="color" value="'.$item["mauSac"].'" disabled></td>
                        <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style="width:150px"></td>
                        <td>'.$item["tenHangXe"].'</td>
                        <td> <a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                        <td> <a href="delete.php?id='.$item["id"].'">Xóa</a></td>
                        <td></td>
                    </tr>
                ';
            }
        }
    }


?>


<button><a href="add.php">Thêm mới</a></button>
<table border>
    <thead>
        <th>STT</th>
        <th>Tên xe </th>
        <th>Xuất xứ</th>
        <th>Màu sắc </th>
        <th>Hình Ảnh</th>
        <th>Danh mục</th>
        <th></th>
    </thead>
    <tbody>
        <?= $hang ?>
    </tbody>
</table>

