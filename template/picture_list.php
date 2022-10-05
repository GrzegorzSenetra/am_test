<?php 
    include_once(__CONTROLLERS__.'/PictureController.php');
    
    $pictureController = new PictureController();
    $pictures = $pictureController->getAllPictures();
?>

<div class="container">
    <ul class="list-group">
        <?php foreach ($pictures as $picture) : ?>
            <li onClick="handleChangePicture(<?php echo $picture['id_picture']; ?>)" class="list-group-item <?php if ($_GET['picture'] == $picture['id_picture']) echo 'active'; ?>">
                <a href="./index.php?picture=<?php echo $picture['id_picture']; ?>">
                    <?php echo $picture['file_path']; ?>
                </a>
                <a 
                onClick="handleDeletePicture(<?php echo $picture['id_picture']; ?>)" id="delete-picture-button">DELETE</a>
            </li>
        <?php endforeach; ?>
        <div class="divider"></div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="the_file" id="fileToUpload">
            <div class="divider"></div>
            <input id="upload_submit" class="btn btn-success" type="submit" value="+ Add picture" name="submit">
        </form>
    </ul>

</div>