<?php
session_start();
include ("header.php");

$conn = mysqli_connect("localhost", "root", "", "dsms");


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
              <h4 class="card-title">Data table</h4>
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
		                  </tr>
		                  </thead>
		                  <tbody>
                          <?php
                          $players = R::findAll('lessons','student=? AND status=?',[$id,"0"]);


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
	if($_SESSION['role']== "instructor") {

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
              <h4 class="card-title">Data table</h4>
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
                          $players = R::findAll('lessons','instructor=? AND status=?',[$id,"0"]);


                          foreach ($players as $player) {
                              $S_id = $player->student;
                             // $In_id = $player->instructor;
                              $In = R::findOne('students','users_id =?',[$S_id]);


                              ?>
			                  <tr>
				                  <td><?php echo $In->fname .  " ". $In->sname;?></td>
				                  <td><?php echo $In->pnumber ?></td>
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
}if($_SESSION['role']== "admin") {

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
				<h4 class="card-title">Data table</h4>
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
								</tr>
								</thead>
								<tbody>
                                <?php
                                $players = R::findAll('lessons');


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
                                        <td>
                                            <?php
                                            if($player->cancel_status=="" && $player->status==0 ) { ?>
                                                <form action="" method="post">
                                                    <input value="<?php echo $player->id ?>" type="hidden" name="id">
                                                    <button name="cancel" type="submit" class="btn btn-outline-primary">Cancel Lesson</button>
                                                </form>
                                                <form action="" method="post">
                                                    <input value="<?php echo $player->id ?>" type="hidden" name="id">
                                                    <button name="confirm" type="submit" class="btn btn-outline-primary">Confirm Lesson</button>
                                                </form>
                                                <?php
                                            }if($player->cancel_status=="no" && $player->status==0 ) {
                                                ?>

                                                Lesson Confirmed

                                                <?php
                                            }if($player->cancel_status=="yes" && $player->status==0 ) {
                                                ?>

                                                Lesson Cancelled

                                                <?php
                                            }if($player->cancel_status=="no" && $player->status==1 ) {
                                                ?>

                                                Lesson Finished

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
 ?><?php
if (isset($_POST['cancel'])){


    $lid=$_POST['id'];
    mysqli_query($conn,"UPDATE `lessons` SET `cancel_status`='yes' WHERE `id`= '$lid'");
 ?>
	<script>
		alert('Lesson Succsessfully Cancel ');
		window.location = "mylessons.php";
	</script>

    <?php

}
if (isset($_POST['confirm'])){


    $lid=$_POST['id'];
    mysqli_query($conn,"UPDATE `lessons` SET `cancel_status`='no' WHERE `id`= '$lid'");
 ?>
	<script>
		alert('Lesson Succsessfully Confirmed ');
		window.location = "lessons.php";
	</script>

    <?php

}
?>
        <?php

include "footer.php";
?>