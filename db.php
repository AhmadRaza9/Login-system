<?php

require_once "config.php";
class db
{

    public $connection;

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {

        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_errno) {
            die("DataBase Connection Failed Badly " . $this->connection->connect_error);
        }

        return $this->connection;
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
