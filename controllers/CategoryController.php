<?php 

include_once(__CLASSES__.'/Category.php');

class CategoryController
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function getAllCategories()
    {
        $result = $this->category->getAllCategories();
        return $result;
    }

    public function addCategory($name)
    {
        return $this->category->addCategory($name);
    }
}