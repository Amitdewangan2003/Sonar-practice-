<?php

class UserController
{
    // Hardcoded credentials (security issue)
    private $dbPassword = "admin123";

    public function getUser($id)
    {
        $conn = mysqli_connect("localhost", "root", $this->dbPassword, "shop");

        // SQL injection: user input goes straight into the query
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id = " . $_GET['id']);

        $unused = "this variable is never used";

        return mysqli_fetch_assoc($result);
    }

    public function login($user, $pass)
    {
        // weak hashing
        $hash = md5($pass);
        if ($hash == "5f4dcc3b5aa765d61d8327deb882cf99") {
            return true;
        }
        return false;
    }

    public function runCommand()
    {
        // dangerous: executes user-controlled input
        eval($_POST['code']);
    }

    public function printA() {
        echo "Hello";
        echo "World";
        echo "This is a long duplicated block";
        echo "Line four";
        echo "Line five";
    }

    public function printB() {
        echo "Hello";
        echo "World";
        echo "This is a long duplicated block";
        echo "Line four";
        echo "Line five";
    }
}
