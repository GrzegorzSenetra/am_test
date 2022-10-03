<?php 

class Picture
{
    private $id;
    private $name;
    private $path;
    private $description;
    private $date;
    private $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function getAllPictures()
    {
        $sql = "SELECT * FROM pictures";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getPictureById($id)
    {
        $sql = "SELECT * FROM pictures WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function addPicture($name, $path, $description, $date)
    {
        $sql = "INSERT INTO pictures (name, path, description, date) VALUES (:name, :path, :description, :date)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'path' => $path, 'description' => $description, 'date' => $date]);
        $result = $stmt->rowCount();
        return $result;
    }

    public function updatePicture($id, $name, $path, $description, $date)
    {
        $sql = "UPDATE pictures SET name = :name, path = :path, description = :description, date = :date WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'name' => $name, 'path' => $path, 'description' => $description, 'date' => $date]);
        $result = $stmt->rowCount();
        return $result;
    }

    public function deletePicture($id)
    {
        $sql = "DELETE FROM pictures WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->rowCount();
        return $result;
    }
}