<?php
include 'basic.php';
if (isset($_GET["id"])) {
  colors_delete($_GET["id"],$_GET["action"]);
}
$data=colors_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Colors Trash - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Colors Trash</h1>
            <table class="table table-dark table-bordered table-striped ">
                <tr>
                  <td><b>#</b></td>
                    <td><b>Name</b></td>
                    <td><b>Code</b></td>
                    <td><b>Actions</b></td>
                </tr>
                <?php while ($color=mysqli_fetch_assoc($data)) {?>
                <tr>
                  <td> <input disabled type="color" name="color" value="#<?php echo $color["code"]; ?>"> </td>
                    <td><?php echo $color["name"]; ?></td>
                    <td><?php echo $color["code"]; ?></td>
                    <td>
                        <a class="btn btn-primary" href="colors-trash.php?id=<?php echo $color["id"]; ?>&action=restore">Restore</a>
                        <a class="btn btn-danger" href="colors-trash.php?id=<?php echo $color["id"]; ?>&action=forever">force delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>
