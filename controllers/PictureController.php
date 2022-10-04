<?php 

class PictureController
{
    private $picture;

    public function __construct()
    {
        $this->picture = new Picture();
    }

    public function getAllPictures()
    {
        $result = $this->picture->getAllPictures();
        return $result;
    }

    public function getCurrentPicture()
    {
        $picture = $_GET['picture'];
        $result = $this->picture->getPicture($picture);

        return $result;
    }

    public function removePicture($id_picture)
    {
        return $this->picture->removePicture($id_picture);
    }
}