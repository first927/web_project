<?php
require_once "../connectDB_func/connect.php";
spl_autoload_register(function ($class_name)
{
    require_once "../class/".$class_name.".class.php";

});

$member = new Member($_POST['ehId']);
$member->setElement('username',$_POST['editusername']);
$member->setElement('password',$_POST['editpwd']);
$member->setElement('name',$_POST['editname']);
$member->setElement('surname',$_POST['editsname']);
$member->setElement('tel',$_POST['edittel']);
$member->setElement('email',$_POST['editemail']);
$member->update();
header('Location:../examples/userManagement.php');
?>