<?php
session_start();
include ("header.php");

$id= $_SESSION['id'];
//include ("rb.php");
$yes= 'yes';
//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB
@$init = R::count('payments');
@$init_stu = R::count('payments','user_id=?',[$id]);
@$init = R::count('instructors');
@$finished = R::count('lessons','status=?',[1]);
@$finished_stu = R::count('lessons','status=? AND student=?',[1,$id]);
@$finished_ins = R::count('lessons','status=? AND instructor=?',[1,$id]);
@$pending = R::count('lessons','status=?',[0]);
@$pending_stu = R::count('lessons','status=? AND student=?',[0,$id]);
@$pending_ins = R::count('lessons','status=? AND instructor=?',[0,$id]);
@$cancel = R::count('lessons','cancel_status=?',[$yes]);
@$cancel_stu = R::count('lessons','cancel_status=? AND student=?',[$yes,$id]);
@$cancel_ins = R::count('lessons','cancel_status=? AND instructor=?',[$yes,$id]);
@$all = R::count('lessons');
@$all_student_lessons = R::count('lessons','student=?',[$id]);
@$all_inst_lessons = R::count('lessons','instructor=?',[$id]);
@$initt = R::count('instructors');
@$initt = R::count('instructors');
if(!isset($_SESSION['role'])){

                print ("<script>window.location.assign('login.php')</script>");



            }
           // }
                ?>


	<div class="main-panel" xmlns="http://www.w3.org/1999/html">
	            <div class="content-wrapper">
		            <div class="page-header">
			            <h1 align="center">Bitplane Driving School Management System</h1>
			            <p>

                            <?php
                            if ($_SESSION['role'] == "student") {

                                echo "Welcome to Student";
                            }
                            ?>
                            <?php
                            if ($_SESSION['role'] == "admin") {
                                echo "Welcome to Admin";
                            }
                            ?>
                            <?php
                            if ($_SESSION['role'] == "instructor") {
                                echo "Welcome to Instructor";
                            }
                            ?>
				            Dashboard
			            </p>
		            </div>
                    <?php
                    if ($_SESSION['role'] == "student") {
                        ?>
			            <div class="row grid-margin">
				            <div class="col-12">
					            <div class="card card-statistics">
						            <div class="card-body">
							            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fa fa-user mr-2"></i>
										            My Lessons
									            </p>
									            <h2><?php echo $all_student_lessons ?></h2>
									            <label class="badge badge-outline-success badge-pill"><a
												            href="mylessons.php">View Lessons </a></label>
								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-hourglass-half mr-2"></i>
										            Make A Payment
									            </p>
									            <h2><?php echo $init_stu ?></h2>
									            <section class="section bg-gray" id="section-modal">
										            <div class="container">

											            <label class="badge badge-outline-success badge-pill" data-toggle="modal" data-target="#Chrome">Make a Payment</label>


											            <!-- Modal -->
											            <div class="modal fade" id="Chrome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												            <div class="modal-dialog" role="document">
													            <div class="modal-content">
														            <div class="modal-header">
<form action="payment.php" method="post" enctype="multipart/form-data" >
	<label>Enter Amount</label>
	<input type="text" name="amount" required placeholder="Enter Amount to Pay">
															            <h5 class="modal-title" id="exampleModalLabel">Make A payment for your Plan</h5>
															            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																            <span aria-hidden="true">&times;</span>
															            </button>
	<INPUT type="submit" value="Pay" class="button" class="btn btn-primary" />

														            </div>

													            </div>
												            </div>
											            </div>
										            </form>

										            </div>
									            </section>

								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
										            Pending Lessons
									            </p>
									            <h2><?php echo $pending_stu ?></h2>

									            <label class="badge badge-outline-success badge-pill"><a
												            href="lessons.php">View Lessons </a></label>
								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-check-circle mr-2"></i>
										            Finished Lessons
									            </p>
									            <h2><?php echo $finished_stu ?></h2>

									            <label class="badge badge-outline-success badge-pill"><a
												            href="finished.php">View Lessons </a></label>
								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-chart-line mr-2"></i>
										            Canceled Lessons
									            </p>
									            <h2><?php echo $cancel_stu ?></h2>

									            <label class="badge badge-outline-success badge-pill"><a
												            href="cancelled.php">View Lessons </a></label>
								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-circle-notch mr-2"></i>
										            Payments
									            </p>
									            <h2><?php echo $init_stu ?></h2>

									            <label class="badge badge-outline-success badge-pill"><a
												            href="payments.php">View Payments </a></label>
								            </div>
							            </div>
						            </div>
					            </div>
				            </div>
			            </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['role'] == "admin") {
                        ?>
			            <div class="row grid-margin">
				            <div class="col-12">
					            <div class="card card-statistics">
						            <div class="card-body">
							            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-circle-notch mr-2"></i>
										            Lessons
									            </p>
									            <h2><?php echo $all?></h2>
									            <label class="badge badge-outline-success badge-pill"><a
												            href="lessons.php">View Lessons </a></label>
								            </div>
<!--								            <div class="statistics-item">-->
<!--									            <p>-->
<!--										            <i class="icon-sm fa fa-user mr-2"></i>-->
<!--										            -->
<!--									            </p>-->
<!--									            <h2>54000</h2>-->
<!--									            <a href="lessons.php">View </a>-->
<!--								            </div>-->
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-hourglass-half mr-2">Payments</i>

									            </p>
									            <h2><?php echo $init?></h2>
									            <label class="badge badge-outline-success badge-pill">
										            <a href="payments.php">View Payments </a>
									            </label>
								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
										           Pending Lessons
									            </p>
									            <h2><?php echo $pending?></h2>
									            <label class="badge badge-outline-success badge-pill">
										            <a href="lessons.php">View Pending Lessons </a>
									            </label>
								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-check-circle mr-2"></i>
										            Finished Lessons
									            </p>
									            <h2><?php echo $finished ?></h2>
									            <label class="badge badge-outline-success badge-pill">
										            <a href="finished.php">View Pending Lessons </a>
									            </label>
								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-chart-line mr-2"></i>
										            Cancelled Lessons
									            </p>
									            <h2><?php echo $cancel?></h2>
									            <label class="badge badge-outline-success badge-pill">
										            <a href="cancelled.php">View Cancelled Lessons </a>
									            </label>
								            </div>
								            <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-circle-notch mr-2"></i>
										            Settings
									            </p>
									            <h2>7500</h2>
									            <label class="badge badge-outline-success badge-pill">
										            <a href="charge_lessons.php">  Settings </a>
									            </label>

								            </div>
							            </div>
						            </div>
					            </div>
				            </div>
			            </div>
                        <?php
                    }
                    ?>
                    <?php
