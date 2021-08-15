<?php 
     session_start();
     include "../config/config.php";

     if(!isset($_SESSION['username']) && !isset($_SESSION['id']))
     { 
          //we close php here so that whatever happens after it is in loop
?>
          
<!DOCTYPE html>
<html>
     <head>
          <title>Login</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     </head>
     <body>
          <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
               <form class="border shadow p-3 rounded" action="check-login.php" method="post" style="width:450px;">
                    <h1 class="text-center p-3">Login</h1>
                    <?php if(isset($_GET['error'])) { ?>
                         <div class="alert alert-danger" role="alert">
                              <?=$_GET['error']?>
                         </div>
                    <?php } ?>
                    <div class="mb-3">
                         <label for="username" class="form-label">Email</label>
                         <input type="email" name="username" class="form-control" id="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                         <label class="form-label">User Type</label>
                         <select class="form-select mb-3" name="role" aria-label="Default select example">
                              <option selected>None</option>
                              <option value="fan_user">Fan User</option>
                              <option value="loc_user">Location User</option>
                              <option value="admin">Master Admin</option>
                              <option value="demo">Demo Access</option>
                         </select>
                    </div>
                    <div class="d-grid gap-2 d-md-block text-center">
                         <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <p class="text-center mb-2">Dont have an account? <a href="signin.php">Sign in</a></p>
               </form>
          </div>
     </body>
</html>

<?php }
     else{
          $role = $_SESSION['role'];
          if ($role == "admin"){
               header("Location: ../users/admin/index.php");
          }
          else if ($role == "fan_user"){
               header("Location: ../users/fan_user/index.php");
          }
          else if ($role == "loc_user"){
               header("Location: ../users/loc_user/index.php");
          }
          else if ($role == "demo"){
               header("Location: ../users/demo/index.php");
          }
          
     }

?>