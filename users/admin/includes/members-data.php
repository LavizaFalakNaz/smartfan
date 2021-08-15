<?php

     include "config.php"; 

     $query = "SELECT username, role, name FROM users WHERE is_active = 1";
     $result = mysqli_query($conn, $query);

     if (!$result)
     {
          header("Location: roles.php?msg=No users exist to be shown");
          exit();
     }
     else {
?>
     <div class="col-xl-12 col-lg-7">

     <?php
          $total = 0;
          while($row = mysqli_fetch_assoc($result)){
               $total++;
          } 
     ?>
          <p class="mb-3">Total Users: <?php echo $total; ?></p>

     <table class="table">
          <thead>
               <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Access</th>
                    <th scope="col">Action</th>
               </tr>
          </thead>
          <tbody>
               <?php
                    $counter = 1; 
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)){ 
                    $username = $row['username'];
                    $name = $row['name'];       
               ?>
                    <tr>
                         <th scope="row"><?php echo $counter; ?></th>
                         <td><?php echo $row['name']; ?></td>
                         <td><?php echo $row['username']; ?></td>
                         <td><?php echo $row['role']; ?></td>
                         <td><a class="btn btn-success" href="<?php echo "includes/delete.php?username=".$username."&name=".$name; ?>" role="button">Delete</a></td>
                    </tr>
               <?php
                    $counter++;
                    }  
               ?>
          </tbody>
     </table>
     </div>
<?php 
     }
?>