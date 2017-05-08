<?php
session_start();
require_once "connectDB_func/connect.php";

function __autoload($class_name){
    require_once "class/".$class_name.".class.php";
}
$_SESSION['member'] = Authentication::login($_POST['userlogin'],$_POST['psslogin']);
if(isset($_SESSION['member'])&&!empty($_SESSION['member'])){
    $_SESSION['username'] = $_SESSION['member']->getElement('username');
    $_SESSION['type'] = $_SESSION['member']->getElement('type');
    $_SESSION['name'] = $_SESSION['member']->getElement('name');
    $_SESSION['memId'] = $_SESSION['member']->getElement('id');
    if($_SESSION['type'] == "Admin"){
        header("Location:indexAdmin.php");
    }else{
        header("Location:indexSess.php");
    }
}else{
    header("Location:index.php");
}
?>