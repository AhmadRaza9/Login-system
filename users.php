<?php include "view_all_users.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Users</title>
</head>
<body>
<h1>View All Users</h1>
<?php
$user = new ViewUsers();
$user->ViewAllUsers();
?>
</body>
</html>
