<?php
function cars_list($status="active"){
    global $conn;
    if($status=="active"){
    $sql="SELECT cars.*,model.name AS model_name,colors.name AS color_name,years.name AS year_name FROM cars,model,colors,years WHERE model.id=cars.model_id AND colors.id=cars.color_id AND years.id=cars.year_id AND cars.active=1";
    }elseif ($status=="deleted") {
        $sql="SELECT cars.*,model.name AS model_name,colors.name AS color_name,years.name AS year_name FROM cars,model,colors,years WHERE model.id=cars.model_id AND colors.id=cars.color_id AND years.id=cars.year_id AND cars.active=0";
    }
    $data = mysqli_query($conn,$sql);
    return $data;
}
function cars_new($model_id,$color_id,$plate_number,$year_id,$price_per_hour,$image="default.png"){
    global $conn;
    $sql ="INSERT INTO cars (model_id,color_id,plate_number,year_id,price_per_hour,image)VALUES('$model_id','$color_id','$plate_number','$year_id',
    '$price_per_hour','$image')";
    mysqli_query($conn,$sql);
    header("Location: cars-list.php");
}
function cars_delete($id,$action){
    global $conn;
    if ($action=="delete") {
        $sql="UPDATE cars SET active=0 WHERE id='$id'";
        $location='cars-list.php';
    }elseif ($action=="restore") {
        $sql="UPDATE cars SET active=1 WHERE id='$id'";
        $location='cars-trash.php';
    }elseif ($action=="forever") {
      $sql="DELETE FROM cars WHERE id='$id'";
      $location='cars-trash.php';
    }
    mysqli_query($conn,$sql);
    header("Location: $location");
}
function cars_edit($id){
    global $conn;
    $sql = "SELECT * FROM cars WHERE id='$id'";
    $cars_list = mysqli_query($conn,$sql);
    $car = mysqli_fetch_assoc($cars_list);
    return $car;
}
function cars_update($id,$image,$model_id,$color_id,$plate_number,$year_id,$price_per_hour){
    global $conn;
    if ($image!="") {
      $tmp_name=$image["tmp_name"];
      $location="img/cars/";

      $filename=strtolower($plate_number);
      $filename=str_replace(" ","-",$filename);
      $filename=$filename."-photo.png";

      move_uploaded_file($tmp_name,$location.$filename);
      $sql = "UPDATE cars SET image='$filename',model_id='$model_id',color_id='$color_id',plate_number='$plate_number',year_id='$year_id',price_per_hour='$price_per_hour' WHERE id='$id'";
    }else {
      $sql = "UPDATE cars SET model_id='$model_id',color_id='$color_id',plate_number='$plate_number',year_id='$year_id',price_per_hour='$price_per_hour' WHERE id='$id'";

    }
    mysqli_query($conn,$sql);
    header("Location: cars-list.php");
}
?>
