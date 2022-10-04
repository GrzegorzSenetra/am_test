<?php 
    include_once(__CONTROLLERS__.'/PictureController.php');
    
    $pictureController = new PictureController();
    $current_picture = $pictureController->getCurrentPicture();

?>

<img src="<?php echo __PICTURES__.'/'.$current_picture['file_path'] ?>" alt="pic" />