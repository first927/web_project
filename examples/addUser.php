<?php
require_once "../connectDB_func/connect.php";
spl_autoload_register(function ($class_name)
{
    require_once "../class/".$class_name.".class.php";

});
Member::addNewMember($_POST['addusername'],$_POST['addpwd'],$_POST['addname'],$_POST['addsname'],$_POST['addtel'],$_POST['addemail'],'');
header('Location:../examples/userManagement.php');



?>
