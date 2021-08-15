<?php

     include "config.php"; 

     $query = "SELECT * FROM fans";
     $result = mysqli_query($conn, $query);

     if (!$result)
     {
          header("Location: fans_data.php?msg=No Fan resources exist to be shown");
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
          <p class="mb-3">Total Fans: <?php echo $total; ?></p>

     <table class="table">
          <thead>
               <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fan ID</th>
                    <th scope="col">In use</th>
                    <th scope="col">Action</th>
               </tr>
          </thead>
          <tbody>
               <?php
                    $counter = 1; 
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)){ 
                    $fan_id = $row['fan_id'];
               ?>
                    <tr>
                         <th scope="row"><?php echo $counter; ?></th>
                         <td><?php echo $row['fan_id']; ?></td>
                         <?php if ($row['users_id'] == 0){ ?>
                              <td>Not in use</td>
                         <?php 
                         } else { ?>
                              <td>In use</td>
                         <?php } ?>
                         <td><a class="btn btn-success" href="<?php echo "includes/delete.php?fan_id=".$fan_id;?>" role="button">Delete</a></td>
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