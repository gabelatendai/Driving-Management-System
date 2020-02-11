<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 28/11/2019
 * Time: 16:39
 */


session_start();
include ("header.php");

$id= $_SESSION['id'];
$amount=$_POST['amount'];
$conn = mysqli_connect("localhost", "root", "", "dsms");


@$stud = R::findOne('students','users_id =?',[$id]);
@$stud2 = R::findOne('instructors','users_id =?',[$id]);

@$name= $stud->fname.  "    " . $stud->sname ;
@$name2= $stud2->fname.  "    " . $stud2->sname ;
?>
      <!-- partial -->
      <div class="main-panel">
<?php
if($_SESSION['role']== "student"){

?>
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Data table
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data table</li>
              </ol>
            </nav>
          </div>

   <div class="statistics-item">
									            <p>
										            <i class="icon-sm fas fa-hourglass-half mr-2"></i>
										            Make A Payment
									            </p>

									            <div class="modal-content col-lg-4">
										            <div class="cheque">


												            <span >

                                                                     <script src="https://js.stripe.com/v3/"></script>

																     <form action="charge.php" method="POST" enctype="multipart/form-data">
																	     <h2>Amount to pay</h2>
																	     <div class="form-group row">
                    <div class="col-lg-8">
                      <input class="form-control" readonly maxlength="10" value="<?php echo $amount; ?>" name="amount" id="defaultconfig-3" type="text" placeholder="Enter Amount.." required>
                      <input class="form-control" maxlength="10" value="<?php echo $id; ?>" name="id" id="defaultconfig-3" type="hidden" placeholder="" required>
                    </div>
                  </div> <a href="#" class="logos-item">
                                                            <img src="img/visa.png" alt="Visa" style="width: 20px">
                                                        </a>
                                                        <a href="#" class="logos-item">
                                                            <img src="img/mastercard.png" alt="MasterCard" style="width: 20px">
                                                        </a>
                                                        <a href="#" class="logos-item">
                                                            <img src="img/discover.png" alt="DISCOVER" style="width: 20px">
                                                        </a>
                                                        <a href="#" class="logos-item">
                                                            <img src="img/amex.png" alt="Amex" style="width: 20px">
                                                        </a>
																	     <br>

                                    <script
		                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		                                    data-key="pk_test_FpWRls96qGyo3jtZSQ501R4E"
		                                    data-amount="<?php // echo $amount; ?>"
		                                    data-image="images/logo.svg"
		                                    data-name="Driving School Management System"
		                                    data-description="Payment For Driving Lessons"
		                                    data-locale="auto"
		                                    data-zip-code="true">
									  </script>
								</form>
												            </span>

										            </div>
									            </div>
								            </div>
        </div>
       <?php
}
 ?>
