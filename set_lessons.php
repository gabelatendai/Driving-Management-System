<?php
session_start();
include ("header.php");
//include ("rb.php");
$conn = mysqli_connect("localhost", "root", "", "dsms");
$id= $_SESSION['id'];
//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

if (isset($_POST['add'])){



    $instruct=$_POST['instructor'];;
    $time=$_POST['time'];;
    $date=$_POST['date'];;

    $init = R::findOne('lessons', 'instructor  = ? AND date  = ? AND time  = ?', [$instruct,$date,$time]);

    if ($init > 0) {
        echo "<script>alert('Reschedule your Lesson The Instructor Will Not be Available!'); window.location='set_lessons.php'</script>";
    } else {


        $instructors = R::dispense('lessons');
        $instructors->student = $id;
        $instructors->instructor =$instruct;
        $instructors->date = $date;
        $instructors->time = $time;
        $instructors->status = 0;
        $instructors->cancel_status = "";
       // $instructors->confirm = "no";
        $instructors->date_recorded = date('Y-m-d H:i:s');
         R::store($instructors);

        ?>
		<script>
			alert('Succsessfully Saved');
			window.location = "set_lessons.php";
		</script>
        <?php
    }
}
?>
      <!-- partial -->
<?php // if($_SESSION['role']=='admin'){?>
<!--      <div class="main-panel">        -->
<!--        <div class="content-wrapper">-->
<!--          <div class="page-header">-->
<!--            <h3 class="page-title">-->
<!--               Schedule Lessons-->
<!--            </h3>-->
<!--            <nav aria-label="breadcrumb">-->
<!--                <ol class="breadcrumb">-->
<!--                <li class="breadcrumb-item"><a href="#">Forms</a></li>-->
<!--                <li class="breadcrumb-item active" aria-current="page">Form elements</li>-->
<!--                </ol>-->
<!--            </nav>-->
<!--          </div>-->
<!--          <div class="row">-->
<!--            <div class="col-md-8 offset-md-2 grid-margin stretch-card">-->
<!--              <div class="card">-->
<!--                <div class="card-body">-->
<!--                  <h4 class="card-title">Default form</h4>-->
<!--                  <p class="card-description">-->
<!--                    Basic form layout-->
<!--                  </p>-->
<!--                      <form class="pt-3" action="" enctype="multipart/form-data" method="post">-->
<!--		                  <div class="form-group">-->
<!--			                  <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="student">-->
<!--				                  <option>Select Student</option>-->
<!--				                  --><?php
//				                  $players = R::findAll('students');
//
//
//                      foreach ($players as $player) {
//                          $id = $player->users_id;
//                          $name = $player->fname . "  ".$player->sname ;
//                          ?>
<!---->
<!--	                      <option value="--><?php //echo $id;  ?><!--">--><?php //echo $name;  ?><!--</option>-->
<!--                          --><?php
//                      }
// ?>
<!--			                  </select>-->
<!--		                  </div>-->
<!--		                  <div class="form-group">-->
<!--			                  <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="instructor">-->
<!--				                  <option>Select Instructor</option>-->
<!--				                  --><?php
//				                  $players = R::findAll('instructors');
//
//
//                      foreach ($players as $player) {
//                          $id = $player->users_id;
//                          $name = $player->fname . "  ".$player->sname ;
//                          ?>
<!---->
<!--	                      <option value="--><?php //echo $id;  ?><!--">--><?php //echo $name;  ?><!--</option>-->
<!--                          --><?php
//                      }
//                      ?>
<!--			                  </select>-->
<!--		                  </div>-->
<!--	                      <div class="form-group">-->
<!--		                      <label for="exampleInputUsername1">Date</label>-->
<!--		                      <input type="date" class="form-control" id="exampleInputUsername1" name="date">-->
<!--	                      </div>-->
<!--		                  <div class="form-group">-->
<!--			                  <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="time">-->
<!--				                  <option>Select Time</option>-->
<!--				                  <option value="08:00 - 08:30">08:00 - 08:30</option>-->
<!--				                  <option value="08:30 - 09:00">08:30 - 09:00</option>-->
<!--				                  <option value="09:00 - 09:30">09:00 - 09:30</option>-->
<!--				                  <option value="09:30 - 10:00">09:30 - 10:00</option>-->
<!--				                  <option value="10:00 - 10:30">10:00 - 10:30</option>-->
<!--				                  <option value="10:30 - 11:00">10:30 - 11:00</option>-->
<!--				                  <option value="11:00 - 11:30">11:00 - 11:30</option>-->
<!--				                  <option value="11:30 - 12:00">11:30 - 12:00</option>-->
<!--				                  <option value="12:00 - 12:30">12:00 - 12:30</option>-->
<!--				                  <option value="12:30 - 13:00">12:30 - 13:00</option>-->
<!--				                  <option value="13:00 - 13:30">13:00 - 13:30</option>-->
<!--				                  <option value="13:30 - 14:00">13:30 - 14:00</option>-->
<!--				                  <option value="14:00 - 14:30">14:00 - 14:30</option>-->
<!--				                  <option value="14:30 - 15:00">14:30 - 15:00</option>-->
<!--				                  <option value="15:00 - 15:30">15:00 - 15:30</option>-->
<!--				                  <option value="15:30 - 16:00">15:30 - 16:00</option>-->
<!--				                  <option value="16:00 - 16:30">16:00 - 16:30</option>-->
<!--				                  <option value="16:30 - 17:00">16:30 - 17:00</option>-->
<!--				              </select>-->
<!--		                  </div>-->
<!--                    <button type="submit" name="add" class="btn btn-primary mr-2">Submit</button>-->
<!--                    <button class="btn btn-light">Cancel</button>-->
<!--                  </form>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--    --><?php //} if($_SESSION['role']=='student'){?>
          <div class="main-panel">
              <div class="content-wrapper">
                  <div class="page-header">
                      <h3 class="page-title">
                          Schedule My Lesson
                      </h3>
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Forms</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                          </ol>
                      </nav>
                  </div>
                  <div class="row">
                      <div class="col-md-8 offset-md-2 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title">Default form</h4>
                                  <p class="card-description">
                                      Basic form layout
                                  </p>
                                  <form class="pt-3" action="" enctype="multipart/form-data" method="post">
<!--                                      <div class="form-group">-->
<!--                                          <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="student">-->
<!--                                              <option>Select Student</option>-->
<!--                                              --><?php
//                                              $players = R::findAll('students');
//
//
//                                              foreach ($players as $player) {
//                                                  $id = $player->users_id;
//                                                  $name = $player->fname . "  ".$player->sname ;
//                                                  ?>
<!---->
<!--                                                  <option value="--><?php //echo $id;  ?><!--">--><?php //echo $name;  ?><!--</option>-->
<!--                                                  --><?php
//                                              }
//                                              ?>
<!--                                          </select>-->
<!--                                      </div>-->
                                      <div class="form-group">
                                          <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="instructor">
                                              <option>Select Instructor</option>
                                              <?php
                                              $players = R::findAll('instructors');


                                              foreach ($players as $player) {
                                                  $id = $player->users_id;
                                                  $name = $player->fname . "  ".$player->sname ;
                                                  ?>

                                                  <option value="<?php echo $id;  ?>"><?php echo $name;  ?></option>
                                                  <?php
                                              }
                                              ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputUsername1">Date</label>
                                          <input type="date" class="form-control" id="exampleInputUsername1" name="date">
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
                                      <button type="submit" name="add" class="btn btn-primary mr-2">Submit</button>
                                      <button class="btn btn-light">Cancel</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <?php // } ?>
<?php
include ("footer.php");
?>