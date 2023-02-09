<?php
  include 'basic.php';
if(isset($_POST["name"])){
  // echo $_FILES["image"]["name"];
  // echo $_FILES["image"]["size"];
  // echo $_FILES["image"]["type"];
  // echo $_FILES["image"]["tmp_name"];

  // $filename=str_replace(" ","-",strtolower($_POST["name"]))."-logo.png";

    cities_new($_POST["name"]);

  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Cities New - <?php echo $app_name; ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">New City</h1>
            <form action="cities-new.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label for="Image">Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group mb-4">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="cities-list.php">Back</a>
            </form>
        </div>
    </div>

</body>

</html>
