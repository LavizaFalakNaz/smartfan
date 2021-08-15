<?php

     session_start();
     include "../config.php";

     if(isset($_POST['fan_id']))
     {
          function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
          }

          $fan_id = test_input($_POST['fan_id']);

          $insert = "INSERT INTO fans (fan_id, users_id) VALUES ('$fan_id',0)";

          if(!mysqli_query($conn, $insert)){
               die('Error: '.mysqli_error($con));
          }
          else{
               header("Location: ../fanres.php?msg=Fan Resource Added Successfully.");
               exit();
          }
     }
     else
     {
          header("Location: ../fanres.php?msg=Something Went Wrong! Please try again in a while.");
          exit();
     }