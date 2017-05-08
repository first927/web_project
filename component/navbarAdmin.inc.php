<?php session_start();?>
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" >
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a >

                <div class="brand">
                    <a class="navbar-brand" href="index.php"><i class="material-icons" >content_copy</i>Library Lab</a>
                </div>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul  class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="examples/userManagement.php"><i class="material-icons" >build</i>Management</a>
                <a class="navbar-brand" href="logout.php"><i class="material-icons" >settings_power</i>Log out</a>
                <a class="navbar-brand" ><i class="material-icons" >perm_identity</i><?php echo $_SESSION['type']?></a>
            </ul>
        </div>
        </ul><!--navbar-right-->
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="page-header header-filter" style="background-image: url('assets/img/P.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            </div>
        </div>
    </div>
</div>