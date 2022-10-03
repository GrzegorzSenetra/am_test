<?php 

class DbConnect 
{
    public function connect() 
    {
        $servername = "localhost";
        $username = "postgres";
        $password = "postgres";
        $dbname = "automapa_task";

        $conn = pg_connect("host=$servername dbname=$dbname user=$username password=$password");

        // if conn fail
        if (!$conn) {
            die("Connection failed: " . pg_connect_error());
        }

        return $conn;
    }
}