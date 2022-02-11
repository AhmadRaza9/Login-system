<?php include "Article_class.php";?>
<?php
$article = new Articles();
$article->updateArticle();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Article</title>
</head>
<body>
    <div class="edit_article">
        <h1>Edit Article</h1>
         <?php $article->editArticle();?>
        <!--    <form action='' method='POST' enctype='multipart/form-data'>
                <div class='form-group'>
                    <label for=''>Article Title</label>
                    <input type='text' name='title' placeholder='Enter Title' required>
                </div>
                <div class='form-group'>
                    <label for=''>Article Subject</label>
                    <input type='text' name='subject' placeholder='Enter Subject' required>
                </div>
                <div class='form-group'>
                    <input type='file' name='image'>
                </div>
                <input type='submit' name='add' value='Add'>
            </form> -->
    </div>
</body>
</html>
