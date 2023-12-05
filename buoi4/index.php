<?php
// while
$a=1;
while ($a<=10){
    // Nếu thỏa mãn điêù kiện 
    // Thực hiện code trong ngoặc
    echo $a.'<br>';
    //phải có sự tăng của biến kiểm tra

    $a++;
}

#do..,while

$tong=0;
$i=1;
do{
    $tong+=$i;
    $i++;
}while($i<=10);// nếu thỏa mãn điều kiện thid sẽ qlai do
echo "tổng: $tong".'<br>';

$arr=[1,2,3,4,5,6];
$tich=1;
$tong=0;
$tongle=0;
for($i=0;$i<count($arr);$i++){
    if($arr[$i]%2==0){
        $tong +=$arr[$i];
        
    }else{
        $tongle+=$arr[$i];
    }
    
    
   
}
echo "tong: $tong".'<br>';
echo "tong: $tongle".'<br>';

$array1=[
    "name"=>"Phi Đưc Chinh",
    "age"=>20,
    "Khoa"=>"CNTT",
    "GT"=>true,
    "result"=>[6,7,5,8,5,9]

];
$thongTin='Họ và tên:'.$array1['name'].'<br Tuổi:'.$array1['age'];
$tong=0;
foreach($array1["result"] as $value ){
echo $value.'<br>';
$tong+=$value;
}
echo $thongTin."<br> Tổng diểm = $tong";
foreach($tenArray as $key => $value){

}

$array2 =[
    [
        "name" => "Phí Đức Chính",
        "age" => 20,
        "khoa" => "Công nghệ thông tin",
        "gt" => true,
        "result" => [6,7.5,8.5,9]
    ],
    [
        "name" => "Đặng Thành Long",
        "age" => 21,
        "khoa" => "Ứng dụng phần mềm",
        "gt" => true,
        "result" => [5,9.5,10,9]
    ],
    [
        "name" => "Trần Thị Ngọc",
        "age" => 20,
        "khoa" => "Lập trình web",
        "gt" => false,
        "result" => [5,8.5,9,10]
    ],
    [
        "name" => "Đinh Ngọc Hồng",
        "age" => 22,
        "khoa" => "Ứng dụng phần mềm",
        "gt" => false,
        "result" => [4,6,8.5,10]
    ]
];

foreach($array2 as $key => $value){
    $tong = 0;
    foreach($value["result"] as $diem){
        $tong+=$diem;
    }
    echo "Họ và ten :". $value["name"]."Điểm:".$tong."<br>";

    
}
#function
function helo(){
    echo 'chào các bạn';
}
helo();

function tinhTong ($a,$b){
    return $a+$b;
}
$tong=tinhTong(3,4);
$tich = function($a,$b){
    return $a+$b;
};

/**
 * viết một hàm kiểm tra 1 số có phải số nguyên tố hay ko
 * sủ dụng hàm ktra trên  để làm bảo toán tinhs tích 
 * cách số nguyên tố trong một mảng
*/
// Hàm kiểm tra số nguyên tố
function isPrime($number) {
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

// Hàm tính tích các số nguyên tố trong mảng
function productOfPrimes($arr) {
    $product = 1;
    foreach ($arr as $value) {
        if (is_numeric($value) && isPrime($value)) {
            $product *= $value;
        }
    }
    return $product;
}


$numberToCheck = 17;
if (isPrime($numberToCheck)) {
    echo "$numberToCheck là số nguyên tố.<br>";
} else {
    echo "$numberToCheck không phải là số nguyên tố.<br>";
}

$arrayToCheck = [2, 3, 5, 7, 10, 13];
$result = productOfPrimes($arrayToCheck);
echo "\nTích của các số nguyên tố trong mảng là: $result";
?>