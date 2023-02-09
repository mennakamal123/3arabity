<?php
include 'basic.php';
if (isset($_GET["id"])) {
  employees_delete($_GET["id"],$_GET["action"]);
}
$data = employees_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Employee List - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">

</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Employees List</h1>
            <a class="btn btn-dark" href="employees-new.php">New Employee</a>
            <table class="table table-dark table-bordered table-striped">
                <tr>
                    <td><b>Image</b></td>
                    <td><b>Name</b></td>
                    <td><b>Phone</b></td>
                    <td><b>Address</b></td>
                    <td><b>Email</b></td>
                    <td><b>Department</b></td>
                    <td><b>Basic Salary</b></td>
                    <td><b>Actions</b></td>

                </tr>
                <?php while ($employee=mysqli_fetch_assoc($data)) {?>
                <tr>
                    <td> <img class="city-logo-list" src="img/employees/<?php echo $employee["image"]; ?>"> </td>
                    <td><?php echo $employee["name"]; ?></td>
                    <td><?php echo $employee["phone"]; ?></td>
                    <td><?php echo $employee["address"]; ?></td>
                    <td><?php echo $employee["email"]; ?></td>
                    <td><?php echo $employee["department_name"]; ?></td>
                    <td><?php echo $employee["basic_salary"]; ?></td>

                    <td>
                        <a class="btn btn-primary" href="employees-edit.php?id=<?php echo $employee["id"]; ?>">Edit</a>
                        <a class="btn btn-danger" href="employees-list.php?id=<?php echo $employee["id"]; ?>&action=delete">Delete</a>
                    </td>
                </tr>
                <?php } ?>

            </table>
        </div>
    </div>






</body>

</html>
