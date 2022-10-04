<?php

class Picture
{
    private $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function loadAllPictures()
    {
        $pictures = scandir(__PICTURES__);
        //insert into picture
        foreach ($pictures as $picture) {
            if ($picture != '.' && $picture != '..') {
                $this->insertPicture($picture);
            }
        }
    }

    public function insertPicture($picture)
    {
        if ($this->pictureExists($picture)) {
            return;
        }

        $sql = "INSERT INTO pictures (file_path) VALUES (:file_path)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['file_path' => $picture]);
    }

    public function pictureExists($picture)
    {
        $sql = "SELECT * FROM pictures WHERE file_path = :file_path";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['file_path' => $picture]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getAllPictures()
    {
        $sql = 'SELECT * FROM pictures';
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getPicture($picture)
    {
        $sql = 'SELECT * FROM pictures WHERE id_picture = :id_picture';
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['id_picture' => $picture]);
        $result = $stmt->fetch();
        return $result;
    }
}