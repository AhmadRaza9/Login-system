<?php include "User_class.php";?>
<?php
$addUser = new User;
$addUser->getData();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Practice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="main">
        <div class="form">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="name" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>
                <input type="submit" name="submit" value="Sign In"><p>or</p>
                <small><a href="login.php">Login</a></small>
            </form>
        </div>
    </section>
</body>
</html>
