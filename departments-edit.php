<?php
include 'basic.php';
if (isset($_POST["name"])) {
  departments_update($_POST["id"],$_POST["name"]);
}
$department=departments_edit($_GET["id"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Edit Department - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Edit Department</h1>
            <form action="departments-edit.php" method="post">
                <div class="form-group mb-4">
                    <input  class="form-control" type="hidden" name="id" value="<?php echo $department["id"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $department["name"]; ?>">
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="departments-list.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>
