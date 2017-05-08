
<?php

if (!isset($_SESSION["Logon"])) {
	session_start();
}
$btnIn2 = $_GET["btnLog"];
if($btnIn2 == "logout" )
{
	session_start();
	unset($_SESSION["Logon"]);
	session_destroy();

}

//--- ¡ÓË¹´ãËé  $SESSION à»ç¹µÑÇá»Ãáºº session 
session_register("_SESSION");
//.....................................................................
include("DB_connect.php");
$btnIn = $_POST["btnLog"];
$oid2 = $_GET["oid"];
$status = $_GET["status"];
$oid = $_POST["oid"];
$incid = $_POST["cid"];
$inpid = $_POST["pid"];
$indetail = $_POST["detail"];
$inpdetail = $_POST["pDetail"];
$uid = $_SESSION["ldap_uid"];
$finDetail = $_POST[finishDetail];
$rate = $_POST[rate];
if($btnIn == "addFinDetail")
{
	$sql = "update repairorder set rate='$rate' , repairDetail='$finDetail' where id = '$oid'";
	//echo $sql;
	mysql_query($sql);
}
if($btnIn2 == "chstat"){
	
	$sql = "UPDATE `repairorder` SET `nowStatus`='$status' where id = '$oid2'";
	//echo $sql;
	mysql_query($sql);
	$sql = "INSERT INTO `status`(`status`, `changeDate`, `rid`) VALUES ('$status',CURDATE(),'$oid2')";
	//echo $sql;
	mysql_query($sql);
	if($status == "finished")
	{ ?>
		<div id="id06" class="modal" style="display: block" >
  <span onclick="document.getElementById('id06').style.display='none'" 
class="close" title="Close Modal">&times;</span>
  <!-- Modal Content -->
  <form class="modal-content animate" name="userenter"  method="post"  action="index.php"; style="width: 50%">
		<input type="hidden" value ="<?php echo $oid2; ?>" name="oid"/>
    <div class="container">
      <label><b>ÃÒÂÅÐàÍÕÂ´¡ÒÃ«èÍÁ</b></label>
      <input type="text" placeholder="¡ÃÍ¡ÃÒÂÅÐàÍÕÂ´¡ÒÃèÍÁ" name="finishDetail" required>
      <label><b>¨Ó¹Ç¹§º»ÃÐÁÒ³·Õè¶Ù¡ãªé¨èÒÂ</b></label>
      <input type="text" placeholder="¡ÃÍ¡§º»ÃÐÁÒ³" name="rate" required>
    </div>

    <div class="container" style="background-color:#f1f1f1">
     <button  type="submit" class="addbtn" name="btnLog" value="addFinDetail">Add</button>
      <button style="width: 100%"  type="button" onclick="document.getElementById('id06').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
		
	<?php	}
}//changestatus
if($btnIn == "edited"){
	$sql = "update repairorder set placeID = '$inpid', categoryID ='$incid',detail = '$indetail',placeDetail='$inpdetail' where id = '$oid' ";
  //echo"$sql";
	mysql_query($sql);
}
if($btnIn == "chstat")
{?>
	<div id="id05" class="modal" style="display: block" >
  <span onclick="document.getElementById('id05').style.display='none'" 
class="close" title="Close Modal">&times;</span>
  <!-- Modal Content -->
  <form class="modal-content animate" name="userenter"  method="post"  action="building.php"; style="width: 50%">
	<input type="hidden" id="oid" name ="oid" value="<?php echo $oid ; ?>">
    <div class="container" style="text-align: center">
      <a style="font-size: 16px;"  ><strong>àÅ×Í¡Ê¶Ò¹Ð¢Í§ãºá¨é§«èÍÁ·Õè &#9; <?php echo $oid ; ?></strong><a>
    </div>

    <div class="container" style="background-color:#f1f1f1">
     <button style="width: 20% ; margin-left: 10% ; margin-right: 5%"  type="button" class="addbtn" ><a class="btn" href="index.php?oid=<?php echo $oid ; ?>&btnLog=chstat&status=received" >received</a></button>
     
     <button style="width: 20%; margin-left: 5% ; margin-right: 5%"  type="button" class="addbtn" ><a class="btn"  href="index.php?oid=<?php echo $oid ; ?>&btnLog=chstat&status=on_process" >on_process</a></button>
     
     <button style="width: 20%; margin-left: 5% ; margin-right: 5%"  type="button" class="addbtn" ><a class="btn"  href="index.php?oid=<?php echo $oid ; ?>&btnLog=chstat&status=finished">finished</a></button>
     
      <button style="width: 100%"   type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
		 
<?php }
if($btnIn == "edit"){ ?>

	<!-- general edit modal -->
	<div id="id04" class="modal" style="display: block">
  <span onclick="document.getElementById('id04').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" name="addrequest" onSubmit="return ChkValid()" method="post"  action="index.php" style="width: 40%">
   <?php $sql = "select * from repairorder as ro,user,place,category,status where ro.categoryID = category.categoryID 
and place.placeID = ro.placeID and ro.userID = user.userID and rid = id and ro.nowStatus = status and id='$oid'" ;
		$result = mysql_query($sql);
		$fet = mysql_fetch_array($result);
		$detail = $fet[detail];
	 	$epid = $fet[placeID];
 		$ecid = $fet[categoryID];
 		$pDetail = $fet[placeDetail];
 		$oid = $fet[id];
    
 	?>
   <input type="hidden" name="oid" value="<?php echo $oid; ?>" />
    <div class="container">
      <label><b>ÃÒÂÅÐàÍÕÂ´¢Í§·ÕèªÓÃØ´</b></label>
      <input type="text" placeholder="¡ÃÍ¡ÃÒÂÅÐàÍÕÂ´" name="detail" value="<?php echo $detail; ?>" required>
      
      <label><b>àÅ×Í¡ËÁÇ´ÍØ»¡Ã³ì</b></label><br/>
      <select name="cid">
      <?php $sql="select * from category";
		$result = mysql_query($sql);
		$row = mysql_num_rows($result);
		$i = 0;
		while($i < $row)
		{
			$fet = mysql_fetch_array($result);
			$cname = $fet[cName];
			$cid=$fet[categoryID];
			echo"<option value='$cid' ";
			if($cid == $ecid)echo" selected='selected'";
			echo">$cname</option>";
			$i++;
		}
		?>
		</select>
      
      <label><b>àÅ×Í¡Ê¶Ò¹·Õè</b></label><br/>
      <select name = "pid">
      <?php $sql="select * from place";
		$result = mysql_query($sql);
		$row = mysql_num_rows($result);
		$i = 0;
		while($i < $row)
		{
			$fet = mysql_fetch_array($result);
			$pname = $fet[pName];
			$pid=$fet[placeID];
			echo"<option  value='$pid'";
			if($epid == $pid)echo"selected='selected'";
			echo">$pname</option>";
			$i++;
		}
		?>
		</select>
		

      <label><b>ÃÒÂÅÐàÍÕÂ´Ê¶Ò¹·Õè</b></label>
      <input type="text" placeholder="¡ÃÍ¡ÃÒÂÅÐàÍÕÂ´" name="pDetail" value="<?php echo $pDetail ;?>"required>

      <button type="submit" name="btnLog" value="edited">Submit</button>
      <button type="button" style="width:100%" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<?php 
}
if($btnIn == "delete")
{
	$sql = "delete from repairorder where id = '$oid'";
	//echo $sql ;
	mysql_query($sql);
	
	$sql= "delete from status where rid = '$oid'";
	//echo $sql ;
	mysql_query($sql);
}

