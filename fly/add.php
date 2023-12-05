<?php 
include_once("connect.php");

$flight_number='';
$image='';
$total_passengers='';
$description='';
$airline_id='';
$option='';
$isCheck=true;

if(isset($_POST["submit"])){
    $flight_number=$_POST["flight_number"];
    $image=$_FILES["image"];
    $total_passengers=$_POST["total_passengers"];
    $description=$_POST["description"];
    $airline_id=$_POST["airline_id"];

    //echo "<pre>";
    //print_r([$flight_number,$image,$total_passengers,$description,$airline_id]);


    $filename=$image["name"];

    if($isCheck){
        $filename=time().$filename;
        $uploads='uploads/'.$filename;


        if(move_uploaded_file($image["tmp_name"],$uploads)){
            $sql="INSERT INTO flights(flight_number,image,total_passengers,description,airline_id)
                    VALUES ('$flight_number','$filename','$total_passengers','$description','$airline_id')
            ";

            $result=$conn->query($sql);
            if($result){
                header('Location: index.php');
            }
        }
    }
    

}

$sql="SELECT*FROM airlines";
$result=$conn->query($sql);
if($result){
    $airlines=$result->fetchAll(PDO::FETCH_ASSOC);
    if($airlines){
        foreach($airlines as $item){
            $option.='<option value="'.$item["id"].'">'.$item["airline_name"].'</option>';

        }
    }
}


?>


<form action="add.php" method="post" enctype="multipart/form-data">
<label for="">Flight Number</label>
<input type="text" name="flight_number" id=""><br>
<input type="file" name="image" id=""><br>
<label for="">Total Passengers</label>
<input type="text" name="total_passengers" id=""><br>
<label for="">Description</label>
<input type="text" name="description" id=""><br>
<select name="airline_id" id="">
    <?= $option ?>
</select><br>
<input type="submit" name="submit" id="Gửi">

</form>