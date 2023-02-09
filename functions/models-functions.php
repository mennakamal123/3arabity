<?php
function models_list($status="active"){
    global $conn;
    if ($status=="active") {
        $sql= "SELECT model.*,brands.name as brand_name FROM model,brands WHERE brands.id=model.brand_id AND model.active=1";
    }elseif ($status=="deleted") {
        $sql= "SELECT model.*,brands.name as brand_name FROM model,brands WHERE brands.id=model.brand_id AND model.active=0";
    }
    $data= mysqli_query($conn,$sql);
    return $data;
}
function models_new($name,$brand_id){
    global $conn;
    $sql="INSERT INTO model (name,brand_id) VALUES ('$name','$brand_id')";
    mysqli_query($conn,$sql);
    header("Location: models-list.php");
}
function models_delete($id,$action){
    global $conn;
    if($action=="restore"){
        $sql="UPDATE model SET active=1 WHERE id='$id'";
        $location='model-trash.php';
    }elseif($action=="delete"){
        $sql="UPDATE model SET active=0 WHERE id='$id'";
        $location='model-list.php';
    }elseif ($action=="forever") {
          $sql="DELETE FROM model WHERE id='$id'";
          $location="model-trash.php";
    }

    mysqli_query($conn,$sql);
    header("Location: $location");
}
function models_edit($id){
    global $conn;
    $sql="SELECT * FROM model WHERE id='$id'";
    $data=mysqli_query($conn,$sql);
    $model=mysqli_fetch_assoc($data);
    return $model;
}
function models_update($id,$name,$brand_id){
    global $conn;
    $sql = "UPDATE model SET name='$name',brand_id='$brand_id'WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("Location: model-list.php");
}


?>
