<?php
class db
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public $connection;

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = 'root';
        $this->dbname = 'phpoop';

        $connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if (!$connection) {
            die("Connection failed: " . mysqli_error($connection));
        }

        return $connection;
    }

    public function AllselectQuery($connection, $rowname)
    {
        $query = "SELECT * FROM $rowname";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
        }

        return $result;
    }

    public function deleteById($connection, $rowname, $id)
    {
        $query = "DELETE FROM $rowname WHERE id = $id ";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
        }

        return $result;
    }

    public function redirect($location)
    {
        header("location: $location");
    }

    public function query($connection, $sql)
    {
        $result = mysqli_query($connection, $sql);
        $this->confirm_query($result);
        return $result;

    }

    public function confirm_query($result)
    {
        if (!$result) {
            die("QUERY FAILED" . mysqli_error($this->connection));
        }
    }

}

$database = new db();
