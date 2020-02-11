<?php
session_start();
include ("header.php");
//include "rb.php";

$conn = mysqli_connect("localhost", "root", "", "dsms");

//R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

?>
      <!-- partial -->
      <div class="main-panel">
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
                            <th>Full Name</th>
                            <th>ID Number</th>
                             <th>PhoneNumber</th>
                            <th>CLass</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $players = R::findAll('instructors');


                      foreach ($players as $player) {
                          $id = $player->id;
                          ?>
	                      <tr>
		                      <td><?php echo $player->fname .  " ". $player->sname;?></td>
		                      <td><?php echo $player->idno ?></td>
		                      <td><?php echo $player->pnumber ?></td>
		                      <td><?php echo $player->class ?></td>
		                      <td>
			                      <label class="badge badge-info">On hold</label>
		                      </td>
		                      <td>
			                      <button class="btn btn-outline-primary">View</button>
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


include "footer.php";
?>