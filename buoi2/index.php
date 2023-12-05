<?php 
/*
#Toán tử 3 ngôi
$check = false;
$result = $check == true ? "Đúng":"Sai";

echo $result;
echo "<br>";
    // Lầy giá trị của biến $a cho tên biến của $$a
    $a="abc";
    $$a="ĐẸP TRAI";

    echo $abc.'<br>';

    #Ép kiểu

    $a= "123";
    $b=(int) $a; //ép về kiểu số nguyên

    $c=(float) $a;
    $d=(boolean) $a;
    $f=(string) $d;
    var_dump($c); // kiểm tra kiểu dữ liệu
    */
    

    #Mảng

    $arr=array(1,2,3,4);
    $arr1=['a','b','c'];
    

    //thêm phầm tử vào mảng

    $arr1[]='e';
    array_push($arr1,'f','h');//có thể thêm một hoặc nhiều phần tử vào cuối mảng
    array_unshift($arr1,'0');// thêm phần tử vào đầu mảng
    array_splice($arr1,3,0,'Trường');//thêm một phần tử vào sau vị trí số 3 hoặc số bất kì 

    //xóa phần tử mảng
    unset($arr[1]);//xóa đi phần tử ở vị trí chỉ định
    array_pop($arr1);//xóa đi phần tử cuối cx
    array_shift($arr1);//xóa đi phần tử đầu tiên
    array_slice($arr1,1,2,'w');//xóa đi phần tử ở vị trí bắt đầu và xóa đi length phần tử


    echo '<pre>';
    print_r($arr);
    print_r($arr1);
    echo '</pre>';
?>