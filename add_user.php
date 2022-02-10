<?php
include "db.php";

class AddUser
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
}
