<?php
include 'basic.php';
if (isset($_POST["name"])) {
  payments_update($_POST["id"],$_POST["name"]);
}
$payment_method=payments_edit($_GET["id"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Edit Payment Method - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Edit Payment Method</h1>
            <form action="payment-edit.php" method="post">
                <div class="form-group mb-4">
                    <input  class="form-control" type="hidden" name="id" value="<?php echo $payment_method['id']; ?>">
                </div>
                <div class="form-group mb-4">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $payment_method['name']; ?>">
                </div>
                <button class="btn btn-success" type="submit" name="button">Save</button>
                <a class="btn btn-secondary" href="payment-list.php">Back</a>
            </form>
        </div>
    </div>

</body>

</html>
