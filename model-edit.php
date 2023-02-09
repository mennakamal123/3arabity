<?php
include 'basic.php';
if (isset($_POST["name"])) {
  models_update($_POST["id"],$_POST["name"],$_POST["brand_id"]);
}
$model=models_edit($_GET["id"]);
$brands_list=brands_list();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Edit Model - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Edit Model</h1>
            <form action="model-edit.php" method="post">
                <div class="form-group mb-4">
                    <input hidden class="form-control" type="text" name="id" value="<?php echo $model["id"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $model["name"]; ?>">
                </div>
                <label for="brand">Name</label>
                <input class="form-control" type="text" name="brand" value="<?php echo $model["brand"]; ?>">
                <div class="form-group mb-4">
                    
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="models-list.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>
