<?php 

// phpinfo();
// die();

$currentDir = dirname(__FILE__);

if (!defined('__ROOT__')) {
    define('__ROOT__', realpath($currentDir.'/..'));
}

if (!defined('__PICTURES__')) {
    define('__PICTURES__', 'a_signs');
}

if (!defined('__TEMPLATE__')) {
    define('__TEMPLATE__', realpath($currentDir.'/../template'));
}

if (!defined('__CLASSES__')) {
    define('__CLASSES__', realpath($currentDir.'/../classes'));
}

if (!defined('__CONTROLLERS__')) {
    define('__CONTROLLERS__', realpath($currentDir.'/../controllers'));
}
