<?php

include "db.php";

class Articles
{
    public function ViewAllArticles()
    {

        $database = new db;
        $connection = $database->connection();
        $query = $database->AllselectQuery($connection, 'articles');

        while ($row = mysqli_fetch_array($query)) {
            $article_id = $row['id'];
            $title = $row['title'];
            $subject = $row['subject'];
            $image = $row['image'];
            echo "<div class='article'>
                    <div class='header'>
                        <h4>$title</h4>
                        <h5>$subject</h5>
                        <a href='?delete=$article_id'>Delete</a>
                    </div>
                    <div class='article_img'>
                        <img src='images/$image' alt=''>
                    </div>
                </div>";
        }
    }

    public function gotoaddarticle()
    {
        if (isset($_POST['add_article'])) {
            header("location: add_article.php");
        }
    }

    public function AddArtilce()
    {
        $database = new db;
        $connection = $database->connection();

        if (isset($_POST['add'])) {
            $title = $_POST['title'];
            $subject = $_POST['subject'];
            $article_image = $_FILES['image']['name'];
            $article_image_temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($article_image_temp, "images/$article_image");

            $query = "INSERT INTO articles(title, subject, image) ";
            $query .= "VALUES('$title', '$subject', '$article_image')";

            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("QUERY FAILED " . mysqli_error($connection));
            }
            $database->redirect('articles.php');

        }

    }

    public function deleteArticle()
    {
        $database = new db;
        $connection = $database->connection();

        if (isset($_GET['delete'])) {
            $article_id = $_GET['delete'];

            $query = $database->deleteById($connection, 'articles', $article_id);
            $database->redirect('articles.php');
        }

    }
}
