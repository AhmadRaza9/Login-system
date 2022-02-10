<?php

include "db.php";

class User
{
    public function getData()
    {
        $database = new db;
        $connection = $database->connection();

        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $password = trim($_POST['password']);

            $name = mysqli_real_escape_string($connection, $name);
            $password = mysqli_real_escape_string($connection, $password);

            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            if ($this->checkInputs() == true) {
                $query = "INSERT INTO users(username, password)";
                $query .= "VALUES('{$name}', '{$password}')";
                $singUp_user_query = mysqli_query($connection, $query);
                if (!$singUp_user_query) {
                    die("QUERY FAILED (Sign Up User )" . mysqli_error($connection));
                }
                echo "User Successfully Added";
            }
            // else {
            //     echo "nothing";
            // }

        }
    }

    public function checkInputs()
    {
        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $password = trim($_POST['password']);
            if (strlen($name) > 6) {
                echo "username maxmium length is 6";
                return false;
            }
            if (strlen($name) < 4) {
                echo "username minimum length is 4 ";
                return false;
            }
        }
        return true;
    }

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