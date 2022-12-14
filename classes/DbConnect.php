<?php 

class DbConnect
{
    private $host = '127.0.0.1';
    private $dbName = 'postgres';
    private $user = 'postgres';
    private $pass = 'postgres';
    private $charset = 'utf8';

    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => true,
    ];

    public $pdo;

    public function __construct()
    {
        $dsn = "pgsql:host=$this->host;port=5432;dbname=$this->dbName;user=$this->user;password=$this->pass";

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $this->options);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}