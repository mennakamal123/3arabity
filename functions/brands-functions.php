<?php
function brands_list($status ="active"){
    global $conn;
    if ($status=="active") {
    $sql= "SELECT * FROM brands WHERE active=1";
    }elseif ($status =="deleted") {
    $sql= "SELECT * FROM brands WHERE active=0";
    }
    $data= mysqli_query($conn,$sql);
    return $data;
}
function brands_new($name,$image="default.png"){
  global $conn;
  $sql = "INSERT INTO brands (name,image) VALUES ('$name','$image')";
  mysqli_query($conn,$sql);
  header("Location: brands-list.php");
}
function brands_delete($id,$action){
    global $conn;
    if ($action=="restore") {
    $sql="UPDATE brands SET active=1 WHERE id='$id'";
    $location='brands-trash.php';
    }elseif ($action=="delete") {
    $sql="UPDATE brands SET active=0 WHERE id='$id'";
    $location='brands-list.php';
  }elseif ($action==forever) {
    $sql="DELETE FROM brands WHERE id='$id'";
    $location="brands-trash.php";
  }
    mysqli_query($conn,$sql);
    header("Location: $location");
}
function brands_edit($id){
    global $conn;
    $sql = "SELECT * FROM brands WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $brand = mysqli_fetch_assoc($data);
    return $brand;
}
function brands_update($id,$name,$image){
    global $conn;
    if ($image!=" ") {
      $tmp_name=$image["tmp_name"];
      $location="img/brands/";

      $filename=strtolower("$name");
      $filename=str_replace(" ","-",$filename);
      $filename=$filename."-logo.png";

      move_uploaded_file($tmp_name,$location.$filename);
      $sql = "UPDATE brands SET name='$name', image='$filename' WHERE id='$id'";
    }else {
      $sql = "UPDATE brands SET name='$name' WHERE id='$id'";
    }
    mysqli_query($conn,$sql);
    header("Location: brands-list.php");
}

?>
