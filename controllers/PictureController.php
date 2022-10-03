<?php 

class PictureController
{
    private $picture;

    public function __construct()
    {
        $this->picture = new Picture();
    }

    public function index()
    {
        $pictures = $this->picture->getAllPictures();
        include_once('./views/pictures/index.php');
    }

    public function show($id)
    {
        $picture = $this->picture->getPictureById($id);
        include_once('./views/pictures/show.php');
    }

    public function create()
    {
        include_once('./views/pictures/create.php');
    }

    public function store($name, $path, $description, $date)
    {
        $result = $this->picture->addPicture($name, $path, $description, $date);
        if ($result) {
            header('Location: ./index.php');
        } else {
            echo 'Something went wrong';
        }
    }

    public function edit($id)
    {
        $picture = $this->picture->getPictureById($id);
        include_once('./views/pictures/edit.php');
    }

    public function update($id, $name, $path, $description, $date)
    {
        $result = $this->picture->updatePicture($id, $name, $path, $description, $date);
        if ($result) {
            header('Location: ./index.php');
        } else {
            echo 'Something went wrong';
        }
    }

    public function delete($id)
    {
        $result = $this->picture->deletePicture($id);
        if ($result) {
            header('Location: ./index.php');
        } else {
            echo 'Something went wrong';
        }
    }
}