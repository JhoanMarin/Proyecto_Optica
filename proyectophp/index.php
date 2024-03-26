
<?php include 'partials/header.php'?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>



    <div class="login-box">
        <h2>Login</h2>
        <form action="UserController.php" method="POST">
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <a href="#">
            <button type="submit" name="submit" class="btn btn-sm btn-block btn-primary">
            

        
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
                </button>
            </a>
        </form>
    </div>

    </body>
</html>

<?php include 'partials/footer.php'?>
