<?php
include "db.php";

class ViewUsers
{
    public function ViewAllUsers()
    {
        $database = new db;
        $connection = $database->connection();
        $query = "SELECT * FROM users ";
        $viewusers = mysqli_query($connection, $query);
        if (!$viewusers) {
            die("QUERY FAILED (Sign Up User )" . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_array($viewusers)) {
            $username = $row['username'];
            echo "<div>
                    <p>$username</p>
                 </div>";
        }

    }
}
