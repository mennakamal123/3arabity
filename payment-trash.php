<?php
include 'basic.php';
if (isset($_GET["id"])) {
    payments_delete($_GET["id"],$_GET["action"]);
}
$data=payments_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Payment Methods Trash - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">

</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Payment Methods Trash</h1>
            <table class="table table-dark table-bordered table-striped ">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Actions</b></td>
                </tr>
                <?php while($payment_method = mysqli_fetch_assoc($data)) {?>
                <tr>
                    <td><?php echo $payment_method["name"]; ?></td>
                    <td>
                        <a class="btn btn-primary"
                            href="payment-trash.php?id=<?php echo $payment_method["id"]; ?>&action=restore">Restore</a>
                        <a class="btn btn-danger"
                            href="payment-trash.php?id=<?php echo $payment_method["id"]; ?>&action=forever">Force Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>
