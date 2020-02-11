<?php
session_start();
include ("header.php");
//include "rb.php";
$id= $_SESSION['id'];

$conn = mysqli_connect("localhost", "root", "", "dsms");

//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

?>
<?php
if (isset($_POST['update'])) {


    $id = $_POST['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    mysqli_query($conn, "UPDATE `lessons` SET `time`='$time',`date`='$date',`cancel_status`='' WHERE `id`= '$id'");
    ?>
	<script>
		alert('Lesson Succsessfully Scheduled ');
		window.location = "cancelled.php";
	</script>

    <?php
}
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
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Canceled Lessons</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
	                  <table id="order-listing" class="table">
		                  <thead>
		                  <tr>
			                  <th>Instructor Name</th>
			                  <th>Date</th>
			                  <th>Time</th>
			                  <th>Status</th>
                              <th>Action</th>
		                  </tr>
		                  </thead>
		                  <tbody>
                          <?php
                          $players = R::findAll('lessons','student=? AND cancel_status=?',[$id,"yes"]);


                          foreach ($players as $player) {
                              $S_id = $player->student;
                              $In_id = $player->instructor;
                              $In = R::findOne('instructors','users_id =?',[$In_id]);


                              ?>
			                  <tr>
				                  <td><?php echo $In->fname .  " ". $In->sname;?></td>
				                  <td><?php echo $player->date ?></td>
				                  <td><?php echo $player->time ?></td>
				                  <td>
                                      <?php
                                      if($player->status==0) { ?>
						                  <label class="badge badge-success">Pending</label>
                                          <?php
                                      }else {
                                          ?>

						                  <label class="badge badge-info">Finished</label>

                                          <?php
                                      }
                                      ?>
				                  </td>
                                  <td>   <!-- Modal starts -->
                                      <div class="text-center">
                                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-2">Re_Schedule Lesson<i class="fa fa-play-circle ml-1"></i></button>
                                      </div>
                                      <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel-2">Re-Schedule Lesson</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form class="pt-3" action="" enctype="multipart/form-data" method="post">
                                                          <div class="form-group">
                                                              <label for="exampleInputUsername1">Date</label>
                                                              <input type="date" class="form-control" id="exampleInputUsername1" name="date">
                                                              <input type="hidden" class="form-control" value="<?php echo $player->id ?>" id="exampleInputUsername1" name="id">
                                                          </div>
                                                          <div class="form-group">
                                                              <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="time">
                                                                  <option>Select Time</option>
                                                                  <option value="08:00 - 08:30">08:00 - 08:30</option>
                                                                  <option value="08:30 - 09:00">08:30 - 09:00</option>
                                                                  <option value="09:00 - 09:30">09:00 - 09:30</option>
                                                                  <option value="09:30 - 10:00">09:30 - 10:00</option>
                                                                  <option value="10:00 - 10:30">10:00 - 10:30</option>
                                                                  <option value="10:30 - 11:00">10:30 - 11:00</option>
                                                                  <option value="11:00 - 11:30">11:00 - 11:30</option>
                                                                  <option value="11:30 - 12:00">11:30 - 12:00</option>
                                                                  <option value="12:00 - 12:30">12:00 - 12:30</option>
                                                                  <option value="12:30 - 13:00">12:30 - 13:00</option>
                                                                  <option value="13:00 - 13:30">13:00 - 13:30</option>
                                                                  <option value="13:30 - 14:00">13:30 - 14:00</option>
                                                                  <option value="14:00 - 14:30">14:00 - 14:30</option>
                                                                  <option value="14:30 - 15:00">14:30 - 15:00</option>
                                                                  <option value="15:00 - 15:30">15:00 - 15:30</option>
                                                                  <option value="15:30 - 16:00">15:30 - 16:00</option>
                                                                  <option value="16:00 - 16:30">16:00 - 16:30</option>
                                                                  <option value="16:30 - 17:00">16:30 - 17:00</option>
                                                              </select>
                                                          </div>

                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="submit" name="update" class="btn btn-success">Submit</button>
                                                      <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                  </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- Modal Ends --></td>
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
          </div>
        </div>
      <?php
}
 ?>
<?php
if($_SESSION['role']== "instructor"){

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
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Canceled Lessons</h4>
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
								<tr>
									<th>Student Name</th>
									<th>Contact Number</th>
									<th>Date</th>
									<th>Time</th>
									<th>Status</th>
								</tr>
								</thead>
								<tbody>
                                <?php
                                $players = R::findAll('lessons','instructor=? AND cancel_status=?',[$id,"yes"]);


                                foreach ($players as $player) {
                                    $S_id = $player->student;
                                    $In_id = $player->instructor;
                                    $In = R::findOne('students','users_id =?',[$S_id]);


                                    ?>
									<tr>
										<td><?php echo $In->fname .  " ". $In->sname;?></td>
										<td><?php echo $player->pnumber ?></td>
										<td><?php echo $player->date ?></td>
										<td><?php echo $player->time ?></td>
										<td>
                                            <?php
                                            if($player->status==0) { ?>
												<label class="badge badge-success">Pending</label>
                                                <?php
                                            }else {
                                                ?>

												<label class="badge badge-info">Finished</label>

                                                <?php
                                            }
                                            ?>
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
		</div>
	</div>
    <?php
}if($_SESSION['role']== "admin"){

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
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Canceled Lessons</h4>
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
								<tr>
									<th>Student Name</th>
									<th>Instructor Name</th>
									<th>Date</th>
									<th>Time</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
                                <?php
                                $players = R::findAll('lessons',' cancel_status=?',["yes"]);


                                foreach ($players as $player) {
                                    $S_id = $player->student;
                                    $In_id = $player->instructor;
                                    $In = R::findOne('students','users_id =?',[$S_id]);
                                    $Ins = R::findOne('instructors','users_id =?',[$In_id]);


                                    ?>
	                                <tr>
		                                <td><?php echo $In->fname .  " ". $In->sname;?></td>
		                                <td><?php echo $Ins->fname .  " ". $Ins->sname;?></td>
										<td><?php echo $player->date ?></td>
										<td><?php echo $player->time ?></td>
										<td>
                                            <?php
                                            if($player->status==0) { ?>
												<label class="badge badge-success">Pending</label>
                                                <?php
                                            }else {
                                                ?>

												<label class="badge badge-info">Finished</label>

                                                <?php
                                            }
                                            ?>
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
		</div>
	</div>
    <?php
}


	?>

       <?php
include ("footer.php");

?>