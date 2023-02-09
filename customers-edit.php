<?php
include 'basic.php';
if (isset($_POST["name"])) {
  customers_update($_POST["id"],$_POST["name"],$_FILES["image"],$_POST["phone"],$_POST["address"],$_POST["email"],$_POST["bdate"],$_POST["id_number"],$_FILES["id_image"],$_POST["city_id"]);

}
$customer=customers_edit($_GET["id"]);
$cities_list=cities_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Edit Customer - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Edit Customer</h1>
            <form action="customers-edit.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $customer["id"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $customer["name"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Image">Image</label>
                    <img class="city-logo-edit" src="img/customers/<?php echo $customer["image"]; ?>" alt="">
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group mb-4">
                    <label for="Phone">Phone</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $customer["phone"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Address">Address</label>
                    <input class="form-control" type="text" name="address" value="<?php echo $customer["address"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Email">Email</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $customer["email"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Bdate">Birthday Date</label>
                    <input class="form-control" type="date" name="bdate" value="<?php echo $customer["bdate"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="ID Number">ID Number</label>
                    <input class="form-control" type="text" name="id_number"
                        value="<?php echo $customer["id_number"]; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="ID Image">ID Image</label>
                    <img class="city-logo-edit" src="img/customers_id/<?php echo $customer["id_image"]; ?>">
                    <input class="form-control" type="file" name="id_image">
                </div>
                <div class="form-group mb-4">
                    <label for="City">City</label>
                    <select class="form-control" name="city_id">
                        <?php while($city=mysqli_fetch_assoc($cities_list)){ ?>
                        <option <?php if($city["id"]== $customer["city_id"]){ echo "SELECTED";} ?>
                            value="<?php echo $city["id"]; ?>"><?php echo $city["name"];?></option>
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
