<?php 
    include_once(__CONTROLLERS__.'/PictureController.php');
    
    $pictureController = new PictureController();
    $current_picture = $pictureController->getCurrentPicture();


    $image_size = getimagesize(__PICTURES__.'/'.$current_picture['file_path']);

?>
<div id="img_path" style="display: none"><?php echo __PICTURES__.'/'.$current_picture['file_path'] ?></div>
<div id="img_id" style="display: none"><?php echo $current_picture['id_picture'] ?></div>

<canvas 
    id = "canvas"
    width="<?php echo $image_size[0] ?>" 
    height="<?php echo $image_size[1] ?>"></canvas>

<!-- <img src="<?php echo __PICTURES__.'/'.$current_picture['file_path'] ?>" alt="pic" /> -->