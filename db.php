<?php
class db
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    // public function __construct()
    // {
    //     $this->connection();
    // }

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
        // else {
        //     echo "Connected";
        // }

        return $connection;
    }

}
