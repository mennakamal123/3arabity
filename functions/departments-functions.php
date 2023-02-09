<?php
function departments_list($status="active"){
    global $conn;

    if ($status=="active") {
    $sql="SELECT * FROM departments WHERE active=1";
    }elseif ($status=="deleted") {
        $sql="SELECT * FROM departments WHERE active=0";
    }
    $data=mysqli_query($conn,$sql);
    return $data;
}
function departments_new($name){
    global $conn;
    $sql="INSERT INTO departments (name) VALUES ('$name')";
    mysqli_query($conn,$sql);
    header("Location: departments-list.php");
}
function departments_delete($id,$action){
    global $conn;
    if ($action=="restore") {
        $sql="UPDATE departments SET active=1 WHERE id='$id'";
        $location='departments-trash.php';
    }elseif ($action=="delete") {
        $sql="UPDATE departments SET active=0 WHERE id='$id'";
        $location='departments-list.php';
    }elseif ($action==forever) {
      $sql="DELETE FROM departments WHERE id='$id'";
      $location='departments-trash.php';
    }
    mysqli_query($conn,$sql);
    header("Location: $location");
}
function departments_edit($id){
    global $conn;
    $sql="SELECT * FROM departments WHERE id='$id'";
    $data=mysqli_query($conn,$sql);
    $department=mysqli_fetch_assoc($data);
    return $department;
}
function departments_update($id,$name){
    global $conn;
    $sql="UPDATE departments SET name='$name' WHERE id='$id'";
     mysqli_query($conn,$sql);
     header("Location: departments-list.php");
}
?>
