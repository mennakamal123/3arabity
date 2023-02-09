<?php
include 'basic.php';
if (isset($_POST["name"])) {
  $name=$_FILES["image"]["tmp_name"];
  $location="img/employees/";

  $filename=strtolower($_POST["name"]);
  $filename=str_replace(" ","-",$filename);
  $filename=$filename."-photo.png";

  move_uploaded_file($name,$location.$filename);
  if ($_FILES["image"]["name"]=="") {
    employees_new($_POST["name"],$_POST["phone"],$_POST["address"],$_POST["email"],$_POST["department_id"],$_POST["basic_salary"]);
  }else {
    employees_new($_POST["name"],$_POST["phone"],$_POST["address"],$_POST["email"],$_POST["department_id"],$_POST["basic_salary"],$filename);

  }
}
$departments_list=departments_list();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>New Employee - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">New employee</h1>
            <form action="employees-new.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label>Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group mb-4">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group mb-4">
                    <label>Phone</label>
                    <input class="form-control" type="text" name="phone">
                </div>
                <div class="form-group mb-4">
                    <label>Address</label>
                    <input class="form-control" type="text" name="address">
                </div>
                <div class="form-group mb-4">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email">
                </div>
                <div class="form-group mb-4">
                    <label>Department ID</label>
                    <select class="form-control" name="department_id">
                        <?php while ($department=mysqli_fetch_assoc($departments_list)) { ?>
                        <option value="<?php echo $department["id"]; ?>"> <?php echo $department["name"]; ?></option>
                        <?php  } ?>

                    </select>
                </div>
                <div class="form-group mb-4">
                    <label>Basic Salary</label>
                    <input class="form-control" type="text" name="basic_salary">
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="employees-list.php">Back</a>
            </form>
        </div>
    </div>

</body>

</html>
