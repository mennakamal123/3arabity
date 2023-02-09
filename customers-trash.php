<?php
include 'basic.php';
if (isset($_GET["id"])) {
  customers_delete($_GET["id"],$_GET["action"]);
}
$data=customers_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Customers Trash - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Customers List</h1>
            <table class="table table-dark table-bordered table-striped ">
                <tr>
                    <td><b>Image</b></td>
                    <td><b>Name</b></td>
                    <td><b>Phone</b></td>
                    <td><b>Address</b></td>
                    <td><b>Email</b></td>
                    <td><b>Bdate</b></td>
                    <td><b>ID Number</b></td>
                    <td><b>ID Image</b></td>
                    <td><b>City</b></td>
                    <td><b>Actions</b></td>
                </tr>
                <?php while ($customer= mysqli_fetch_assoc($data)) {?>
                <tr>
                    <td> <img class="city-logo-list" src="img/customers/<?php echo $customer["image"]; ?>"> </td>
                    <td><?php echo $customer["name"]; ?></td>
                    <td><?php echo $customer["phone"]; ?></td>
                    <td><?php echo $customer["address"]; ?></td>
                    <td><?php echo $customer["email"]; ?></td>
                    <td><?php echo $customer["bdate"]; ?></td>
                    <td><?php echo $customer["id_number"]; ?></td>
                    <td> <img class="city-logo-list" src="img/customers_id/<?php echo $customer["id_image"]; ?>"> </td>
                    <td><?php echo $customer["city_name"]; ?></td>
                    <td>
                        <a class="btn btn-primary" href="customers-trash.php?id=<?php echo $customer["id"]; ?>&action=restore">Restore</a>
                        <a class="btn btn-danger" href="customers-trash.php?id=<?php echo $customer["id"]; ?>&action=forever">Force Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>
