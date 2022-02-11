<?php include "Article_class.php";?>

<?php

$article = new Articles();
$article->AddArtilce();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="main">
        <div class="form">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Article Title</label>
                    <input type="text" name="title" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label for="">Article Subject</label>
                    <input type="text" name="subject" placeholder="Enter Subject" required>
                </div>
                <div class="form-group">
                    <input type="file" name="image">
                </div>
                <input type="submit" name="add" value="Add">
            </form>
        </div>
    </section>
</body>
</html>
