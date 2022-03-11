<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<body style="background-color:green;"> 
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border" style="display:flex;align-items:center;justify-content:space-between;padding: right 10px;">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM branches")->num_rows; ?></h3>

                <p>Total Branches</p>
              </div>
              <div class="icon" style="width: 65px;height: 50px;">
                <img class="img rounded circle" style="width: 100%;height: 100%;padding-right:15%"; src="branch.png">
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border" style="display:flex;align-items:center;justify-content:space-between;padding: right 10px;margin: right 10px;">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?></h3>

                <p>Total Parcels</p>
              </div>
              <div class="icon" style="width: 70px;height: 50px;">
                <img class="img rounded circle" style="width: 100%;height: 100%;padding-right:15%"; src="parcel.png">
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border"style="display:flex;align-items:center;justify-content:space-between;padding: right 55px;padding: left 10em;padding: right 10em;">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM users where type != 1")->num_rows; ?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon" style="width: 75px;height: 65px;">
                <img class="img rounded circle" style="width: 100%;height: 100%;padding-right:15%"; src="team.png">
              </div>
            </div>
          </div>
          <hr>
          <?php 
              $status_arr = array("Item Accepted by Courier","Collected","Shipped","In-Transit","Arrived At Destination","Out for Delivery","Ready to Pickup","Delivered","Picked-up","Unsuccessfull Delivery Attempt");
               foreach($status_arr as $k =>$v):
          ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border"style="display:flex;align-items:center;justify-content:space-between;padding: right 10px;">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels where status = {$k} ")->num_rows; ?></h3>

                <p><?php echo $v ?></p>
              </div>
              <div class="icon" style="width: 70px;height: 70px;">
                <img class="img rounded circle" style="width: 100%;height: 100%;padding-right:25%"; src="packages.png">
              </div>
            </div>
          </div>
            <?php endforeach; ?>
      </div>

<?php else: ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>
      </body>          
<?php endif; ?>
