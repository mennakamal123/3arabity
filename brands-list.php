<?php
include 'basic.php';
if (isset($_GET["id"])) {
    brands_delete($_GET["id"],$_GET["action"]);
}
$data =brands_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Brands List - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Brands List</h1>
            <a class="btn btn-dark mt-5 " href="brands-new.php">New Brand</a>
            <table class="table table-dark table-bordered table-striped">
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
                        <a class="btn btn-primary" href="brands-edit.php?id=<?php echo $brand["id"]; ?>">Edit</a>
                        <a class="btn btn-danger"
                            href="brands-list.php?id=<?php echo $brand["id"]; ?>&action=delete">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>
