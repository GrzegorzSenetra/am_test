<?php 

class TestClass
{
    public function testMethod()
    {
        $db = new DbConnect();
        $conn = $db->connect();
        $sql = "SELECT * FROM users";
        $result = pg_query($conn, $sql);
        $users = pg_fetch_all($result);
        return $users;
    }

    public function test()
    {
        echo 'test';
    }
}