<?php include "Article_class.php";?>

<?php

$article = new Articles();
$article->AddArtilce();

?>
<?php include "includes/header.php";?>
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
<?php include "includes/footer.php";?>