<?php
include 'basic.php';
if(isset($_GET["id"])){
  departments_delete($_GET["id"],$_GET["action"]);
}
$data=departments_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Departments Trash - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Departments Trash</h1>
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
                            href="departments-trash.php?id=<?php echo $department["id"]; ?>&action=restore">Restore</a>
                        <a class="btn btn-danger"
                            href="departments-trash.php?id=<?php echo $department["id"]; ?>&action=forever">Force Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>
