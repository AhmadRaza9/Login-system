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
                        <p>$subject</p>
                        <a href='?delete=$article_id'>Delete</a>
                        <a href='edit_article.php?edit=$article_id'>Edit</a>
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

    public function editArticle()
    {
        $database = new db;
        $connection = $database->connection();

        if (isset($_GET['edit'])) {
            $article_id = $_GET['edit'];
            $query = "SELECT * FROM articles WHERE id = $article_id ";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("QUERY FAIELD " . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $db_title = $row['title'];
                $db_subject = $row['subject'];
                $db_image = $row['image'];
                echo "
                    <form action='' method='POST' enctype='multipart/form-data'>
                        <div class='form-group'>
                            <label for=''>Article Title</label>
                            <input type='text' name='title' placeholder='Enter Title' required value='$db_title'>
                        </div>
                        <div class='form-group'>
                            <label for=''>Article Subject</label>
                            <input type='text' name='subject' placeholder='Enter Subject' required value='$db_subject'>
                        </div>
                        <div class='form-group'>
                            <label for=''>Article Image</label>
                            <img class='edit_article_image' src='images/$db_image' style='width:40%;'>
                        </div>
                        <div class='form-group'>
                            <input type='file' name='image' value='$db_image'>
                        </div>
                        <input type='submit' name='update' value='Update'>
                        <a href='articles.php'>View</a>
                    </form>
                ";
            }
        }
    }

    public function updateArticle()
    {
        $database = new db;
        $connection = $database->connection();

        if (isset($_POST['update'])) {
            $article_id = $_GET['edit'];
            $title = $_POST['title'];
            $subject = $_POST['subject'];
            $image = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];

            move_uploaded_file($image_temp, "images/$image");

            if (empty($image)) {
                $query = "SELECT * FROM articles WHERE id = $article_id ";
                $select_image = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_image)) {
                    $image = $row['image'];
                }
            }

            $query = "UPDATE articles SET ";
            $query .= "title = '{$title}', ";
            $query .= "subject = '{$subject}', ";
            $query .= "image = '{$image}' ";
            $query .= "WHERE id = {$article_id}";

            $update_article = mysqli_query($connection, $query);

            if (!$update_article) {
                die("QUERY FAILED " . mysqli_error($connection));
            }

        }
    }
}
