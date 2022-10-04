<?php 

class P_object 
{
    private $db;
    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function getAllPObjects()
    {
        $sql = "SELECT * FROM p_objects";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getAllPObjectsByPictureId($id_picture)
    {
        $sql = "SELECT * FROM p_objects WHERE id_picture = :id_picture";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['id_picture' => $id_picture]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function addPObject($id_category, $id_picture, $x, $y, $w, $h, $category_name)
    {

        $sql = "INSERT INTO p_objects (id_category, id_picture, x, y, w, h, category_name) VALUES (:id_category, :id_picture, :x, :y, :w, :h, :category_name)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(
            ['id_category' => $id_category
            ,'id_picture' => $id_picture
            ,'x' => $x
            ,'y' => $y
            ,'w' => $w
            ,'h' => $h
            ,'category_name' => $category_name
        ]);
        $last_id = $this->db->pdo->lastInsertId();
        return $last_id;
    }

    public function removeAllPObjectsByPictureId($id_picture)
    {
        $sql = "DELETE FROM p_objects WHERE id_picture = :id_picture";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute(['id_picture' => $id_picture]);
    }
}