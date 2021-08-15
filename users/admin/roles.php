<?php 
     session_start();
     include "config.php";

     if(isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin")
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
                        <h1 class="h3 mb-0 text-gray-800">Users & Roles</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!--Email sent Alert-->
                    <?php if(isset($_GET['msg'])) { ?>
                         <div class="alert alert-success" role="alert">
                              <?=$_GET['msg']?>
                         </div>
                    <?php } ?>

                    <!--Content Row -->
                    <div class="row">
                         <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <i class="fas fa-user fa-sm text-white-50 mr-1"></i> Add Admin
                              </button>
                         </div>
                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                   <div class="modal-content">
                                        <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Add an Admin Account</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="includes/add-admin.php" method="post">
                                             <div class="modal-body">
                                                  <div class="mb-3">
                                                       <label for="name" class="form-label">Full Name</label>
                                                       <input type="text" class="form-control" id="name" name="name">
                                                  </div>
                                                  <div class="mb-3">
                                                       <label for="username" class="form-label">Email</label>
                                                       <input type="email" class="form-control" id="username" name="username">
                                                  </div>
                                                  <div class="mb-3">
                                                       <label for="password" class="form-label">Password</label>
                                                       <input type="password" class="form-control" id="password" name="password">
                                                  </div>
                                             </div>
                                             <div class="modal-footer">
                                                  <button type="submit" class="btn btn-success">Add</button>
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                         <?php include "includes/members-data.php"; ?>            
                    </div>

                    <!-- end content -->

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
