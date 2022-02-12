<?php include "Article_class.php";?>
<?php include "includes/header.php";?>
<div class="main_section">

    <?php
$Article = new Articles();
$Article->ViewAllArticles();
$Article->gotoaddarticle();
$Article->deleteArticle();

?>
</div>
<?php include "includes/footer.php";?>
