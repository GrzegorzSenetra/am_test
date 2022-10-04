<?php 

include_once(__CLASSES__.'/DbConnect.php');

class Category
{
    public $id_category;
    public $name;
    private $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function getAllCategories()
    {
        $sql = 'SELECT * FROM categories';
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function checkCategory($name)
    {
        $sql = 'SELECT * FROM categories WHERE name = :name';
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['name' => $name]);
        $result = $stmt->fetch();
        return $result;
    }

    public function addCategory($name)
    {
        if ($this->checkCategory($name) == false) {
            $sql = 'INSERT INTO categories (name) VALUES (:name)';
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->execute(['name' => $name]);
            
            $id = $this->db->pdo->lastInsertId();

            return array(
                'id' => $id,
                'name' => $name
            );
        }
    }
}