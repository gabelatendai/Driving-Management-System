<?php
session_start();
include ("header.php");
//include ("rb.php");
$conn = mysqli_connect("localhost", "root", "", "dsms");

//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

if (isset($_POST['add'])){



    $email=$_POST['amount'];
    $password=$_POST['class'];
    $charges = R::dispense('payments');
    $charges->amount = $_POST['amount'];
    $charges->class = $_POST['class'];
    $charges->date= date('Y-m-d');
    R::store($charges);

        ?>
		<script>
			alert('Succsessfully Saved');
			window.location = "charge_lessons.php";
		</script>
        <?php
}
?>
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
                  <h4 class="card-title">Default form</h4>
                  <p class="card-description">
                    Basic form layout
                  </p>
                      <form class="pt-3" action="" enctype="multipart/form-data" method="post">
		                  <div class="form-group">
			                  <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="class">
				                  <option>Select Class</option>


	                      <option value="Class 1">Class 1</option>
	                      <option value="Class 2">Class 2</option>
	                      <option value="Class 3">Class 3</option>
	                      <option value="Class 4">Class 4</option>

			                  </select>
		                  </div>
		                  <div class="form-group">
			                  <input type="number" class="form-control form-control-lg" id="exampleFormControlSelect2" placeholder="Amount per lesson" name="amount">
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
							          <a  href="edit_charges.php?id=<?php echo $id; ?>">Edit</a>
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
include ("footer.php");
?>