<?php
require "../connectDB_func/connect.php";
require "../connectDB_func/get-set.inc.php";
require "../class/File.class.php";
require "../class/FileList.class.php";
require "../class/Member.class.php";
require "../class/Project.class.php";
require "../class/Category.class.php";

function _autoload($class_name){
    require_once "../class/".$class_name.".class.php";
}
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);

    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        DB_delFile($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>