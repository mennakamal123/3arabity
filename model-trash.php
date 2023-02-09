<?php
include 'basic.php';
if(isset($_GET["id"])){
    models_delete($_GET["id"],$_GET["action"]);
}
$data=models_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Models Trash - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Models Trash</h1>
            <table class="table table-dark table-bordered table-striped">
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Name</b></td>
                    <td><b>Brand</b></td>
                    <td><b>Actions</b></td>
                </tr>
                <?php while($model = mysqli_fetch_assoc($data)) {?>
                <tr>
                    <td><?php echo $model["id"]; ?></td>
                    <td><?php echo $model["name"] ?></td>
                    <td><?php echo $model["brand_name"] ?></td>

                    <td>
                        <a class="btn btn-primary" href="model-trash.php?id=<?php echo $model["id"]; ?>&action=restore">Restore</a>
                        <a class="btn btn-danger" href="model-trash.php?id=<?php echo $model["id"]; ?>&action=forever">Force Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>

</html>
