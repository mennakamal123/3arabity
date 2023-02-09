<?php
include 'basic.php';
if(isset($_POST["name"])){
  models_new($_POST["name"],$_POST["brand_id"]);
}
$brands_list=brands_list();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>New Model - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">New Model</h1>
            <form action="model-new.php" method="post">
                <div class="form-group mb-4">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group mb-4">
                    <label for="brand_id">Brand</label>
                    <select class="form-control" name="brand_id">
                        <?php while ($brand=mysqli_fetch_assoc($brands_list)) {?>
                        <option value="<?php echo $brand["id"]; ?>"><?php echo $brand["name"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="models-list.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>
