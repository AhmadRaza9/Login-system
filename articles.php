<?php include "Article_class.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Articles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h1>View All Articles</h1>
        <form action="" method="post">
            <input type="submit" value="Add Article" name="add_article">
        </form>
    </nav>
<div class="main_section">

    <?php
$Article = new Articles();
$Article->ViewAllArticles();
$Article->gotoaddarticle();
$Article->deleteArticle();

?>
</div>

</body>
</html>
