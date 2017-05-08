<?php
require_once "connectDB_func/connect.php";
header("Location:index.php");
function __autoload($class_name){
    require_once "class/".$class_name.".class.php";
}
    Member::addNewMember($_POST['username'], $_POST['pss'], $_POST['name'], $_POST['sname'], $_POST['tel'], $_POST['email']);


?>