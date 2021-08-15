<?php

     session_start();
     include "../config/config.php";

     function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }

     $fanlocid = "";
     $set = "";

     if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']) && $_POST['role'] != 'none')
     {

          if($_POST['role'] == 'fan_user' && isset($_POST['fanlocid'])){
               $fanlocid = test_input($_POST['fanlocid']);

               $host = "remotemysql.com:3306";
               $user = "adbWXh8Aas";
               $pass = "lzEnLOhuZO";
               $db = "adbWXh8Aas";

               $mysqli = NEW MySQLi($host, $user, $pass, $db);
               $resultSet = $mysqli->query("SELECT fan_id, users_id FROM fans WHERE fan_id = '$fanlocid' AND users_id='0' LIMIT 1");
               if($resultSet->num_rows == 1){
                         $set = "fan";
               }
               else{
                    header("Location: signin.php?error=Fan or Location ID is already registered by another user");
                    exit();
               }
          }
          else if ($_POST['role'] == 'loc_user' && isset($_POST['fanlocid'])){
               $fanlocid = test_input($_POST['fanlocid']);
               
               $host = "remotemysql.com:3306";
               $user = "adbWXh8Aas";
               $pass = "lzEnLOhuZO";
               $db = "adbWXh8Aas";

               $mysqli = NEW MySQLi($host, $user, $pass, $db);

               $resultSet = $mysqli->query("SELECT location_id, users_id FROM locations  WHERE location_id = '$fanlocid' AND users_id='0' LIMIT 1");
               if($resultSet->num_rows == 1){
                         $set = "location";
               }
               else{
                    header("Location: signin.php?error=Fan or Location ID is already registered by another user");
                    exit();
               }
          }
          else{
               header("Location: signin.php?error=Fan or Location ID is required for the requested User Type");
               exit();
          }

          $name = test_input($_POST['name']);
          $username = test_input($_POST['username']);
          $password = test_input($_POST['password']);
          $password = md5($password);
          $role = test_input($_POST['role']);

          //generate vkey for the verification of the users.
          //the time stamp changes every second and the user may only have one email
          // in this way, this vkey becomes very unique
          $vkey = md5(time().$username);

          $insert = "INSERT INTO users (role, username, password, name, vkey) VALUES ('$role','$username','$password','$name', '$vkey')";

          if(!mysqli_query($conn, $insert)){
               die('Error: '.mysqli_error($con));
          }
          else{

               $query = "SELECT id  FROM users WHERE username = '$username' and password = '$password'";
               $result = mysqli_query($conn, $query);
               if(mysqli_num_rows($result) === 1)
               {
                    $row = mysqli_fetch_assoc($result);
                    $uid = $row ['id'];
               }

               if ($role == "fan_user")
               {
                    $insert = "UPDATE fans SET users_id = '$uid' WHERE fan_id = '$fanlocid' LIMIT 1";
                    if(!mysqli_query($conn, $insert)){
                         die('Error: '.mysqli_error($conn));
                    }
               }
               else if ($role = "loc_user"){

                    $insert = "UPDATE locations SET users_id = '$uid' WHERE location_id = '$fanlocid' LIMIT 1";
                    if(!mysqli_query($conn, $insert)){
                         die('Error: '.mysqli_error($conn));
                    }
               }

               header("Location: ../mail.php?username=$username&vkey=$vkey");

               /*$to = $username;
               $subject = "Email Verification";
               
               $message = "
                         <h3>Thankyou for choosing Smart Fans</h3>
                         <p>We received a registration request from your email and this email is sent to confirm your registration. 
                         <a href='https://smartfan-dashboard.herokuapp.com/dashboard/nav/verify.php?vkey=$vkey'>
                         Click here to Verify your account 
                         </a>
                         <hr>
                         <p>Please ignore this email if you have already verified your account</p>
                         <p><strong>If you received this email without consent or have not registered for SmartFans, please dont click on the provided link as the malicious user may get access to your account unintentionally. Please discard this email immediately.</strong><p>
                    ";
               // Always set content-type when sending HTML email
               $headers = "MIME-Version: 1.0" . "\r\n";
               $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

               // More headers
               $headers .= 'From: hello@lavizadevelops.com' . "\r\n";*/

          }
     }
     else
     {
          header("Location: signin.php?error=Please Enter your Details");
          exit();
     }

     if(isset($_GET['msg']) && $_GET['msg']=="Success")
     {
          header("Location: display.php");
          exit();
     }
     else{
          header("Location: signin.php?error=Something went wrong. Please try again.")
     }