<?php
  include 'basic.php';
  if (isset($_GET["id"])) {
    years_delete($_GET["id"],$_GET["action"]);
  }
  $data=years_list();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Years List - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
      <link rel="stylesheet" href="big-style.css">

</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <h1 class="display-1">Years List</h1>
            <a class="btn btn-dark mt-5" href="years-new.php">New Year</a>
            <table class="table table-dark table-bordered table-striped">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Actions</b></td>
                </tr>
                <?php while($year=mysqli_fetch_assoc($data)){ ?>
                <tr>
                    <td><?php echo $year["name"]; ?></td>
                    <td>
                        <a class="btn btn-primary" href="years-edit.php?id=<?php echo $year["id"]; ?>">Edit</a>
                        <a class="btn btn-danger" href="years-list.php?id=<?php echo $year["id"]; ?>&action=delete">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>
