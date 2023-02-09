<?php
include 'basic.php';
if(isset($_POST["username"])){
  $user=get_user($_POST["username"]);
  if (isset($user["username"])) {
    echo "This username is already taken";
  }else{
    create_user($_POST["fullname"],$_POST["username"],$_POST["password"]);    
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Create An Account - <?php echo $app_name ?></title>
    <?php include 'head-assets.php';?>
</head>

<body>
    <div class="container">
        <h1 class="display-1 text-primary mt-3">Create An Account</h1>
        <div class="row">
            <form action="sign-up.php" method="post">
                <div class="form-group mt-3 mb-3">
                    <label for="fullname">Fullname</label>
                    <input class="form-control" type="text" name="fullname">
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username">
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button class="btn btn-primary" type="submit">Create Account</button>
            </form>
            <p class="mt-5 text-center">Already Have An Account? Try to <a href="sign-in.php">Sign in</a></p>
        </div>
    </div>

</body>

</html>
