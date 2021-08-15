<?php
     include "../config.php";

     //DELETE ADMIN
     if (isset($_GET['username']) && isset($_GET['name']))
     {
          $username = $_GET['username'];
          $name = $_GET['name'];
          // sql to delete a record
          $sql = "DELETE FROM users WHERE name='$name' AND username='$username'";
          if (mysqli_query($conn, $sql)) 
          {
               header("Location: ../roles.php?msg=User Removed Successfully!");
          } 
          else 
          {
               header("Location: ../roles.php?msg=User could not be Removed. (" . mysqli_error($conn) . ")");
          }
          mysqli_close($conn);
     }
     else if (isset($_GET['fan_id']))
     {
          $fan_id = $_GET['fan_id'];
          // sql to delete a record
          $sql = "DELETE FROM fans WHERE fan_id='$fan_id'";
          if (mysqli_query($conn, $sql)) 
          {
               header("Location: ../fanres.php?msg=Fan Removed Successfully!");
          } 
          else 
          {
               header("Location: ../fanres.php?msg=Fan could not be Removed. (" . mysqli_error($conn) . ")");
          }
          mysqli_close($conn);
     }
     else if (isset($_GET['location_id'])){
          $location_id = $_GET['location_id'];
          // sql to delete a record
          $sql = "DELETE FROM locations WHERE location_id='$location_id'";
          if (mysqli_query($conn, $sql)) 
          {
               header("Location: ../locres.php?msg=Location Removed Successfully!");
          } 
          else 
          {
               header("Location: ../locres.php?msg=Location could not be Removed. (" . mysqli_error($conn) . ")");
          }
          mysqli_close($conn);
     }
?>