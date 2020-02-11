<?php
include ("rb.php");
R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

$conn=mysqli_connect("localhost", "root", "","dsms");

if (isset($_POST['reg'])){



    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $init = R::findOne('users', 'email  = ?', [$email]);

    if ($init > 0) {
        echo "<script>alert('Email already taken by another user!'); window.location='register.php'</script>";
    } else {

        $users = R::dispense('users');
        $users->role ="student";
        $users->email = $email;
        $users->password = $password;
        R::store($users);


        $students = R::dispense('students');
        $students->fname = $_POST['fname'];;
        $students->sname = $_POST['sname'];;
        $students->idno = $_POST['idno'];;
        $students->pnumber = $_POST['pnumber'];;
        $students->lnumber = $_POST['lnumber'];;
        $students->class = $_POST['class'];;
        $students->email = $email;
        $students->password = $password;
        $students->date = date('Y-m-d H:i:s');
       // R::store($users);
        $users->ownProductList[] = $students;
        R::store($users);

        ?>
		<script>
			alert('Succsessfully Saved');
			window.location = "login.php";
		</script>
        <?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Driving School</title>
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
              <h4>Student Registration Form</h4>
              <h6 class="font-weight-light">Signing upff is easy. It only takes a few steps</h6>
              <form class="pt-3" action="" enctype="multipart/form-data" method="post">

	              <div class="form-group">
                  <input type="text" class="form-control form-control-lg"  onkeypress="return isString(event)" name="fname" placeholder="Firstname" required>
                </div>
	              <div class="form-group">
                  <input type="text" class="form-control form-control-lg" required onkeypress="return isString(event)" name="sname" placeholder="Last Name">
                </div>
	              <div class="form-group">
                  <input type="text" class="form-control form-control-lg"  name="idno" placeholder="National ID Number" required>
                </div>
	              <div class="form-group">
                  <input type="text" class="form-control form-control-lg" required onkeypress='return numbersOnly(this,event,false,true);' name="pnumber" placeholder="Contact Number" onkeyup="limit(this);" onkeydown="limit(this);">
                      <div class=" alert-warning" id='result'></div>
                      <div class=" alert-warning" id='char'></div>
                  </div>
	              <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="lnumber" placeholder="Provisional Licence Number">
                </div>

                <div class="form-group">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="class">
                    <option>Select Class</option>
                    <option value="2">CLass 2</option>
                    <option value="4">Class 4</option>
                  </select>
                </div>
	              <div class="form-group">
		              <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required>
	              </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                </div>
<!--                <div class="mb-4">-->
<!--                  <div class="form-check">-->
<!--                      <label class="form-check-label text-muted">-->
<!--                          I accept: <input type="checkbox" value="0" name="agree">-->
<!--                             <div class="alert-danger" id='result'></div>-->
<!--                    </label>-->
<!--                  </div>-->
<!--                </div>-->
                <div class="mt-3">
                  <input value="Register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  type="submit" name="reg">
                </div>
                  <br>
                  <div class="mb-2">
                      <input type="button" onClick="window.location.href='index.php'" value="Cancel" class="btn btn-block btn-facebook auth-form-btn">
                  </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
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


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
</html>
<script type="text/javascript">
    function limit(element){
        var max_chars = 10 ;
        if(element.value.length > max_chars){
            element.value= element.value.substr(0,max_chars);
            document.getElementById("result").innerHTML = 'Phone number should be 10 digits';

        }
    }

    function numbersOnly(Sender,evt,isFloat,isNegative) {
        if(Sender.readOnly) return false;

        var key   = evt.which || !window.event ? evt.which : event.keyCode;
        var value = Sender.value;

        if((key == 46 || key == 44) && isFloat){
            var selected = document.selection ? document.selection.createRange().text : "";


            if(selected.length == 0 && value.indexOf(".") == -1 && value.length > 0) Sender.value += ".";

            return false;
        }
        if(key == 45) { // minus sign '-'
            if(!isNegative)
               // document.getElementById("char").innerHTML = '3 Phone number should contain Integers only';
            return false;
            if(value.indexOf('-')== -1) Sender.value = '-'+value; else Sender.value = value.substring(1);
            if(Sender.onchange != null) {
                if(Sender.fireEvent){
                    Sender.fireEvent('onchange');
                } else {
                    var e = document.createEvent('HTMLEvents');
                    e.initEvent('change', false, false);
                    Sender.dispatchEvent(e);

                }
            }

            var begin = Sender.value.indexOf('-') < -1 ? 1 : 0;
            if(Sender.setSelectionRange){
                Sender.setSelectionRange(begin,Sender.value.length);
            } else {
                var range = Sender.createTextRange();
                range.moveStart('character',begin);
                range.select();
            }

            return false;
            //document.getElementById("char").innerHTML = '2 Phone number should contain Integers only';

        }
        if(key > 31 && (key < 48 || key > 57))
           // alert('1 Phone number should contain Integers only');
        //  document.getElementById("char").innerHTML = '1 Phone number should contain Integers only';
        return false;
    }

    function val(){
		if(frm.password.value == "")
		{
			alert("Enter the Password.");
			frm.password.focus();
			return false;
		}
		if((frm.password.value).length < 8)
		{
			alert("Password should be minimum 8 characters.");
			frm.password.focus();
			return false;
		}

		if((frm.password.value).length > 20)
		{
			alert("Password should be maximum 20 characters.");
			frm.password.focus();
			return false;
		}

		if(frm.confirmpassword.value == "")
		{
			alert("Enter the Confirmation Password.");
			return false;
		}
		if(frm.confirmpassword.value != frm.password.value)
		{
			alert("Password confirmation does not match.");
			return false;
		}

		return true;
	}
    function isString(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return true;
        }
        else{
            alert('  must have alphanumeric characters only');
           // document.getElementById("num").innerHTML = "User address must have alphanumeric characters only ";
            return false;
        }
    }
</script>