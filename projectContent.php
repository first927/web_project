<?php

session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tutorial Components - Material Kit by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
	<link href="documentation/css/demo-documentation.css" rel="stylesheet" />

    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

	<style>
		pre.prettyprint{
		    background-color: #eee;
		    border: 0px;
		    margin-bottom: 60px;
		    margin-top: 30px;
		    padding: 20px;
		    text-align: left;
		}
		.atv, .str{
		    color: #05AE0E;
		}
		.tag, .pln, .kwd{
		    color: #3472F7;
		}
		.atn{
		    color: #2C93FF;
		}
		.pln{
		    color: #333;
		}
		.com{
		    color: #999;
		}
		.space-top{
		    margin-top: 50px;
		}
		.area-line{
		    border: 1px solid #999;
		    border-left: 0;
		    border-right: 0;
		    color: #666;
		    display: block;
		    margin-top: 20px;
		    padding: 8px 0;
		    text-align: center;
		}
		.area-line a{
		    color: #666;
		}
		.container-fluid{
		    padding-right: 15px;
		    padding-left: 15px;
		}
		.modal-header, h3, .close {
            background-color: purple;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }

	</style>
</head>
</body>
<?php
	require "connectDB_func/connect.php";
	if($_SESSION['type'] == "Admin"){
		require "component/navbarAdmin.inc.php";
	}else{
		require "component/navbarHome.inc.php";
	}
	
	require "connectDB_func/get-set.inc.php";
	require "connectDB_func/helper_function.php";

	$idPodject = $_GET["id"];
	$idMem = $_SESSION['memId'];
	$project = new Project($idPodject);
	$title = $project->getElement("title");
	$category = $project->getElement("category");
	$detail = $project->getElement("detail");
	$editDate = $project->getElement("editDate");
	$publish = $project->getElement("publish");
	$coPerson = $project->getCoPerson();
	$filelist = $project->getLocalFile();
?>

<div class="container">
	<div class="card">
		<div class="card-header" data-background-color="purple">
			<h4 class="title"><?php echo $title; ?> Project</h4>
			<p class="category">Here is a subtitle for this table</p>
		</div>
		<div >
			<div>
				<br><br>
			<label  class="col-md-2">PROJECT DETAIL:</label>
			<p><?php echo $detail; ?></p>
			<label  class="col-md-2">CATEGORY:</label>
			<p><?php echo $category->getName(); ?></p>
			<label  class="col-md-2">LAST MODIFY:</label>
			<p><?php echo $editDate; ?></p>
			<label  class="col-md-2">PUBLISH DATE:</label>
			<p><?php echo $publish; ?></p>
			</div>
		</div>
	</div>
</div>
<!--showfile-->
<?php
include "component/uploadfile.inc.php";
include "component/downloadfile.inc.php";

?>
<!--collaborator-->

<div class="col-sm-2">
	<label for="">COLLABORATOR:</label>
</div>
<?php
	for ($i=0; $i < count($coPerson); $i++) { 
		$name = $coPerson[$i]->getElement("name");
	?>
		<div class="col-sm-2">
				<div class="card card-stats">
					<div class="card-header" data-background-color="orange">
						<i class="material-icons">person</i>
					</div>
					<div class="card-content">
						<p class="category">Used Space</p>
						<h4 class="title"><small>MR.</small><?php echo $name; ?></h4>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">assignment ind</i> <a href="#pablo">view frofile</a>
						</div>
					</div>
				</div>
			</div>
<?php	} ?>

</body>
<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

    <script>
        var header_height;
        var fixed_section;
        var floating = false;

        $().ready(function(){
            suggestions_distance = $("#suggestions").offset();
            pay_height = $('.fixed-section').outerHeight();

			$(window).on('scroll', md.checkScrollForTransparentNavbar);
			demo.initDocumentationCharts();
        });
    </script>
</head>