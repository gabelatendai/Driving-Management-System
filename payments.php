<?php
session_start();
include ("header.php");
//include "rb.php";
$id= $_SESSION['id'];

$conn = mysqli_connect("localhost", "root", "", "dsms");

//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

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
			                  <th>Amount</th>
			                  <th>Date</th>
		                  </tr>
		                  </thead>
		                  <tbody>
                          <?php
                          $total = 0;
                          $players = R::findAll('payments','user_id=?',[$id]);


                          foreach ($players as $player) {
//                              $S_id = $player->student;
                              $In_id = $player->user_id;
                              $In = R::findOne('students','users_id =?',[$In_id]);


                              ?>
			                  <tr>
				                  <td><?php echo $player->amount ?></td>
				                  <td><?php echo $player->date ?></td>
<!--				                  <td>-->
<!--                                      --><?php
//                                      if($player->status==0) { ?>
<!--						                  <label class="badge badge-success">Pending</label>-->
<!--                                          --><?php
//                                      }else {
//                                          ?>
<!---->
<!--						                  <label class="badge badge-info">Finished</label>-->
<!---->
<!--                                          --><?php
//                                      }
//                                      ?>
<!--				                  </td>-->

			                  </tr>
                              <?php
                               $total+= $player->amount;

                          }


                          ?>

<tr><td><?php  echo "Total:  $ ".number_format($total, 2) ; ?></td><td></td></tr>
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
if($_SESSION['role']== "admin"){

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
									<th>Amount</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
								</thead>
								<tbody>
                                <?php
                                $players = R::findAll('payments');


                                foreach ($players as $player) {
//                              $S_id = $player->student;
                                    $In_id = $player->user_id;
                                    $In = R::findOne('students','users_id =?',[$In_id]);


                                    ?>
									<tr>
										<td><?php echo $In->fname .  " ". $In->sname;?></td>
										<td><?php echo $player->amount ?></td>
										<td><?php echo $player->date ?></td>
										<!--				                  <td>-->
										<!--                                      --><?php
                                        //                                      if($player->status==0) { ?>
										<!--						                  <label class="badge badge-success">Pending</label>-->
										<!--                                          --><?php
                                        //                                      }else {
                                        //                                          ?>
										<!---->
										<!--						                  <label class="badge badge-info">Finished</label>-->
										<!---->
										<!--                                          --><?php
                                        //                                      }
                                        //                                      ?>
										<!--				                  </td>-->

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