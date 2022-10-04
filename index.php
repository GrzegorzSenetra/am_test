<?php include_once(dirname(__FILE__).'/config/defines.php'); ?>
<?php include_once(__CLASSES__.'/Picture.php'); ?>
<?php include_once(__CLASSES__.'/Category.php'); ?>
<?php include_once(__CLASSES__.'/DbConnect.php'); ?>

<?php 
    $picture = new Picture();
    $picture->loadAllPictures();
?>

<!DOCTYPE html>
<head>
    <title>Automapa Recruitment Test</title>
    <script src='./bin/jquery-3.6.1.min.js'></script>
    <script src='./bin/bootstrap/js/bootstrap.min.js'></script>
    <link rel='stylesheet' href='./bin/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='./template/css/global.css'>
</head>
<body>
    <?php include_once(dirname(__FILE__).'/template/header.php'); ?>
    <?php include_once(dirname(__FILE__).'/template/content.php'); ?>
    <script src='./template/js/actions.js'></script>
</body>
</html>