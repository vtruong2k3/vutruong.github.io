<?php
function checkSNT ($number){
    for($i=2;$i<=sqrt($number);$i++){
        if($number%$i==0){
            return false;
        }
    }
    return true;
}
//$x = 11;
//var_dump(checkSNT($x));
/*
$arr = [1,2,3,4,5,6,7,8];
foreach($arr as $value){
    if(checkSNT($value)){
        echo $value."<br>";
    }
}
*/
#date
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("Y-m-d H:i:s");
echo $date;
echo "<br>";
//echo "<br>".time();//1/1/1970

$now="2023-11-10 17:03:29";


$day = new DateTime($now);
print_r($day);
echo "<pre>";
$datetm=date_parse($now);//trả về 1 array các thông tin ngày tháng năm
print_r($datetm);
echo $datetm['year'].'<br>';

$day = new DateTime ($now);//trả về 1 đối tượng ngày
//nên sử dụng date_create
$day2= date_create($now);//trả về 1 dối tượng ngày
echo date_format($day,"d-m-Y")."<br>";
echo date_format($day2, 'H:i:s Y-m-d');//trả về kiẻu h phút giây


$array_select = [
    "run"=>"chạy",
    "swim"=>"bơi",
    "fly"=>"bay"
];
$options="";
foreach($array_select as $key => $value){
    $options.=' <option value="'.$key.'">'.$value.'</option>';
}
?>
<form action="index.php" method="post">
    <label for=""> Username </label>
    <input type="text" name="user">
    <label for="">Password</label>
    <input type="password" name ="pass">
    <select name="subject" id="">
        <option value="math">Toán</option>
        <option value="english">Tiếng anh</option>
        <option value="code">PHP</option>
    </select>
    <select name="doing" id=""></select>
    <input name="submit" type="submit" value="Gửi">

</form>
<?php

if(isset($_POST["submit"])){//isset để kiểm tra một biến có tồn tại hay ko

    $username = $_POST["user"];
    echo $username.'<br>';
    $password = $_POST["pass"];
    echo $password.'<br>';
    $select=$_POST["subject"];
    echo $select;
    
    }
?>
