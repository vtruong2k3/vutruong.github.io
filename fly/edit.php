<?php
include_once("connect.php");
$id="";
$flight_number='';
$image='';
$total_passengers='';
$description='';
$airline_id='';
$option='';
$isCheck=true;

if(isset($_GET["id"])){
    $id=$_GET["id"];
    if($id){
        try{
            $sql="SELECT * FROM flights WHERE id=$id";
            $result=$conn->query($sql);
            if($result){
                $listflights=$result->fetch(PDO::FETCH_ASSOC);

              if($listflights){
                $id=$listflights["id"];
                $flight_number=$listflights["flight_number"];
                $image=$listflights["image"];
                $total_passengers=$listflights["total_passengers"];
                $description=$listflights["description"];
                $airline_id=["airline_id"];
              }
            }
        }catch(\Throwable $th){

            echo "không thấy máy bay";
            die();
        }
       
    }
  
}

if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $flight_number=$_POST["flight_number"];
    $image=$_FILES["image"];
    $total_passengers=$_POST["total_passengers"];
    $description=$_POST["description"];
    $airline_id=$_POST["airline_id"];

    if($isCheck){
        $filename=$image["name"];
        $sql="";
        if($filename){
            $filename=time().$filename;
            $uploads='uploads/'.$filename;
            if(move_uploaded_file($image["tmp_name"],$uploads)){
                $sql="UPDATE flights 
                SET flight_number='$flight_number',image='$filename',total_passengers='$total_passengers',description='$description',airline_id='$airline_id'
                WHERE id='$id'";

            }
        }else{
            $sql="UPDATE flights 
                SET flight_number='$flight_number',total_passengers='$total_passengers',description='$description',airline_id='$airline_id'
                WHERE id='$id'";
        }
        $result=$conn->query($sql);
        if($result){
            header('Location: index.php');
        }

    }else{
        echo "không thấy máy bay";
        die();
    }
}


$sql="SELECT*FROM airlines";
$result=$conn->query($sql);
if($result){
    $airlines=$result->fetchAll(PDO::FETCH_ASSOC);
    if($airlines){
        foreach($airlines as $item){
            $option.='<option '.($item["id"] == $airline_id ? 'selected': '' ).' value="'.$item["id"].'">'.$item["airline_name"].'</option>';

        }
    }
}
?>

<form action="edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name ="id" value="<?= $id ?>">
<label for="">Flight Number</label>
<input type="text" name="flight_number" value="<?= $flight_number ?>"><br>
<input type="file" name="image" value="<?= $image ?>"><br>
<label for="">Total Passengers</label>
<input type="text" name="total_passengers"value="<?= $total_passengers ?>"><br>
<label for="">Description</label>
<input type="text" name="description" value="<?= $description ?>"><br>
<select name="airline_id" id="">
    <?= $option ?>
</select><br>
<img src="uploads/<?=$image?>" alt="" style="width: 150px;">
<input type="submit" name="submit" id="Gửi">

</form>