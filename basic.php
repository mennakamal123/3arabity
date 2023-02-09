<?php
$conn =mysqli_connect('localhost','root','','CarForYou');
$app_name="CarForYou";
$logo="cairo-logo.png";
include 'functions/all.php';
session_start();
$si="/new/CarForYou/sign-in.php";
$su="/new/CarForYou/sign-up.php";
if ($_SERVER["REQUEST_URI"]!=$si && $_SERVER["REQUEST_URI"]!=$su) {
  if(!isset($_SESSION["username"])){
    header("Location: sign-in.php");
  }
}

 ?>
