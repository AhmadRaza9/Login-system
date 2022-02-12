<?php
include "User_class.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="welcome_main">
        <nav>
            <ul>
            <li><a href="users.php">View Users</a></li>
            <li><a href="articles.php">View Articles</a></li>
            <li><a href="/">Add User</a></li>
            <li><a href="add_article.php">Add Article</a></li>

        </ul>
    </nav>
    <h1>Welcome  <?php
if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];

}
?></h1>
    <img class="welcome_image" src="images/welcome.jpg" alt="">
</div>
</body>
</html>
