<?php
include "db.php";

class LoginUser
{
    public function UserLogin()
    {
        $database = new db;
        $connection = $database->connection();

        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $password = trim($_POST['password']);

            $name = mysqli_real_escape_string($connection, $name);
            $password = mysqli_real_escape_string($connection, $password);

            $query = "SELECT * FROM users WHERE username = '{$name}'";
            $select_users_query = mysqli_query($connection, $query);

            if (!$select_users_query) {
                die("query failed " . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_array($select_users_query)) {
                $db_name = $row['username'];
                $db_password = $row['password'];
                if ($db_name == $name && password_verify($password, $db_password)) {
                    $_SESSION['username'] = $db_name;
                    $_SESSION['password'] = $db_password;
                    header("location: /welcome.php");

                } else {
                    return false;
                }
            }
        }

    }

    public function inputErrors()
    {
        $database = new db;
        $connection = $database->connection();

        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $password = trim($_POST['password']);
            $query = "SELECT * FROM users WHERE username = '{$name}'";
            $users_query = mysqli_query($connection, $query);
            $user_count = mysqli_num_rows($users_query);

            if ($user_count) {
                $user_password = mysqli_fetch_assoc($users_query);
                $db_user_password = $user_password['password'];
                $password_decode = password_verify($password, $db_user_password);
                if (!$password_decode) {
                    echo "<div class='alert-danger'>
                            <p class='success-message'>Invalid Password.</p>
                        </div>";
                }
            } else {
                echo "<div class='alert-danger'>
                         <p class='success-message'>Invalid Username.</p>
                      </div>";
            }

        }
    }

}
