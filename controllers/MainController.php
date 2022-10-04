<?php 

class MainController 
{
    public function __construct()
    {
        include_once(dirname(__FILE__).'../config/defines.php');

        include_once('../classes/Picture.php');
        include_once('../classes/Category.php');
        include_once('../classes/P_object.php');
        include_once('../classes/DbConnect.php');
        include_once('./CategoryController.php');
        include_once('./P_objectController.php');
    }

    public function multiplexMethods($action, $payload)
    {
        switch($action)
        {
            case 'AddCategory':
                $this->ajaxProcessAddCategory($payload);
                break;
            case 'AddObjects':
                $this->ajaxProcessAddObjects($payload);
                break;
            case 'GetAllShapes':
                $this->ajaxProcessGetAllShapes($payload);
                break;
        }
    }

    public function ajaxProcessAddCategory($payload)
    {
        $categoryController = new CategoryController();
        $id_category = $categoryController->addCategory($payload['category_name']);

        echo json_encode($id_category);
    }

    public function ajaxProcessAddObjects($payload)
    {
        $p_objectController = new P_objectController();

        foreach ($payload['objects'] as $p_obj)
        {
            $p_objectController->addPObject(
                (int) $p_obj['category_id']
                , (int) $payload['id_picture']
                , (float) $p_obj['x']
                , (float) $p_obj['y']
                , (float) $p_obj['w']
                , (float) $p_obj['h']
            );
        }
    }

    public function ajaxProcessGetAllShapes($payload)
    {
        $p_objectController = new P_objectController();
        $result = $p_objectController->getAllPObjectsByPictureId($payload['id_picture']);

        echo json_encode($result);
    }
}

$mainController = new MainController();

$mainController->multiplexMethods($_POST['action'], $_POST['payload']);