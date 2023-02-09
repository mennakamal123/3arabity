<?php
include 'basic.php';
if (isset($_POST["name"])) {
  $name=$_FILES["image"]["tmp_name"];
  $location="img/customers/";
  $filename=strtolower($_POST["name"]);
  $filename=str_replace(" ","-",$filename);
  $filename=$filename."-logo.png";
  move_uploaded_file($name,$location.$filename);

  $tmp_id=$_FILES["id_image"]["tmp_name"];
  $id_location="img/customers_id/";

  $fileid=strtolower($_POST["name"]);
  $fileid=str_replace(" ","-",$fileid);
  $fileid=$fileid."-id.png";
  move_uploaded_file($tmp_id,$id_location.$fileid);
  if ($_FILES["image"]["name"] || $_FILES["id_image"]["name"]=="") {
    customers_new($_POST["name"],$_POST["phone"],$_POST["address"],$_POST["email"],$_POST["bdate"],$_POST["id_number"],$_POST["city_id"]);
  }else {
    customers_new($_POST["name"],$_POST["phone"],$_POST["address"],$_POST["email"],$_POST["bdate"],$_POST["id_number"],$_POST["city_id"],$filename,$fileid);
  }
}
$cities_list= cities_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>New Customer - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">New Customer</h1>
            <form action="customers-new.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group mb-4">
                    <label for="Image">Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group mb-4">
                    <label for="Phone">Phone</label>
                    <input class="form-control" type="text" name="phone">
                </div>
                <div class="form-group mb-4">
                    <label for="Address">Address</label>
                    <input class="form-control" type="text" name="address">
                </div>
                <div class="form-group mb-4">
                    <label for="Email">Email</label>
                    <input class="form-control" type="email" name="email">
                </div>
                <div class="form-group mb-4">
                    <label for="Bdate">Birthday Date</label>
                    <input class="form-control" type="date" name="bdate">
                </div>
                <div class="form-group mb-4">
                    <label for="ID Number">ID Number</label>
                    <input class="form-control" type="text" name="id_number">
                </div>
                <div class="form-group mb-4">
                    <label for="ID Image">ID Image</label>
                    <input class="form-control" type="file" name="id_image">
                </div>
                <div class="form-group mb-4">
                    <label for="City">City</label>
                    <select class="form-control" name="city_id">
                        <?php while($city=mysqli_fetch_assoc($cities_list)){ ?>
                        <option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="customers-list.php">Back</a>
            </form>
        </div>
    </div>

</body>

</html>
