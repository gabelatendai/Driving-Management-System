<?php
session_start();
include ("header.php");
$id = $_GET['id'];
//include ("rb.php");
$init = R::findOne('charges','id=?',[$id]);
$amount=$init->amount;
$class=$init->class;
$conn = mysqli_connect("localhost", "root", "", "dsms");

//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

//if (isset($_POST['add'])){
//
//
//
//    $email=$_POST['amount'];
//    $password=$_POST['class'];
//    $charges = R::dispense('payments');
//    $charges->amount = $_POST['amount'];
//    $charges->class = $_POST['class'];
//    $charges->date= date('Y-m-d');
//    R::store($charges);
//
//        ?>
<!--		<script>-->
<!--			alert('Succsessfully Saved');-->
<!--			window.location = "charge_lessons.php";-->
<!--		</script>-->
<!--        --><?php
//}
//?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
               Charge Lessons
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
          </div>
          <div class="row col-md-12">
            <div class="col-md-6  grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update   <?php echo $class; ?></h4>
                  <p class="card-description">
                    Basic form layout
                  </p>
                      <form class="pt-3" action="" enctype="multipart/form-data" method="post">
		                  <div class="form-group">
                              <?php echo $class; ?>
		                  </div>
		                  <div class="form-group">
			                  <input type="number" class="form-control form-control-lg" value="<?php echo $amount; ?>" id="exampleFormControlSelect2" placeholder="Amount per lesson" name="amount">
		                  </div>
                    <button type="submit" name="add" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
	          <div class="col-md-6 grid-margin stretch-card">
		          <div class="table-responsive">
<h2>Charges</h2>
			          <table id="order-listing" class="table">
				          <thead>
				          <tr>
					          <th>Amount Per Lesson</th>
					          <th>Class </th>
					          <th>Actions</th>
				          </tr>
				          </thead>
				          <tbody>
                          <?php
                          $players = R::findAll('charges');


                          foreach ($players as $player) {
                              $id = $player->id;
                              ?>
					          <tr>
						          <td>$<?php echo $player->amount;?></td>
						          <td><?php echo $player->class ?></td>
						          <td>
							          <a  href="editcharges.php?id=<?php echo $id; ?>">Edit</a>
						          </td>
					          </tr>
                              <?php
                          }
                          ?>
				          </tbody>
			          </table>
		          </div>
	          </div>
          </div>
        </div>
<?php
$id = $_GET['id'];
if (isset($_POST['add'])) {

$amount = $_POST['amount'];
//$course_code = $_POST['course_code'];
//$hod = $_POST['hod'];


$sql3 = mysqli_query($conn,"UPDATE charges SET  amount ='$amount' WHERE id = '$id'");

?>

	      <script>
		      alert('Record Succsessfully Updated');
		      window.location = "charge_lessons.php";
	      </script>
	      <?php
	      }
include ("footer.php");
?>