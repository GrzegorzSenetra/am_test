<?php 
    include_once(__CONTROLLERS__.'/PictureController.php');
    
    $pictureController = new PictureController();
    $pictures = $pictureController->getAllPictures();
?>

<div class="container">
    <ul>
        <?php foreach ($pictures as $picture) : ?>
            <li>
                <a href="./index.php?picture=<?php echo $picture['id_picture']; ?>">
                    <?php echo $picture['file_path']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>