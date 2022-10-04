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
                onClick="handleDeletePicture(<?php echo $picture['id_picture']; ?>)" id="delete-picture-button" data-toggle="modal" data-target="#exampleModal">DELETE</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</div>