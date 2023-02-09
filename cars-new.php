<?php
include 'basic.php';
if (isset($_POST["model_id"])) {
  $name=$_FILES["image"]["tmp_name"];
  $location="img/cars/";

  $filename=strtolower($_POST["plate_number"]);
  $filename=str_replace(" ","-",$filename);
  $filename=$filename."-photo.png";

  move_uploaded_file($name,$location.$filename);

if ($_FILES["image"]["name"]=="") {
  cars_new($_POST["model_id"],$_POST["color_id"],$_POST["plate_number"],$_POST["year_id"],$_POST["price_per_hour"]);
}else {
  cars_new($_POST["model_id"],$_POST["color_id"],$_POST["plate_number"],$_POST["year_id"],$_POST["price_per_hour"],$filename);
}

}
$models_list=models_list();
$colors_list=colors_list();
$years_list=years_list();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>New Cars - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">New Car</h1>
            <form action="cars-new.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label for="image">Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group mb-4">
                    <label for="model_id">Model</label>
                    <select class="form-control" name="model_id">
                        <?php while ($model=mysqli_fetch_assoc($models_list)) {?>
                        <option value="<?php echo $model["id"]; ?>"><?php echo $model["name"]; ?></option>
                        <?php   } ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="color_id">Color</label>
                    <select class="form-control" name="color_id">
                        <?php while ($color=mysqli_fetch_assoc($colors_list)) {?>
                        <option value="<?php echo $color["id"]; ?>"><?php echo $color["name"]; ?></option>
                        <?php   } ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="plate_number">Plate Number</label>
                    <input class="form-control" type="text" name="plate_number">
                </div>
                <div class="form-group mb-4">
                    <label for="year_id">Year Id</label>
                    <select class="form-control" name="year_id">
                        <?php while ($year=mysqli_fetch_assoc($years_list)) {?>
                        <option value="<?php echo $year["id"]; ?>"><?php echo $year["name"]; ?></option>
                        <?php   } ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="price_per_hour">Price Per Hour</label>
                    <input class="form-control" type="text" name="price_per_hour">
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="cars-list.php">Back</a>
            </form>
        </div>
    </div>

</body>

</html>
