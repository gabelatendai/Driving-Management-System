<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 18/11/2019
 * Time: 01:04
 */
error_reporting(0);
include ("rb.php");
R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB
$id= $_SESSION['id'];
$email =  $_SESSION['email'];
@$init = R::findOne('students', 'users_id  = ?', [$id]);
@$initt = R::findOne('instructors', 'users_id  = ?', [$id]);

@$name = $init->fname . "  "  .$init->sname;
@$name2 = $initt->fname . "  "  .$initt->sname;
if(!isset($_SESSION['role'])){

    print ("<script>window.location.assign('login.php')</script>");



}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Driving School Management System</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <?php  if($_SESSION['role']== "instructor") {
            ?>
            <a class="navbar-brand brand-logo" href="mylessons.php"><img src="images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="mylessons.php"><img src="images/logo-mini.svg" alt="logo"/></a>

                <?php }else{ ?>
            <a class="navbar-brand brand-logo" href="dashboard.php"><img src="images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo-mini.svg" alt="logo"/></a>
            <?php } ?>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="fas fa-bars"></span>
            </button>
            <ul class="navbar-nav">
                <li class="nav-item nav-search d-none d-md-flex">
                    <div class="nav-link">
                        <div class="input-group">
                            <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <?php

                        if($_SESSION['role']=="admin"){
                        	echo $email;
                        }
                        echo @$name;
                        echo @$name2
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <?php

                        if($_SESSION['role']=="admin"){

                        ?>
                        <a  href="charge_lessons.php" class="dropdown-item">
                            <i class="fas fa-cog text-primary"></i>
                            Settings
                        </a>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <i class="fas fa-power-off text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="fas fa-bars"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="profile-image">

                        </div>
                        <div class="profile-name">
                            <p class="name">
                                Welcome <br><?php
                                echo @$name;
                                echo @$name2
                                ?>
                            </p>
                            <p class="designation">
                                <?php
                                if($_SESSION['role']== "student"){
                                	echo "Student";
                                }
                                ?>
                                <?php
                                if($_SESSION['role']== "admin"){
                                	echo "Admin";
                                }
                                ?>
                                <?php
                                if($_SESSION['role']== "instructor"){
                                	echo "Instructor";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <?php  if($_SESSION['role']== "instructor") {
                        ?>
                    <a class="nav-link" href="mylessons.php">
                    <?php }else{ ?>
                        <a class="nav-link" href="dashboard.php">
                            <?php } ?>
                        <i class="fa fa-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <?php
                if($_SESSION['role']== "admin") {

                    ?><li class="nav-item">
		                <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
			                <i class="fab fa-trello menu-icon"></i>
			                <span class="menu-title">Users</span>
			                <i class="menu-arrow"></i>
		                </a>
		                <div class="collapse" id="page-layouts">
			                <ul class="nav flex-column sub-menu">
				                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="students.php">Students</a></li>
				                <li class="nav-item"> <a class="nav-link" href="register2.php">Add Instructors</a></li>
				                <li class="nav-item"> <a class="nav-link" href="instructors.php">Instructors</a></li>
			                </ul>
		                </div>
	                </li>
	                <li class="nav-item">
		                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
		                   aria-controls="ui-basic">
			                <i class="far fa-compass menu-icon"></i>
			                <span class="menu-title">Lessons</span>
			                <i class="menu-arrow"></i>
		                </a>
		                <div class="collapse" id="ui-basic">
			                <ul class="nav flex-column sub-menu">
				                <li class="nav-item"><a class="nav-link" href="set_lessons.php">Set Lessons</a></li>
				                <li class="nav-item"><a class="nav-link" href="lessons.php">View Lessons</a></li>
			                </ul>
		                </div>
	                </li>
                    <?php
                }
	            ?>
                <?php
                if($_SESSION['role']== "instructor") {

                    ?>
		            <li class="nav-item">
			            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
			               aria-controls="ui-basic">
				            <i class="far fa-compass menu-icon"></i>
				            <span class="menu-title">Lessons</span>
				            <i class="menu-arrow"></i>
			            </a>
			            <div class="collapse" id="ui-basic">
				            <ul class="nav flex-column sub-menu">
					            <li class="nav-item"><a class="nav-link" href="mylessons.php">My Lessons</a></li>
					            <li class="nav-item"><a class="nav-link" href="lessons.php">View Pending Lessons</a></li>
					            <li class="nav-item"><a class="nav-link" href="finished.php">View Finished Lessons</a></li>
				            </ul>
			            </div>
		            </li>
                    <?php
                }
                ?>
                <?php
                if($_SESSION['role']== "student") {

                    ?>
		            <li class="nav-item">
			            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
			               aria-controls="ui-basic">
				            <i class="far fa-compass menu-icon"></i>
				            <span class="menu-title">Lessons</span>
				            <i class="menu-arrow"></i>
			            </a>
			            <div class="collapse" id="ui-basic">
				            <ul class="nav flex-column sub-menu">
					            <li class="nav-item"><a class="nav-link" href="mylessons.php">My Lessons</a></li>
					            <li class="nav-item"><a class="nav-link" href="set_lessons.php">Set Lesson</a></li>
					            <li class="nav-item"><a class="nav-link" href="lessons.php">View Pending Lessons</a></li>
					            <li class="nav-item"><a class="nav-link" href="finished.php">View Finished Lessons</a></li>
				            </ul>
			            </div>
		            </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <!-- partial -->
