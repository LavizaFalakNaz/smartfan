<?php

     session_start();
     include "../config.php";

     if(isset($_POST['location_id']))
     {
          function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
          }

          $location_id = test_input($_POST['location_id']);

          $insert = "INSERT INTO locations (location_id, users_id) VALUES ('$location_id',0)";

          if(!mysqli_query($conn, $insert)){
               die('Error: '.mysqli_error($con));
          }
          else{
               header("Location: ../locres.php?msg=Location Added Successfully.");
               exit();
          }
     }
     else
     {
          header("Location: ../locres.php?msg=Something Went Wrong! Please try again in a while.");
          exit();
     }