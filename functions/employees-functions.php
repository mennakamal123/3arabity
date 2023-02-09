<?php
function employees_list($status="active"){
    global $conn;
    if ($status=="active") {
        $sql = "SELECT employees.*,departments.name AS department_name FROM employees,departments WHERE departments.id =employees.department_id AND employees.active=1 ";
    }elseif ($status=="deleted") {
        $sql = "SELECT employees.*,departments.name AS department_name FROM employees,departments WHERE departments.id =employees.department_id AND employees.active=0 ";
    }
    $data=mysqli_query($conn,$sql);
    return $data;
}
function employees_new($name,$phone,$address,$email,$department_id,$basic_salary,$image="default.png"){
    global $conn;
    $sql ="INSERT INTO employees (name,phone,address,email,department_id,basic_salary,image) VALUES ('$name','$phone','$address','$email','$department_id','$basic_salary','$image')";
    mysqli_query($conn,$sql);
    header("Location: employees-list.php");
}
function employees_delete($id,$action){
    global $conn;
    if ($action=="delete") {
        $sql="UPDATE employees SET active=0 WHERE id='$id'";
        $location='employees-list.php';
    }elseif ($action=="restore") {
        $sql="UPDATE employees SET active=1 WHERE id='$id'";
        $location='employees-trash.php';
    }elseif($action=="forever"){
      $sql="DELETE FROM employees WHERE active=0 AND id='$id'";
      $location='employees-trash.php';
    }
    mysqli_query($conn,$sql);
    header("Location: $location");
}
function employees_edit($id){
    global $conn;
    $sql = "SELECT * FROM employees WHERE id='$id'";
    $employees_list = mysqli_query($conn,$sql);
    $employee = mysqli_fetch_assoc($employees_list);
    return $employee;
}
function employees_update($id,$image,$name,$phone,$address,$email,$department_id,$basic_salary){
    global $conn;
    if ($image!="") {
      $tmp_name=$image["tmp_name"];
      $location="img/employees/";

      $filename=strtolower($name);
      $filename=str_replace(" ","=",$filename);
      $filename=$filename."-photo.png";

      move_uploaded_file($tmp_name,$location.$filename);

      $sql ="UPDATE employees SET image='$filename',name='$name',phone='$phone',address='$address',email='$email',department_id='$department_id',basic_salary='$basic_salary'WHERE id='$id'";
    }else {
      $sql ="UPDATE employees SET name='$name',phone='$phone',address='$address',email='$email',department_id='$department_id',basic_salary='$basic_salary'WHERE id='$id'";

    }
    mysqli_query($conn,$sql);
    header("Location: employees-list.php");
}
?>
