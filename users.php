<?php include "User_class.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>View All Users</h1>
<div class="user_section">

    <?php
$user = new User();
$user->ViewAllUsers();
$user->deleteUser();
?>
</div>
</body>
</html>
