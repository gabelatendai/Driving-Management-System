<?php

include "rb.php";

$conn = mysqli_connect("localhost", "root", "", "dsms");

R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB


if (isset($_POST['login'])) {
    $_SESSION['last_login_timestamp'] = time();

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $activity = "Log in";
    $Time = time();
    /*
    ----------------------------    gabela ---------------------------------------------*/

    $init = R::findOne('users', 'email = ? AND password = ?', [$email, $password]);


    if ($init == null) {
        //   $message = "invalid details";
        print ("<script>window.alert('invalid details')</script>");
        print ("<script>window.location.assign('login.php')</script>");


    } else {
        session_start();
        $_SESSION['role'] = $init->role;
        $_SESSION['email'] = $init->email;
        $_SESSION['fname'] = $init->fname;
        $_SESSION['pnumber'] = $init->pnumber;
        $_SESSION['id']=$init->id;
        $_SESSION['sname'] = $init->sname;
        $_SESSION['idno'] = $init->idno;
        $_SESSION['class'] = $init->class;
        $_SESSION['lnumber'] = $init->lnumber;
        $_SESSION['last_login_timestamp'] = time();


        echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:cornflowerblue">
!login successful </h2></div>';

       if ($_SESSION['role']=='admin' || $_SESSION['role']=='student'){
           echo '
          <h2 align="center">
              <meta content="2;dashboard.php" http-equiv="refresh"/>
          </h2> ';
       }
       else{
           echo '
          <h2 align="center">
              <meta content="2;mylessons.php" http-equiv="refresh"/>
          </h2> ';
       }

    }
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DrivingSchool|login</title>
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
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3"  action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg"  name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <input type="button" onClick="window.location.href='index.php'" value="Cancel" class="btn btn-block btn-facebook auth-form-btn">
                </div>
                <div class="text-center mt-4 font-weight-light">
	                <!-- Modal starts -->
	                <div class="text-center">
		                Don't have an account?  <a href="register.php" >Create</a>
<!--		                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-2">Create<i class="fa fa-play-circle ml-1"></i></button>-->
	                </div>
                </div>
<!--	                <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">-->
<!--		                <div class="modal-dialog" role="document">-->
<!--			                <div class="modal-content">-->
<!--				                <div class="modal-header">-->
<!--					                <h5 class="modal-title" id="exampleModalLabel-2">Register</h5>-->
<!--					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--						                <span aria-hidden="true">&times;</span>-->
<!--					                </button>-->
<!--				                </div>-->
<!--				                <div class="modal-body">-->
<!--					                <h2>Register As a</h2>-->
<!--				                </div>-->
<!--				                <div class="modal-footer">-->
<!--					                <a href="register.php" type="button" class="btn btn-success float-left" >Student</a>-->
<!--					                <a href="register2.php" type="button" class="btn btn-success">Instructor</a>-->
<!--					                <br>-->
<!--					                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>-->
<!--				                </div>-->
<!--			                </div>-->
<!--		                </div>-->
<!--	                </div>-->
<!--	                <!-- Modal Ends -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
</html>
