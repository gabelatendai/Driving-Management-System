<?php
session_start();
include ("header.php");
//include "rb.php";
$id= $_SESSION['id'];

$conn = mysqli_connect("localhost", "root", "", "dsms");

//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

?>
    <script type="text/javascript" >
        function printlayer(layer)
        {
            var generator =window.open(",'name,");
            var layetext =document.getElementById(layer);
            generator.document.write(layetext.innerHTML.replace("Print Me"));

            generator.document.close();
            generator.print();
            generator.close();
        }
        function myFunction() {
            var d = new Date();
            document.getElementById("demo").innerHTML = Date();
        }
    </script>
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
                          $players = R::findAll('lessons','student=? AND status=?',[$id,"1"]);


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
        <a class="btn btn-secondary float-right" onclick="javascript:printlayer('div-id-name')" >Pint</a>
        <div class="card">
        <div id="div-id-name">

			<div class="card-body">
				<h4 class="card-title">Data table</h4>
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">

                                <table border="1"  id="order-listing"  class="table table-striped table-condensed table-hover dataTables table-bordered" >
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
                                $players = R::findAll('lessons','instructor=? AND status=?',[$id,"1"]);


                                foreach ($players as $player) {
                                    $S_id = $player->student;
                                    $In_id = $player->instructor;
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
                                $players = R::findAll('lessons',' status=?',["1"]);


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