<?php 

class MainController 
{
    public function __construct()
    {
        include_once(dirname(__FILE__).'../config/defines.php');

        include_once('../classes/Picture.php');
        include_once('../classes/Category.php');
        include_once('../classes/DbConnect.php');
        include_once('./CategoryController.php');
    }

    public function multiplexMethods($action, $payload)
    {
        switch($action)
        {
            case 'AddCategory':
                $this->ajaxProcessAddCategory($payload);
                break;
        }
    }

    public function ajaxProcessAddCategory($payload)
    {
        $categoryController = new CategoryController();
        $id_category = $categoryController->addCategory($payload['category_name']);

        echo json_encode($id_category);
    }
}

$mainController = new MainController();

$mainController->multiplexMethods($_POST['action'], $_POST['payload']);