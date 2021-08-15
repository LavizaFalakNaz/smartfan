<?php 
     session_start();
     include "config.php";

     if(isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == "fan_user")
     { 
          $uid = $_SESSION['id'];
          $query = "SELECT fan_id FROM fans WHERE users_id = '$uid'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $_SESSION['fanlocid'] = $row['fan_id'];

          //we close php here so that whatever happens after it is in loop
          ?>

				<?php include "includes/header.php";  ?>
				
				<?php include "includes/sidebar.php";  ?>

                <?php include "includes/topbar.php";  ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Fan User Dashboard</h1>
                        
                    </div>                  
                    
                    <div class="row">
                         <p>Fan ID: <?=$_SESSION['fanlocid']?></p>
                    </div>

                    <!-- Content Row -->
                    <!--<div class="row">-->
                         <!-- USE FOR ANY ADDITIONAL ROWS -->                        
                    <!--</div>-->

                </div>
               <!--/.container-fluid -->

            </div>
            <!-- End of Main Content -->
			
		<?php include "includes/scripts.php"; ?>

		<?php include "includes/footer.php"; ?>

<?php }
     else{
          header("Location: ../../index.php");
     }
?>
