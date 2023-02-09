<?php
function colors_list($status="active"){
    global $conn;
    if ($status=="active") {
        $sql = "SELECT * FROM colors WHERE active=1";
    }elseif($status=="deleted"){
        $sql = "SELECT * FROM colors WHERE active=0";
    }
    $data = mysqli_query($conn,$sql);
    return $data;
}
function colors_new($name,$code){
    global $conn;
    $sql="INSERT INTO colors (name,code) VALUES ('$name','$code')";
    mysqli_query($conn,$sql);
    header("Location: colors-list.php");
}
function colors_delete($id,$action){
    global $conn;
    if ($action=="restore") {
        $sql="UPDATE colors SET active=1 WHERE id='$id'";
        $location='colors-trash.php';
    }elseif($action=="delete"){
        $sql="UPDATE colors SET active=0 WHERE id='$id'";
        $location='colors-list.php';
    }elseif ($action=="forever") {
      $sql="DELETE FROM colors WHERE id='$id'";
      $location="colors-trash.php";
    }
    mysqli_query($conn,$sql);
    header("Location: $location");
}
function colors_edit($id){
    global $conn;
    $sql = "SELECT * FROM colors WHERE id='$id'";
    $data = mysqli_query($conn,$sql);
    $color = mysqli_fetch_assoc($data);
    return $color;
}
function colors_update($id,$name,$code){
    global $conn;
    $sql="UPDATE colors SET name = '$name',code='$code' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("Location: colors-list.php");
}
?>
