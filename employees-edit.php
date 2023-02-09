<?php
include 'basic.php';
if (isset($_POST["name"])) {
  employees_update($_POST["id"],$_FILES["image"],$_POST["name"],$_POST["phone"],$_POST["address"],$_POST["email"],$_POST["department_id"],$_POST["basic_salary"]);
}
$employee=employees_edit($_GET["id"]);
$departments_list=departments_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Edit Employee - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Edit Employee</h1>
            <form action="employees-edit.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <input  class="form-control" type="hidden" name="id" value="<?php echo $employee["id"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label>Image</label>
                    <img height class="city-logo-edit"" src="img/employees/<?php echo $employee["image"]; ?>" >
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group mb-4">
                    <label>name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $employee["name"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label>phone</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $employee["phone"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label>address</label>
                    <input class="form-control" type="text" name="address" value="<?php echo $employee["address"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label>email</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $employee["email"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label>department id</label>
                    <select class="form-control" name="department_id">
                        <?php while ($department=mysqli_fetch_assoc($departments_list)) {?>
                        <option <?php if ($department["id"]==$employee["department_id"]) {echo "SELECTED";} ?>
                            value="<?php echo $department["id"];  ?>"><?php echo $department["name"]; ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label>basic salary</label>
                    <input class="form-control" type="text" name="basic_salary"
                        value="<?php echo $employee["basic_salary"]; ?>">
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="employees-list.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>
