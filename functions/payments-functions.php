<?php
function payments_list($status="active"){
  global $conn;
  if ($status=="active") {
    $sql="SELECT * FROM payment_method WHERE active=1";
  }elseif ($status=="deleted") {
    $sql="SELECT * FROM payment_method WHERE active=0";
  }
  $data=mysqli_query($conn,$sql);
  return $data;
}
function payments_new($name){
    global $conn;
    $sql="INSERT INTO payment_method (name) VALUES ('$name')";
    mysqli_query($conn,$sql);
    header("Location: payment-list.php");
}
function payments_delete($id,$action){
    global $conn;
    if($action=="delete"){
        $sql="UPDATE payment_method SET active=0 WHERE id='$id'";
        $location='payment-list.php';
    }elseif ($action=="restore") {
        $sql="UPDATE payment_method SET active=1 WHERE id='$id'";
        $location='payment-trash.php';
    }elseif ($action==forever) {
      $sql="DELETE FROM payment_method WHERE id='$id'";
      $location="payment-trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location: $location");
}
function payments_edit($id){
    global $conn;
    $sql = "SELECT * FROM payment_method WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $payment_method = mysqli_fetch_assoc($data);
    return $payment_method;
}
function payments_update($id,$name){
    global $conn;
    $sql="UPDATE payment_method SET name='$name' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("Location: payment-list.php");
}

?>
