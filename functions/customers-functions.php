<?php
function customers_list($status = "active"){
  global $conn;
  if ($status=="active") {
    $sql = "SELECT customers.*,cities.name AS city_name FROM customers,cities WHERE cities.id=customers.city_id AND customers.active=1";
  }elseif ($status == "deleted") {
    $sql = "SELECT customers.*,cities.name AS city_name FROM customers,cities WHERE cities.id=customers.city_id AND customers.active=0" ;
  }
  $data = mysqli_query($conn,$sql);
  return $data;
}
function customers_new($name,$phone,$address,$email,$bdate,$id_number,$city_id,$image="default.png",$id_image="default.png"){
  global $conn;
  $sql ="INSERT INTO customers (name,image,phone,address,email,bdate,
  id_number,id_image,city_id)VALUES('$name','$image','$phone','$address',
  '$email','$bdate','$id_number','$id_image','$city_id')";
  mysqli_query($conn,$sql);
  header("Location: customers-list.php");

}
function customers_delete($id,$action){
  global $conn;
  if ($action == "delete") {
    $sql="UPDATE customers SET active=0 WHERE id='$id'";
    $location='customers-list.php';
  }elseif($action=="restore"){
    $sql="UPDATE customers SET active=1 WHERE id='$id'";
    $location='customers-trash.php';
  }elseif ($action =="forever") {
    $sql="DELETE FROM customers WHERE id='$id'";
    $location='customers-trash.php';

  }
  mysqli_query($conn,$sql);
  header("Location: $location");
}
function customers_edit($id){
  global $conn;
  $sql = "SELECT * FROM customers WHERE id='$id'";
  $customers_list = mysqli_query($conn,$sql);
  $customer = mysqli_fetch_assoc($customers_list);
  return $customer;
}
function customers_update($id,$name,$image,$phone,$address,$email,$bdate,$id_number, $id_image,$city_id){
  global $conn;
  if($image["name"]!="" || $id_number!=""){
    $tmp_name=$image["tmp_name"];
    $location="img/customers/";
    $filename=strtolower($name);
    $filename=str_replace(" ",'-',$filename);
    $filename=$filename."-logo.png";
    move_uploaded_file($tmp_name,$location.$filename);
      $tmp_id=$id_image["tmp_name"];
      $id_location="img/customers_id/";

      $fileid=strtolower($name);
      $fileid=str_replace(" ","-",$fileid);
      $fileid=$fileid."-id.png";
      move_uploaded_file($tmp_id,$id_location.$fileid);
    $sql ="UPDATE customers SET name='$name',image='$filename',phone='$phone',address='$address',email='$email',bdate='$bdate',id_number='$id_number',id_image='$fileid',city_id='$city_id' WHERE id='$id'";
// }elseif ($id_image!="") {
//   $sql ="UPDATE customers SET name='$name',phone='$phone',address='$address',email='$email',bdate='$bdate',id_number='$id_number',id_image='$id_image',city_id='$city_id' WHERE id='$id'";
}else {
  $sql ="UPDATE customers SET name='$name',phone='$phone',address='$address',email='$email',
  bdate='$bdate',id_number='$id_number'city_id='$city_id' WHERE id='$id'";
}
mysqli_query($conn,$sql);
header("Location: customers-list.php");
}
 ?>
