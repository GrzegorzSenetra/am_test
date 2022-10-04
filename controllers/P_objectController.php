<?php 

include_once(__CLASSES__.'/P_object.php');

class P_objectController 
{
    private $p_object;

    public function __construct()
    {
        $this->p_object = new P_object();
    }

    public function getAllPObjects()
    {
        $result = $this->p_object->getAllPObjects();
        return $result;
    }

    public function addPObject($id_category, $id_product, $x, $y, $w, $h)
    {
        return $this->p_object->addPObject($id_category, $id_product, $x, $y, $w, $h);
    }

    public function getAllPObjectsByPictureId($id_picture)
    {
        return $this->p_object->getAllPObjectsByPictureId($id_picture);
    }
}