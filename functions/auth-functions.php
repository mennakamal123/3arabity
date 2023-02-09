<?php
function get_user($username){
  global $conn;
  $sql="SELECT * FROM users WHERE username='$username'";
  $data=mysqli_query($conn,$sql);
  $rec=mysqli_fetch_assoc($data);
  return $rec;
}
function create_user($fullname,$username,$pass){
  global $conn;
  $password=password_hash($pass,PASSWORD_BCRYPT);
  $sql="INSERT INTO users (fullname,username,password) VALUES ('$fullname','$username','$password')";
  mysqli_query($conn,$sql);
  header("Location: sign-in.php");
}
 ?>