if($btnIn == "addRequest")
{
	$sql = "select (MAX(id)+1) as newid from repairorder" ;
	$fet = mysql_fetch_array(mysql_query($sql));
	$newid = $fet[newid];
	if($newid == 0)$newid++;
	
	$sql = "insert into repairorder(id,detail,placeDetail,placeID,categoryID,userID,nowStatus,inDate) values('$newid','$indetail','$inpdetail','$inpid','$incid','$uid','created',CURDATE())";
	//echo"$sql";
	mysql_query($sql);
	
	$sql = "insert into status(rid,`status`,changeDate) values('$newid','created',CURDATE())";
	//echo"$sql";
	mysql_query($sql);
	
}
?>

<HTML>
<HEAD>
<TITLE></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</HEAD>
<style>
a.btn
	{
		text-decoration:none; 

	}
	#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    top: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {top: 0; opacity: 0;} 
    to {top: 30px; opacity: 1;}
}

@keyframes fadein {
    from {top: 0; opacity: 0;}
    to {top: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {top: 30px; opacity: 1;} 
    to {top: 0; opacity: 0;}
}

@keyframes fadeout {
    from {top: 30px; opacity: 1;}
    to {top: 0; opacity: 0;}
}
	/* The Overlay (background) */
form.hidden
	{
		display: none ;
	}
.overlay {
    /* Height & width depends on how you want to reveal the overlay (see JS below) */    
    height: 100%;
    width: 0;
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    background-color:rgba(255,255,255,0.45) ; /* Black w/opacity */
    overflow-x: hidden; /* Disable horizontal scroll */
    transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, decreated on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
    position: relative;
    top: 10%; /* 25% from the top */
    width: 100%; /* 100% width */
    text-align: left; /* Centered text/links */
    margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
}

/* The navigation links inside the overlay */
.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 18px;
    color: black ;
    display: block; /* Display block instead of inline */
    transition: 0.3s; /* Transition effects on hover (color) */
}


