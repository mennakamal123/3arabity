<?php
include 'basic.php';
if (isset($_POST["username"])) {
  $user=get_user($_POST["username"]);
  if (isset($user["username"])) {
    if (password_verify($_POST["password"],$user["password"])) {
      $_SESSION["username"]=$user["username"];
      header("Location: index.php");
    }else {
      echo "Your password is incorrect";
    }
  }else {
    echo "This Username Doesn't Exist";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sign In - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <div class="container">
        <h1 class="display-1 text-primary mt-3">Sign In</h1>
        <div class="row">
            <form action="sign-in.php" method="post">
                <div class="form-group mt-3 mb-3">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username">
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button class="btn btn-primary" type="submit">Sign In</button>
            </form>
            <p class="mt-5 text-center">Don't Have An Account? <a href="sign-up.php">Create An Account</a></p>
        </div>
    </div>

</body>

</html>
