<?php
function years_list($status="active"){
    global $conn;
    if($status=="active"){
        $sql="SELECT * FROM years WHERE active=1";
    }elseif ($status=="deleted") {
        $sql="SELECT * FROM years WHERE active=0";
    }
    $data=mysqli_query($conn,$sql);
    return $data;
}
function years_new($name){
    global $conn;
    $sql="INSERT INTO years (name) VALUES ('$name')";
    mysqli_query($conn,$sql);
    header("Location: years-list.php");

}
function years_delete($id,$action){
    global $conn;
    if($action=="restore"){
        $sql="UPDATE years SET active=1 WHERE id='$id'";
        $location='years-trash.php';
    }elseif ($action=="delete") {
        $sql="UPDATE years SET active=0 WHERE id='$id'";
        $location='years-list.php';
    }elseif ($action==forever) {
      $sql="DELETE FROM years WHERE id='$id'";
      $location="years-trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location: $location");

}
function years_edit($id){
    global $conn;
    $sql="SELECT * FROM years WHERE id='$id'";
    $data=mysqli_query($conn,$sql);
    $year=mysqli_fetch_assoc($data);
    return $year;
}
function years_update($id,$name){
    global $conn;
    $sql="UPDATE years SET name='$name' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("Location: years-list.php");
}

?>
