<?php 
    include_once(__CONTROLLERS__.'/CategoryController.php');

    $categoryController = new CategoryController();

    $categories = $categoryController->getAllCategories();
    
?>

<div class="form-group">
    <label for="category">Select category for picture:</label>
    <select class="form-control form-control-sm" name="categories" id="category_select">
        <?php 
        if ($categories) {
            foreach ($categories as $category) {
                echo '<option value="'.$category['id_category'].'">'.$category['name'].'</option>';
            }
        } else {
            echo '<option value="0">No categories</option>';
        } ?>
    </select>
    <button type="button" class="btn btn-primary" id="select_button">Select</button>
</div>
<div class="form-group">
    <label>Add new category:</label>
    <input class="form-control" type="text" name="name" id="add_category_input" /><br>
    <button type="button" class="btn btn-success" id="add_category_button">+ Add</button>
</div>