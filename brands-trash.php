<?php
include 'basic.php';
if (isset($_GET["id"])) {
    brands_delete($_GET["id"],$_GET["action"]);
}
$data =brands_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Brands Trash - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Brands Trash</h1>
            <table class="table table-dark table-bordered table-striped ">
                <tr>
                  <td><b>Logo</b></td>
                    <td><b>Name</b></td>
                    <td><b>Actions</b></td>
                </tr>
                <?php while($brand = mysqli_fetch_assoc($data)) {?>
                <tr>
                  <td><img class="city-logo-list" src="img/brands/<?php echo $brand["image"]; ?>"></td>
                  <td><?php echo $brand["name"]; ?></td>
                    <td>
                        <a class="btn btn-primary" href="brands-trash.php?id=<?php echo $brand["id"]; ?>&action=restore">Restore</a>
                        <a class="btn btn-danger" href="brands-trash.php?id=<?php echo $brand["id"]; ?>&action=forever">Force Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>
