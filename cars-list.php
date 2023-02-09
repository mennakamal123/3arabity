<?php
include 'basic.php';
if (isset($_GET["id"])) {
    cars_delete($_GET["id"],$_GET["action"]);
}
$data = cars_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Cars List - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Cars List</h1>
            <a class="btn btn-dark mt-5 " href="cars-new.php">New Car</a>
            <table class="table table-dark table-bordered table-striped">
                <tr>
                    <td><b>Image</b></td>
                    <td><b>Model</b></td>
                    <td><b>Color</b></td>
                    <td><b>Plate Number </b></td>
                    <td><b>Year</b></td>
                    <td><b>Price Per Hour</b></td>
                    <td><b>Actions</b></td>
                </tr>
                <?php while ($car= mysqli_fetch_assoc($data)) {?>
                <tr>
                    <td> <img class="city-logo-list" src="img/cars/<?php echo $car["image"] ?>" alt=""> </td>
                    <td><?php echo $car["model_name"] ?></td>
                    <td><?php echo $car["color_name"] ?></td>
                    <td><?php echo $car["plate_number"] ?></td>
                    <td><?php echo $car["year_name"] ?></td>
                    <td><?php echo $car["price_per_hour"] ?></td>
                    <td>
                        <a class="btn btn-primary" href="cars-edit.php?id=<?php echo $car["id"]; ?>">Edit</a>
                        <a class="btn btn-danger" href="cars-list.php?id=<?php echo $car["id"]; ?>&action=delete">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>

</html>
