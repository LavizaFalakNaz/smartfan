<!DOCTYPE html>
<html>
     <head>
          <title>Login</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     </head>
     <body>

<?php 
     if(isset($_GET['vkey'])) {
     //process verification 
     $vkey = $_GET['vkey']; 

     $host = "remotemysql.com:3306";
     $user = "adbWXh8Aas";
     $pass = "lzEnLOhuZO";
     $db = "adbWXh8Aas";

     $mysqli = NEW MySQLi($host, $user, $pass, $db);

     $resultSet = $mysqli->query("SELECT is_active, vkey FROM users WHERE is_active = 0 AND vkey='$vkey' LIMIT 1");
          if($resultSet->num_rows == 1){
               //validate email
               $update = $mysqli->query("UPDATE users SET is_active = 1 WHERE vkey = '$vkey' LIMIT 1");
               if($update){
                    ?>
                         <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
                              <div class="card" style="width: 18rem;">
                                   <div class="card-body text-center">
                                        <p>Success</p>
                                        <h5 class="card-title">Account verified!</h5>
                                        <a href="login.php" class="btn btn-dark">Login now!</a>
                                   </div>
                              </div>
                         </div>
                    <?php 
               }
               else{
                    echo $mysqli->error;
               }
          }
          else{
               ?>
                    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
                         <div class="card" style="width: 18rem;">
                              <div class="card-body text-center">
                                   <p>Caution!</p>
                                   <h5 class="card-title">Account Active Already!</h5>
                                   <a href="login.php" class="btn btn-dark">Login now!</a>
                              </div>
                         </div>
                    </div>
               <?php 
          }
     }
     else{
          echo "something went wong!"; 
     }
     ?>

     </body>
</html>