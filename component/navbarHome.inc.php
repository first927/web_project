

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
                

                    <a class="navbar-brand" href="#" data-toggle="modal" data-target="#modalRegister"><i class="material-icons" >person_outline</i>Sign Up</a>


                    <a class="navbar-brand" href="#" data-toggle="modal" data-target="#modalLogin"><i class="material-icons" >lock</i>Log in</a>

            </ul><!--navbar-right-->
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
              <!-- Modal -->
                    <div class="modal fade" id="modalRegister" role="dialog" >
                        <!-- Modal content-->
                            <div class="modal-dialog" style="width: 450px">
                                <div class="modal-content" style="color: #1a237e">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title" align="center">Register</h3>
                                    </div>
                                    <form  role="form" method="post" action="register.inc.php">
                                    <div class="modal-body" style="padding:40px 50px;">
                                                    <div class="form-group">
                                                        <label for="name"><span class="material-icons">person</span>Name</label>
                                                        <input required type="text" class="form-control" id="name" name="name" placeholder="Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="sname"><span class="material-icons">person</span>Surname</label>
                                                        <input required type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="username"><span class="material-icons">account_box</span>Username</label>
                                                        <input required type="text" class="form-control" id="username" name="username" placeholder="Username">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="pss"><span class="material-icons">lock</span>Password</label>
                                                        <input required type="password" class="form-control" id="pss" name="pss" placeholder="Password">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tel"><span class="material-icons">phone</span>Phone Number</label>
                                                        <input required type="text" class="form-control" id="tel" name="tel" placeholder="Phone Number" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email"><span class="material-icons">email</span>E-mail</label>
                                                        <input required type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                                                    </div>
                                    </div>

                                        <div align="center">
                                        <button type="submit" class="btn btn-success" name="regisbtn" value="register">Register</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
            </ul>
        </div>
        <!-- Modal End -->

                        <!-- Modal Start -->
                        <div class="modal fade" id="modalLogin" role="dialog" >
                            <div class="modal-dialog" style="width: 400px">
                                <div class="modal-content" style="color: #1a237e">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title" align="center">Login</h3>
                                    </div>
                                    <form  role="form" method="post" action="login.inc.php">
                                    <div class="modal-body">

                                            <div class="modal-body" style="padding:40px 50px;">
                                               
                                                    <div class="form-group">
                                                        <label for="name"><span class="material-icons">account_box</span>Username</label>
                                                        <input required type="text" class="form-control" id="userlogin" name="userlogin" placeholder="Username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pss"><span class="material-icons">lock</span>Password</label>
                                                        <input required type="password" class="form-control" id="psslogin" name="psslogin" placeholder="Password">
                                                    </div>

                                            </div>

                                    </div>
                                    <div align="center">
                                        <button type="submit" class="btn btn-success" name="loginbtn" value="login">Login</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">CanCel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


<div class="page-header header-filter" style="background-image: url('assets/img/P.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            </div>
        </div>
    </div>
</div>