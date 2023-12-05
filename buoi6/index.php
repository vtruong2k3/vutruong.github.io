<form action="index.php" method="post">
<label for="">Môn học</label><br>
<input type="checkbox" name="subject[]" value="toan" id="toan " checked>Toán <br>
<input type="checkbox" name="subject[]" value="van" id="van">Văn <br>
<input type="checkbox" name="subject[]" value="anh" id="anh">Anh <br>


<label for="">Hoạt động</label><br>
<input type="radio" name="action" value="run" id="" checked> chạy <br>
<input type="radio" name="action" value="swim" id="">bơi<br>
<input type="radio" name="action" value="do" id="">nhảy<br>


<textarea name="note" id="" cols="30" rows="10"></textarea>

<input type="submit" name="submit">
</form>
<?php
/*if(isset($_POST["submit"])){
$subject = $_POST["subject"];
print_r($subject)."<br>";//do checkbox có thể chọn nhìu
}
foreach($subject as $value){
    echo $value."<br>";
}*/
$act = $_POST["action"];
echo $act."<br>";
$not=$_POST["note"];
echo $not."<br>";

?>