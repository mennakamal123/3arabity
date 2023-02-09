<?php
include 'basic.php';
if (isset($_GET["id"])) {
  payments_delete($_GET["id"],$_GET["action"]);
}
$data=payments_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Payment Methods List - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">

</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Payment Methods List</h1>
            <a class="btn btn-dark mt-5 " href="payment-new.php">New Payment Method</a>
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
                            href="payment-edit.php?id=<?php echo $payment_method["id"]; ?>">Edit</a>
                        <a class="btn btn-danger"
                            href="payment-list.php?id=<?php echo $payment_method["id"]; ?>&action=delete">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>
