<?php
include 'basic.php';
if(isset($_GET["id"])){
  departments_delete($_GET["id"],$_GET["action"]);
}
$data=departments_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Departments List - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Departments List</h1>
            <a class="btn btn-dark" href="departments-new.php">New Department</a>
            <table class="table table-dark table-bordered table-striped">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Actions</b></td>
                </tr>
                <?php while($department=mysqli_fetch_assoc($data)){ ?>
                <tr>
                    <td><?php echo $department["name"] ?></td>
                    <td>
                        <a class="btn btn-primary"
                            href="departments-edit.php?id=<?php echo $department["id"]; ?>">Edit</a>
                        <a class="btn btn-danger"
                            href="departments-list.php?id=<?php echo $department["id"]; ?>&action=delete">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>
