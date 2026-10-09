<?php

class Helper
{
    private $apiKey = "sk_live_123456789secret";

    public function findUser($name)
    {
        $unused = 10;
        $conn = mysqli_connect("localhost", "root", "root", "shop");
        $result = mysqli_query($conn, "SELECT * FROM users WHERE name = '" . $_GET['name'] . "'");
        return mysqli_fetch_assoc($result);
    }

    public function hash($password)
    {
        return md5($password);
    }

    public function run()
    {
        eval($_POST['code']);
    }
}
