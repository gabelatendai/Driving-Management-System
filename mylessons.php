<?php
session_start();
include ("header.php");

$id= $_SESSION['id'];

$conn = mysqli_connect("localhost", "root", "", "dsms");


@$stud = R::findOne('students','users_id =?',[$id]);
@$stud2 = R::findOne('instructors','users_id =?',[$id]);

@$name= $stud->fname.  "    " . $stud->sname ;
@$name2= $stud2->fname.  "    " . $stud2->sname ;
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
var name = "Designed by: Gabriel Musodza";
    document.getElementById("demo").innerHTML = Date();
	  document.getElementById("demo").innerHTML = name;
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
              <h4 class="card-title"><?php echo $name ;?>
              </h4>
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
                      $players = R::findAll('lessons','student=?',[$id]);


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
<!--		                     <td>-->
<!--		                      --><?php
//                                  if($player->cancel_status=="" && $player->status==0 ) { ?>
<!--				                     <form action="" method="post">-->
<!--								<input value="--><?php //echo $player->id ?><!--" type="hidden" name="id">-->
<!--								<button name="cancel" type="submit" class="btn btn-outline-primary">Cancel Lesson</button>-->
<!--</form>-->
<!--				                     <form action="" method="post">-->
<!--								<input value="--><?php //echo $player->id ?><!--" type="hidden" name="id">-->
<!--								<button name="confirm" type="submit" class="btn btn-outline-primary">Confirm Lesson</button>-->
<!--</form>-->
<!--                                      --><?php
//                                  }if($player->cancel_status=="no" && $player->status==0 ) {
//                                      ?>
<!---->
<!--				            Lesson Confirmed-->
<!---->
<!--                                      --><?php
//                                  }if($player->cancel_status=="yes" && $player->status==0 ) {
//                                      ?>
<!---->
<!--				            Lesson Cancelled-->
<!---->
<!--                                      --><?php
//                                  }if($player->cancel_status=="no" && $player->status==1 ) {
//                                      ?>
<!---->
<!--				            Lesson Finished-->
<!---->
<!--                                      --><?php
//                                  }
//                                  ?>
<!--										</td>-->
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
				<h4 class="card-title"><?php
					echo @$name ;
					echo @$name2 ;

				?>
				</h4>
				<a class="btn btn-secondary float-right" onclick="javascript:printlayer('div-id-name')" >Pint</a>
                <div id="div-id-name">
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
<!--							<table  class="table">-->
							 <table id="order-listing" border="1"  width="100%" class="table table-striped table-condensed table-hover dataTables table-bordered" >

								<thead>
								<tr>
									<th>Student Name</th>
									<th>Contact Number</th>
									<th>Date</th>
									<th>Time</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
								</thead>
								<tbody>
                                <?php
                                $players = R::findAll('lessons','instructor=?',[$id]);


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
										<td>
								<?php	if($player->cancel_status=="no" && $player->status==0 ) { ?>
<form action="" method="post">
								<input value="<?php echo $player->id ?>" type="hidden" name="id">
								<button name="mark" type="submit" class="btn btn-outline-primary">Mark as Lesson Done</button>
</form>
									<?php
}	if($player->cancel_status=="yes" && $player->status==0 ) { ?>
			Lesson Cancelled

									<?php
}if($player->cancel_status=="" && $player->status==0 ) { ?>
			Lesson Not Confirmed
			</td>
									<?php
}
 ?>
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
}
if (isset($_POST['mark'])){


    $lid=$_POST['id'];
    mysqli_query($conn,"UPDATE `lessons` SET `status`='1' WHERE `id`= '$lid'");
 ?>
	<script>
		alert('Lesson Succsessfully Marked ');
		window.location = "mylessons.php";
	</script>

    <?php

}

include "footer.php";
?>