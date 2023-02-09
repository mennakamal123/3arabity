<?php
include 'basic.php';
if (isset($_POST["name"])) {
  departments_new($_POST["name"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>New Department - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">New Department</h1>
            <form class="" action="departments-new.php" method="post">
                <div class="form-group mb-4">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="">
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="departments-list.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>
