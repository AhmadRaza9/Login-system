<?php include "includes/header.php";?>
<?php include "Article_class.php";?>
<?php $article = new Articles();?>
<div class="main">
<?php $article->seeSingleArticle();?>
</div>
<?php include "includes/footer.php";