//                    if ($_SESSION['role'] == "instructor") {
//                        ?>
<!--			            <div class="row grid-margin">-->
<!--				            <div class="col-12">-->
<!--					            <div class="card card-statistics">-->
<!--						            <div class="card-body">-->
<!--							            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">-->
<!--								            <div class="statistics-item">-->
<!--									            <p>-->
<!--										            <i class="icon-sm fa fa-user mr-2"></i>-->
<!--										            My Lessons-->
<!--									            </p>-->
<!--									            <h2>--><?php //echo $all_inst_lessons ?><!--</h2>-->
<!--									            <label class="badge badge-outline-success badge-pill"> <a-->
<!--												            href="mylessons.php">View Lessons</a></label>-->
<!--								            </div>-->
<!---->
<!--								            <div class="statistics-item">-->
<!--									            <p>-->
<!--										            <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>-->
<!--										            Pending Lessons-->
<!--									            </p>-->
<!--									            <h2>--><?php //echo $pending_ins ?><!--</h2>-->
<!--									            <label class="badge badge-outline-success badge-pill"><a-->
<!--												            href="lessons.php">View Lessons</a></label>-->
<!--								            </div>-->
<!--								            <div class="statistics-item">-->
<!--									            <p>-->
<!--										            <i class="icon-sm fas fa-check-circle mr-2"></i>-->
<!--										            Finished Lessons-->
<!--									            </p>-->
<!--									            <h2>--><?php //echo $finished_ins ?><!--</h2>-->
<!--									            <label class="badge badge-outline-success badge-pill"><a-->
<!--												            href="finished.php">View Lessons</a></label>-->
<!--								            </div>-->
<!--								            <div class="statistics-item">-->
<!--									            <p>-->
<!--										            <i class="icon-sm fas fa-chart-line mr-2"></i>-->
<!--										            Canceled Lessons-->
<!--									            </p>-->
<!--									            <h2>--><?php //echo $cancel_ins ?><!--</h2>-->
<!--									            <label class="badge badge-outline-success badge-pill"><a-->
<!--												            href="cancelled.php">View Lessons</a></label>-->
<!---->
<!--								            </div>-->
<!---->
<!--							            </div>-->
<!--						            </div>-->
<!--					            </div>-->
<!--				            </div>-->
<!--			            </div>-->
<!--                        --><?php
//                    }
//                    ?>
	            </div>
	            <!-- content-wrapper ends -->
	            <!-- partial:partials/_footer.html -->
                <?php
                include("footer.php");

?>