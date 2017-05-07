<?php
echo $_POST['username'].$_POST['pss'];
require_once "connectDB_func/connect.php";
function __autoload($class_name){
    require_once "class/".$class_name.".class.php";
}
?>