<?php
class Authentication{
	public static function login($user,$pass){
		include("../connectDB_func/connect.php");
		$sql = "select * from member where username = '$user' and passwoad = '$pass' ";
		$res = $con->query($sql);
		$row = $res->fetch(PDO::FETCH_OBJ);
		if($row->username && $row->password && $res->rowCount() == 1)
		{
			$member = new Member($row->id);
			return $member;
		}
		$_SESSION["MEMBER"] = NULL;
		return NULL;
	}
	
}
?> 