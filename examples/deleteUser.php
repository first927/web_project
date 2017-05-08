<?php
require_once "../connectDB_func/connect.php";
spl_autoload_register(function ($class_name)
{
    require_once "../class/".$class_name.".class.php";

});
require_once "../connectDB_func/get-set.inc.php";
DB_delMember($_POST['hideId']);

header('Location:../examples/userManagement.php');
?>