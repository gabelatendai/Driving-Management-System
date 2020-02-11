<?php
session_start();
include ("header.php");
//include ("rb.php");
$conn = mysqli_connect("localhost", "root", "", "dsms");

//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

if (isset($_POST['reg'])){



    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $init = R::findOne('users', 'email  = ?', [$email]);

    if ($init > 0) {
        echo "<script>alert('Email already taken by another user!'); window.location='register.php'</script>";
    } else {


        $users = R::dispense('users');
        $users->role ="instructor";
        $users->email = $email;
        $users->password = $password;
        R::store($users);

        $instructors = R::dispense('instructors');
        $instructors->fname = $_POST['fname'];
        $instructors->sname = $_POST['sname'];
        $instructors->idno = $_POST['idno'];
        $instructors->pnumber = $_POST['pnumber'];
        $instructors->class = $_POST['class'];
        $instructors->date = date('Y-m-d H:i:s');
        // R::store($instructors);
        $users->ownProductList[] = $instructors;
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
	<!-- partial -->
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-8 offset-md-2 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4>Instructor Registration Form</h4>
							<h6 class="font-weight-light">Registering Instructors </h6>
							<form class="pt-3" action="" enctype="multipart/form-data" method="post">

								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="fname" placeholder="Firstname">
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="sname" placeholder="Last Name">
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="idno" placeholder="National ID Number">
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="pnumber" placeholder="Contact Number">
								</div>

								<div class="form-group">
									<select class="form-control form-control-lg" id="exampleFormControlSelect2" name="class">
										<option>Select Class</option>
										<option value="2">CLass 2</option>
										<option value="4">Class 4</option>
									</select>
								</div>
								<div class="form-group">
									<input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
								</div>
								<div class="mb-4">
									<div class="form-check">
										<label class="form-check-label text-muted">
											<input type="checkbox" class="form-check-input">
											I agree to all Terms & Conditions
										</label>
									</div>
								</div>
								<div class="mt-3">
									<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="reg">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
include ("footer.php");
?>