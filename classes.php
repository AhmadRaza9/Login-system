<?php
class User
{

    public function __construct()
    {
        $this->getAllUsers();
    }

    public function getAllUsers()
    {
        $connection = new db();
        $conn = $connection->connection();
        $users = "SELECT * FROM users";
        $get_all_users = mysqli_query($conn, $users);
        if (!$get_all_users) {
            die("QUERY FAILED " . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_array($get_all_users)) {
            $name = $row['username'];
            $password = $row['password'];

            echo "<div>
            <h3>User Name = <strong>$name</strong></h3>
            <h3>Password = <strong>$password</strong></h3>
            </div>
            ";
        }

    }
}

class Customer
{
    private $id;
    public $name;
    public $email;
    public $balance;

    public function __construct($id, $name, $email, $balance)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->balance = $balance;
    }

}

class Subscriber extends Customer
{
    public $plan;

    public function __construct($id, $name, $email, $balance, $plan)
    {
        parent::__construct($id, $name, $email, $balance);
        $this->plan = $plan;

    }
}

$subscriber = new Subscriber(0, 'test', 'test@gmail.com', 0, 'subscriber');

class Users
{
    public $username;
    public $password;
    public static $passwordLength = 5;

    public static function getPasswordLength()
    {
        return self::$passwordLength;
    }
}
// echo Users::getPasswordLength();
// echo Users::$passwordLength;