/* Position the close button (top right corner) */
.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
    .overlay a {font-size: 20px}
    .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;
    }
}
button.alert
	{
		width: 20% ; 
		height: 10% ; 
		padding: 2px ; 
		margin: 25px;
		border-radius: 5%;
	}
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 60%;
    border: 1px solid #ddd;
}

 td {
    border: none;
    text-align: left;
	padding: 10px 10px;
}
tr:nth-child(even){background-color: #f2f2f2}
	/* Style the list */
body {font-family: "Lato", sans-serif;}

ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid  #0A2A03;
    background-color: #0A2A03;
	position:fixed;
	width: 100%;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: seagreen;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: seagreen;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
}

@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
select
	{
		width: 100%;
    padding: 1px 1px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
	button.fix
	{
		position:fixed; 
		top: 18%; 
		left:2%; 
		border-radius: 7%;
		color: black;  
		background-color:rgba(6,154,78,0.7);
		padding: 12px 20px;
		width: 16%;
		border: 1px solid black ;
	}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}
/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, decreated on screen size */
	border-radius: 3%;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<script>
	function toAlert(show) {
    var x = document.getElementById("snackbar")
	x.innerHTML = show ;
		if(show == "Login success!!!.."){
				x.style.backgroundColor = "green";
			}
		else{
				x.style.backgroundColor = "red";
		}
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<BODY style="background-color: rgba(133,217,7,0.2)" >
<!-- snack login alert -->
<div id="snackbar"><strong>Login success!!!..</strong></div>
<?php
?>



<!-- delete modal -->
<div id="id03" class="modal" >
  <span onclick="document.getElementById('id03').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" name="delete"  method="post"  action="index.php" style="width:30%">
    
	<input type="hidden" id="oid" name ="oid" value="">
    <div class="container" style="background-color: lightgreen; ">
		<p style="font-size: 16px; text-align: center" id="dHead"></p>
    </div>
    <div style="background-color: lightcyan">
      <button type="submit" action="index.php" class="alert" name="btnLog" value="delete">Delete</button>
      <button type="button" class="alert" style=" float: right; background-color: red" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
  </form>
</div>
<!-- login & addrequest modal -->
<div id="id02" class="modal" >
  <span onclick="document.getElementById('id02').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" name="addrequest" onSubmit="return ChkValid()" method="post"  action="index.php" style="width: 40%">
    

    <div class="container">
      <label><b>ÃÒÂÅÐàÍÕÂ´¢Í§·ÕèªÓÃØ´</b></label>
      <input type="text" placeholder="¡ÃÍ¡ÃÒÂÅÐàÍÕÂ´" name="detail" required>
      
      <label><b>àÅ×Í¡ËÁÇ´ÍØ»¡Ã³ì</b></label><br/>
      <select name="cid" style="width: 100%; 
    padding: 12px 20px;
    box-sizing: border-box;">
      <?php $sql="select * from category";
		$result = mysql_query($sql);
		$row = mysql_num_rows($result);
		$i = 0;
		while($i < $row)
		{
			$fet = mysql_fetch_array($result);
			$cname = $fet[cName];
			$cid=$fet[categoryID];
			echo"<option value='$cid'>$cname</option>";
			$i++;
		}
		?>
		</select>
      
      <label><b>àÅ×Í¡Ê¶Ò¹·Õè</b></label><br/>
      <select name = "pid" style="width: 100%;
    padding: 12px 20px;
    box-sizing: border-box;" >
      <?php $sql="select * from place";
		$result = mysql_query($sql);
		$row = mysql_num_rows($result);
		$i = 0;
		while($i < $row)
		{
			$fet = mysql_fetch_array($result);
			$pname = $fet[pName];
			$pid=$fet[placeID];
			echo"<option  value='$pid'>$pname</option>";
			$i++;
		}
		?>
		</select>
		

      <label><b>ÃÒÂÅÐàÍÕÂ´Ê¶Ò¹·Õè</b></label>
      <input type="text" placeholder="¡ÃÍ¡ÃÒÂÅÐàÍÕÂ´" name="pDetail" required>

      <button type="submit" name="btnLog" value="addRequest">Add</button>
      <button type="button" style="width:100%" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<div id="id01" class="modal" >
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" name="userenter" onSubmit="return ChkValid()" method="post"  action="index.php" style="width: 50%">

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="form_account" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="form_password" required>

      <button type="submit" name="btnLog" value="Login">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<!-- edit auto submit -->
<form id="editform" class="hidden" action="index.php"  method="post">
			<input style="display: none"  name="oid" id="editoid" value="" />
			<input style="display: none" name="btnLog" value="edit" />
		</form>
		
<!-- change stat form -->
<form id="chstatform" class="hidden" action="index.php"  method="post">
			<input style="display: none"  name="oid" id="choid" value="" />
			<input style="display: none" name="btnLog" value="chstat" />
		</form>

<?

include 'encode.php';			
//--- ãªéã¹¡Ã³Õ·ÕèµéÍ§¡ÒÃ¹Óª×èÍËÃ×Í¢éÍÁÙÅÍ×è¹æ¨Ò¡ LDAP ÁÒáÊ´§ áµè encoding äÁèãªé UTF-8
//--- à¹×èÍ§¨Ò¡¢éÍÁÙÅ¢Í§ LDAP à»ç¹ UTF-8  ¨Ö§µéÍ§á»Å§¢éÍÁÙÅ¡èÍ¹¨Ò¡ UTF-8 à»ç¹ TIS-620 ËÃ×Í Windows-874


//========================================================================================
if (isset($_SESSION["Logon"]) && $_SESSION["Logon"]==1) {
    // nothing 
} else {

    //--- ¹Óä¿Åì ldap.php à¢éÒÁÒãªé§Ò¹ÃèÇÁ´éÇÂ 
    include 'ldap.php';

    //--- µÃÇ¨ÊÍºµÑÇá»ÃÊè§ÁÒ¨Ò¡ form ËÃ×ÍäÁè 
    //--- µÑÇÍÂèÒ§ãªéª×èÍ account ËÃ×Í username à»ç¹  form_account 
    if (isset($_POST["form_account"]) && !empty($_POST["form_account"])) {
	$your_account = str_replace("*","",strtolower(trim($_POST['form_account'])));
    }

    //--- µÃÇ¨ÊÍºµÑÇá»ÃÊè§ÁÒ¨Ò¡ form ËÃ×ÍäÁè 
    //--- µÑÇÍÂèÒ§ãªéª×èÍ password  à»ç¹  form_password 
    if (isset($_POST["form_password"]) && !empty($_POST["form_password"])) {
	$your_password = $_POST["form_password"];
    }

    //--- µÃÇ¨ÊÍº account áÅÐ password â´Âãªé¿Ñ§¡ìªÑ¹ user_authen() ¨Ò¡ä¿Åì ldap.php «Öè§ä´é include äÇé
    //--- ¼ÅÅÑ¾¸ìà¡çºäÇé·ÕèµÑÇá»Ã $ldap_authen_result 
    //--- ¶éÒ¤èÒà»ç¹ 0 áÊ´§ÇèÒ account áÅÐ password ¶Ù¡µéÍ§ 
    //--- ¶éÒ¤èÒÁÒ¡¡ÇèÒ 0 áÊ´§ÇèÒ ÁÕ¢éÍ¼Ô´¾ÅÒ´ ÁÕ¢éÍ¤ÇÒÁ error à¡çºÍÂÙèã¹µÑÇá»Ã $ldap_error[$ldap_authen_result] 
    $ldap_authen_result = user_authen($your_account, $your_password);
    if ($ldap_authen_result > 0 && $btnIn == "Login") {
		?> <script> toAlert("Username or password is indirect"); </script> <?php
    } else if($btnIn == "Login"){ 
	?> <script> toAlert("Login success!!!.."); </script> <?php
	//--- authentication ÊÓàÃç¨  ÊÃéÒ§µÑÇá»Ã session ª×èÍÇèÒ Logon ¡ÓË¹´¤èÒãËéà»ç¹ 1  à¾×èÍáÊ´§ÇèÒ à¢éÒÊÙèÃÐººä´é 
	$_SESSION["Logon"] = 1;
    }

    //--- ËÒ¡µéÍ§¡ÒÃµÃÇ¨ÊÍº account à©¾ÒÐ·ÕèÊÒÁÒÃ¶à¢éÒÃÐººä´é ÊÒÁÒÃ¶à¢ÕÂ¹ code µÃÇ¨ÊÍºà¾ÔèÁàµÔÁä´é 
	/*
    if ($ldap_authen_result == 0 && $your_account != "pichaya") {
	echo "<h3 align=center><font color=RED>" . $your_account . " äÁèÁÕÊÔ·¸Ôà¢éÒãªéÃÐºº</font></h3><br>";
        //--- ¶éÒäÁèãªè account ·ÕèÁÕÊÔ·¸Ô ¡ÓË¹´ãËéµÑÇá»Ã session ª×èÍÇèÒ Logon ÁÕ¤èÒà»ç¹ 0   à¾×èÍáÊ´§ÇèÒ äÁèãËéà¢éÒÊÙèÃÐºº 
	$SESSION["Logon"] = 0;
    }
	*/

}	// End of if (isset($SESSION["Logon"]) && $SESSION["Logon"]==1) 
//========================================================================================
?>
<ul class="tab" >
<?php
//--- µÃÇ¨ÊÍºÇèÒÁÕµÑÇá»Ãáºº session ª×èÍ $SESSION["Logon"] áÅÐÁÕ¤èÒà»ç¹ 1 ËÃ×ÍäÁè à¾×èÍÍ¹Ø­ÒµãËéà¢éÒÊÙèÃÐººä´é 
if (isset($_SESSION["Logon"]) && $_SESSION["Logon"]==1) {
	$login = 1;
	?>
	<li style="float: right"><a href="index.php?btnLog=logout" class="tablinks" >Logout</a></li>
	<?php
    //--- µÑÇÍÂèÒ§ÃÑº¢éÍÁÙÅ¨Ò¡ LDAP à¡çºäÇéã¹µÑÇá»Ãáºº session ÊÓËÃÑº¹Óä»ãªéã¹ä¿Åì .php Í×è¹æ
    if (!isset($_SESSION["ldap_uid"])) {
	//--- ¶éÒà»ç¹¡ÒÃà¢éÒ session ¤ÃÑé§áÃ¡ ÂÑ§äÁèÁÕµÑÇá»Ãáºº session à¡çº¢éÍÁÙÅ¨Ò¡ ldap  ãËé¡ÓË¹´¤èÒ¨Ò¡ ldap ãËéµÑÇá»Ãáºº session µèÒ§æ 
	//--- ¤ÃÑé§µèÍä» ËÃ×Íä»ÂÑ§ä¿ÅìÍ×è¹ ·ÕèÂÑ§äÁè»Ô´ session ÊÒÁÒÃ¶ãªé µÑÇá»Ãáºº session áÅÐ¤èÒ¢Í§ÁÑ¹ ä´éàÅÂ 
	$_SESSION["ldap_uid"]		= $ldap_uid;
	$_SESSION["ldap_engname"]	= $ldap_engname;
	$_SESSION["ldap_thainame"]	= $ldap_thainame;
	$_SESSION["ldap_email"]		= $ldap_email;
	$_SESSION["ldap_gender"]		= $ldap_gender;
	$_SESSION["ldap_Job"]		= $ldap_Job;
	$_SESSION["ldap_position"]	= $ldap_position;
	$_SESSION["ldap_department"]	= $ldap_department;
	$_SESSION["ldap_faculty"]	= $ldap_faculty;
	$_SESSION["ldap_campus"]		= $ldap_campus;
	}
	$thainame =  utf8_to_tis620($_SESSION["ldap_thainame"]);
	$uid = $_SESSION["ldap_uid"] ;
	
	$sql = "select userID from user where userID = '$uid'";
	//echo"$sql";
	$result = mysql_query($sql);
	$fet = mysql_fetch_array($result);
	if(isset($fet[userID]) ){
		
	}
	else{
		$sql = "INSERT INTO `user`(`userID`, `name`, `right`) VALUES ('$uid','$thainame','general')";
		//echo"$sql";
		mysql_query($sql);
	}
	

}
	else{
		 ?> <li style="float: right"><a href="javascript:void(0)" id="login1" class="tablinks" onclick="document.getElementById('id01').style.display='block'">Login</a></li>
		 <?php
	}

//à¡çºÊ¶Ò¹Ð user
 	$sql = "select * from user where userID = '$uid'";
$result = mysql_query($sql);
$fet= mysql_fetch_array($result);
$userRight = $fet[right];
$manageCat = $fet[manageCategory];
$manageCtegory = $fet[manageCategory];//userRight = right
	


?>
  	<li><a href="index.php">Home</a></il>
 	<?php if($_SESSION["Logon"]==1){ ?>
  <li><a href="javascript:void(0)" class="tablinks" onclick="document.getElementById('id02').style.display='block'" >Add Request</a></li>
  <?php if($userRight == "admin"){ ?><li><a href="userManagge.php" class="tablinks" >User Managemment</a></li>
  <li><a class="tablinks" href="building.php" >Building &amp; Tool category</a></li> <?php } ?>
  <?php if($userRight == "admin" || $userRight == "manager" ) { ?><li><a class="tablinks" href="static.php" >Static</a></li> 
    <?php }?>
    <li style="float:right"><a><?php echo"$thainame";?></a></li>
    <?php } ?>

</ul>
<br/><br/>

<div style="display: inline,inherit; background-color: yellowgreen; border-radius: 20%">
<!-- search -->
</div>
<div align="center" style="background-color: rgba(91,187,3,0.3)">
	<h2>Repair Order</h2>
	 <label><b>ËÁÇ´ÍØ»¡Ã³ì</b></label>
    <select name="cid" id="input1" style="width: 20%;font-size: 14px ;height: 20px" onChange="myFunction()">
     <option>´Ù·Ø¡ËÁÇ´ÍØ»¡Ã³ì</option>
      <?php $sql="select * from category";
		$result = mysql_query($sql);
		$row = mysql_num_rows($result);
		$i = 0;
		while($i < $row)
		{
			$fet = mysql_fetch_array($result);
			$cname = $fet[cName];
			$cid=$fet[categoryID];
			echo"<option  name='input1' value='$cid'>$cname</option>";
			$i++;
		}
		?>
		</select>
    <label><b>Ê¶Ò¹·Õè</b></label>
      
      <label><b>
      <select name = "pid" id="input2" style="width: 20%; font-size: 14px ;height: 20px" onChange="myFunction()">
        <option>´ÙÊ¶Ò¹·Õè</option>
          <?php $sql="select * from place";
		$result = mysql_query($sql);
		$row = mysql_num_rows($result);
		$i = 0;
		while($i < $row)
		{
			$fet = mysql_fetch_array($result);
			$pname = $fet[pName];
			$pid=$fet[placeID];
			echo"<option  value='$pid'>$pname</option>";
			$i++;
		}
		?>
        </select>
      Ê¶Ò¹Ð
      <select name = "status" id="input3" style="width: 20%; font-size: 14px ;height: 20px" onChange="myFunction()">
       <option>´Ù·Ø¡Ê¶Ò¹Ð</option>
        <option>created</option>
        <option>accept</option>
        <option>on_process</option>
        <option>finished</option>
      </select>
      <br>
      </b></label>
      <b> </b>
      
</div>
<!-- side menu -->
<button  onclick="showMe()" class="fix" type="button" name="button" id="button" >áÊ´§ÃÒÂ¡ÒÃ¢Í§µÑÇàÍ§</button>
<?php if($userRight == "manager"){?><button type="button" style="top: 25%" onclick="showManage()" class="fix" >In My Manage</button><?php } ?>

<!-- display RRorder-->
<div style=" overflow-x: auto;top: 29%;margin-top: 5px ">
<table  id="table" align="center" style="border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #ddd;
    padding:10%; border-radius:20%">
  <tr align="center">
	<th >ËÁÒÂàÅ¢</th>
	<th >Ê¶Ò¹·Õè</th>
	<th >ËÁÇ´ÍØ»¡Ã³ì</th>
	<th >¼Ùéá¨é§</th>
	<th >Ê¶Ò¹Ð</th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	</tr>
<!-- áÊ´§µÒÃÒ§á¨é§«èÍÁ -->
<?php 
	$sql = "select * from repairorder as ro,user,place,category,status where ro.categoryID = category.categoryID 
and place.placeID = ro.placeID and ro.userID = user.userID and rid = id and ro.nowStatus = `status`" ;
	$result = mysql_query($sql);
	$row = mysql_num_rows($result);
	$i  = 0;
	while($i < $row)
	{
		$findate="ÂÑ§´Óà¹Ô¹¡ÒÃäÁèàÊÃç¨";
		$fet=mysql_fetch_array($result);
		$indate = $fet[inDate];
		$id = $fet[id];
		$detail = $fet[detail];
		$place = $fet[pName];
		$cname = $fet[cName];
		$placeDetail = $fet[placeDetail];
		$userName = $fet[name];
		$status = $fet[nowStatus];
		if($status == "finished")
		{
			$findate = $fet[changeDate];
		}
	
		$cname = $fet[cName];
		
		
		echo" <tr>
				<td style ='text-align: center' value='$id'>$id</td>	
				<td>$place</td>
				<td>$cname</td>
				<td>$userName</td>
				<td>$status</td>"; ?>
				<td><a href="#show" 
				onclick="openNav(<?php echo $id; ?>)" 
				id="showdetail"><img src="image/mag-glass.jpg" width="20" height="20" alt=""/></a></td>
				
<div id="<?php echo $id; ?>" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav(<?php echo $id; ?>)">&times;</a>
  <div class="overlay-content">
  	<div style ="background-color :rgba(154,205,50,1.00); ">
   	<div style="text-align: center;padding: 8px; background-color:rgba(10,42,3,1.00); color:antiquewhite; font-size: 20px ; font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana,' sans-serif'">
   		<p>ËÁÒÂàÅ¢á¨é§«èÍÁ·Õè <?php echo $id ; ?><p>
   	</div>
    <a >¼Ùéá¨é§ : <?php echo $userName ; ?></a>
    <a >ÃÒÂÅÐàÍÕÂ´ : <?php echo $detail ; ?></a>
    <a >Ê¶Ò¹·Õè : <?php echo $place ; ?></a>
    <a >ÃÒÂÅÐàÍÕÂ´Ê¶Ò¹·Õè : <?php echo $placeDetail ; ?></a>
    <a >ËÁÇ´ : <?php echo $cname ; ?></a>
    <a>ÇÑ¹·Õèá¨é§ : <?php echo $indate ; ?></a>
    <a>ÇÑ¹·ÕèàÊÃç¨ÊÔé¹ : <?php echo $findate ; ?></a>
    <div style="text-align: center;padding: 8px; background-color:rgba(10,42,3,1.00); color:antiquewhite; font-size: 20px ; font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana,' sans-serif'">
   		<p>Ê¶Ò¹Ð : <?php echo $status ; ?><p>
   	</div>
  </div>
  </div>
</div>
				

<?php 
		
	if($userName == utf8_to_tis620($_SESSION["ldap_thainame"])&&($status == "created")){ ?>
		<td><a href="#edit" onclick="toedit(<?php echo "$id"; ?>)" id="edit"><img src="image/Text Edit.jpg" width="20" height="20" alt=""  /></a></td>
		<td><a href="#delete" onclick="askDelete(<?php echo "$id"; ?>)"  id="delete"><img src="image/2000px-RedX.svg_.jpg" width="20" height="20" alt=""/></a></td> <?php } else echo"<td></td><td></td>" ?>
		<?php if($userRight == "manager" && $manageCat == $cname){ ?><td><a class="btn" href="#chastat" onclick="changestat(<?php echo "$id"; ?>)" >change</a></td><?php } ?>

				

				
			<?php echo "</tr>" ; ?>
			
	<?php
		$i++;
	}
?>
</table> 
	</div>
<?php

?>

<!--¿Ñ§ªÑ¹áÊ´§µÒÁËÁÇ´ËÁÙè -->
<script>
	function showManage()
	{
		var manage = '<?=$manageCtegory?>';
		table = document.getElementById("table");
  		tr = table.getElementsByTagName("tr");
  		for (i = 0; i < tr.length; i++) {
    	td = tr[i].getElementsByTagName("td")[2];

    	if ( td ) {
      		if (td.innerHTML.toUpperCase() == manage ){
        		tr[i].style.display = "";
      		} else {
        		tr[i].style.display = "none";
      		}
		}
  		}
	}
</script>

<!-- àÃÕÂ¡ãªé showmanage ¨Ò¡ php-->
<?php
	if($btnIn2 == "showMyManage")
	{
		echo "<script>showManage();</script>";
	}
?>

</BODY>
<script>

function showMe()
	{
		var name = '<?=$thainame?>'
		
		table = document.getElementById("table");
  		tr = table.getElementsByTagName("tr");
  		for (i = 0; i < tr.length; i++) {
    	td = tr[i].getElementsByTagName("td")[3];

    	if ( td ) {
      		if (td.innerHTML.toUpperCase() == name ){
        		tr[i].style.display = "";
      		} else {
        		tr[i].style.display = "none";
      		}
		}
  		}
	}

function toedit(id)
	{
		document.getElementById("editoid").value = id;
		document.getElementById("editform").submit();
	}
function changestat(id)
	{
		document.getElementById("choid").value = id;
		document.getElementById("chstatform").submit();
	}
function askDelete(id)
	{
		document.getElementById("dHead").innerHTML = "µéÍ§¡ÒÃ·Õè¨ÐÅºãºá¨é§«èÍÁËÁÒÂàÅ¢ : "+id+" ?" ;
		document.getElementById("id03").style.display = 'block';
		document.getElementById("oid").value = id ;
	}
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
	// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function ChkValid() {
   var v1 = document.userenter.form_account.value;
   var v2 = document.userenter.form_password.value;
   if (v1.length<=0)
      {
      alert("Please enter all fields");
      return false;
      }
  else if (v2.length<=0)
      {
      alert("Please enter all fields");
      return false;
      }
  else
    {
    return true;
    }
}
function myFunction() {
  var  filter, table, tr, td, i;
	
	var x = document.getElementById("input1");
    var input = x.selectedIndex;
    filter = x.options[input].text;
	
	x = document.getElementById("input2");
	input = x.selectedIndex;
	filter2 = x.options[input].text;
	
	x = document.getElementById("input3");
	input = x.selectedIndex;
	filter3 = x.options[input].text;
	
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
	td1 = tr[i].getElementsByTagName("td")[1];
	td2 = tr[i].getElementsByTagName("td")[4];
    if ( td ) {
	  if(filter=="´Ù·Ø¡ËÁÇ´ÍØ»¡Ã³ì" || filter =="")
		  {
			  tr[i].style.display = "";
		  }
	  if(filter2=="´Ù·Ø¡Ê¶Ò¹·Õè" || filter2 == "")
		  {
			  tr[i].style.display = "";
		  }
	  if(filter3=="´Ù·Ø¡Ê¶Ò¹Ð"|| filter3 == "")
		  {
			  tr[i].style.display = "";
		  }
      if (td.innerHTML == filter || td1.innerHTML == filter2 || td2.innerHTML == filter3){
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
	}
  }
}
function openNav(id) {
    document.getElementById(id).style.width = "40%";
}

function closeNav(id) {
    document.getElementById(id).style.width = "0%";
}


</script>
</HTML>