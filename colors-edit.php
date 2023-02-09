<?php
include 'basic.php';
if (isset($_POST["name"])) {
  colors_update($_POST["id"],$_POST["name"],$_POST["code"]);
}
$color=colors_edit($_GET["id"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Edit Color - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Edit Color</h1>
            <form action="colors-edit.php" method="post">
                <div class="form-group mb-4">
                    <input  class="form-control" type="hidden" name="id" value="<?php echo $color["id"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $color["name"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Code">Code</label>
                    <input class="form-control" type="text" name="code" value="<?php echo $color["code"]; ?>">
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="colors-list.php">Back</a>
            </form>
        </div>
    </div>

</body>

</html>
