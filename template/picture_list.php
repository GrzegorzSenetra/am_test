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
                <a onClick="handleDeletePicture(<?php echo $picture['id_picture']; ?>)" style="color: red; cursor: pointer;">DELETE</a>
            </li>
        <?php endforeach; ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="the_file" id="fileToUpload">
            <input type="submit" value="submit" name="submit">
        </form>
    </ul>
</div>