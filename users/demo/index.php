<?php 
     session_start();
     include "config.php";

     if(isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == "demo")
     { 
          //we close php here so that whatever happens after it is in loop
          ?>

				<?php include "includes/header.php";  ?>
				
				<?php include "includes/sidebar.php";  ?>

                <?php include "includes/topbar.php";  ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Demo Dashboard</h1>
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
