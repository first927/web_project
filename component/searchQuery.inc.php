<?php

require "../connectDB_func/connect.php";
require "../connectDB_func/get-set.inc.php";

require "../class/Project.class.php";
require "../class/Category.class.php";

function _autoload($class_name){
    require_once "../class/".$class_name.".class.php";
}
$arrPro = DB_getAllProject();

$search = $_POST["searchText"];

// $firstname = $_POST["firstname"];
$length = strlen($search);
// $suggest = $length;
// $suggest = count($arrPro);

if($length==0)
	$arrOutput = $arrPro;
else
$arrOutput = array();

foreach ($arrPro as $item)
{
	// $suggest = $item->getElement("title");
	// $suggest = substr($item->getElement("title"), 0, $length);
	if ( substr($item->getElement("title"), 0, $length) === $search)
	{
		$suggest = $suggest.$item->getElement("title").",";
		array_push($arrOutput,$item);
	}
}
if (!empty($suggest))
	// echo rtrim($suggest,",");
	echo $arrOutput;
// else
// 	echo "No suggestion";
?>