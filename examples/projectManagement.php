<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

</head>

<body>
	<div class="wrapper">
	    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">

			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="../indexAdmin.php" class="simple-text">
					Home
				</a>
			</div>

	    	<div class="sidebar-wrapper">
				<ul class="nav">
	                <li>
	                    <a href="user.php">
	                        <i class="material-icons">person</i>
	                        <p>User Profile</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="userManagement.php">
	                        <i class="material-icons">content_paste</i>
	                        <p>User management</p>
	                    </a>
	                </li>
	                <li class="active">
	                    <a href="projectManagement.php">
	                        <i class="material-icons">library_books</i>
	                        <p>Project Management</p>
	                    </a>
	                </li>
                </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Typography</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">dashboard</i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification">5</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Mike John responded to your email</a></li>
									<li><a href="#">You have 5 new tasks</a></li>
									<li><a href="#">You're now friend with Andrew</a></li>
									<li><a href="#">Another Notification</a></li>
									<li><a href="#">Another One</a></li>
								</ul>
							</li>
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
	 						   </a>
							</li>
						</ul>

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group  is-empty">
	                        	<input type="text" class="form-control" placeholder="Search">
	                        	<span class="material-input"></span>
							</div>
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
	                    </form>
					</div>
				</div>
			</nav>
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header" data-background-color="purple">
									<h4 class="title">Projects</h4>
									<p class="category">Here is a subtitle for this table</p>
								</div>
								<div class="card-content table-responsive">
									<table class="table">
										<thead class="text-primary">
										<th>ชื่อโปรเจค</th>
										<th>วันที่</th>

										<th>...</th>
										</thead>
										<tbody>
										<tr>
											<td>Webapp</td>
											<td><script>document.write(new Date())</script></td>

											<td><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myEdit">Edit</button><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myDel">Delete</button></td>
                                            <div class="modal fade" id="myEdit" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit project</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                                <form role="form">
                                                                    <div class="modal-body" style="padding:40px 50px;">

                                                                        <div class="form-group has-success is-empty">
                                                                            <label for="name"><span class="material-icons">person</span>Project name</label>
                                                                            <input type="text" class="form-control" id="name" placeholder="Name"/>
                                                                            <span class="material-input"></span></div>
                                                                        <div class="form-group has-success is-empty">
                                                                            <label for="file"><span class="material-icons">person</span>Select a file:</label>
                                                                            <input type="file"  class="form-control" id="file"/>
                                                                        </div>


                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success">OK</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal fade" id="myDel" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Modal Header</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do you want to delete this project?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-danger">OK</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</tr>

										</tbody>
									</table>
                                </div>
                            </div>
						</div>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myAdd">Add project</button>
                        <!-- Modal -->
                        <div class="modal fade" id="myAdd" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add project</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <form role="form">
                                                <div class="modal-body" style="padding:40px 50px;">

                                                    <div class="form-group has-success is-empty">
                                                        <label for="name"><span class="material-icons">person</span>Project name</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Name"/>
                                                        <span class="material-input"></span></div>
                                                    <div class="form-group has-success is-empty">
                                                        <label for="file"><span class="material-icons">person</span>Select a file:</label>
                                                        <input type="file"  class="form-control" id="file"/>
                                                    </div>


                                                </div></form>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success">OK</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>

                            </div>



                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>
<script>
    $(document).ready(function () {
        $('.modal').appendTo("body");
    })
</script>
</html>
