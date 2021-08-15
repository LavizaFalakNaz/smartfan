<?php

     session_start();
     include "../config.php";

     if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']))
     {
          function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
          }

          $name = test_input($_POST['name']);
          $username = test_input($_POST['username']);
          $password = test_input($_POST['password']);
          $password = md5($password);
          $role = test_input("admin");

          //generate vkey for the verification of the users.
          //the time stamp changes every second and the user may only have one email
          // in this way, this vkey becomes very unique
          $vkey = md5(time().$username);

          $insert = "INSERT INTO users (role, username, password, name, vkey) VALUES ('$role','$username','$password','$name', '$vkey')";

          if(!mysqli_query($conn, $insert)){
               die('Error: '.mysqli_error($con));
          }
          else{
               $to = $username;
               $subject = "Email Verification";
               $message = "<a href='http://localhost/dashboard/nav/verify.php?vkey=$vkey'>Click here to Verify your account</a>";
               // Always set content-type when sending HTML email
               $headers = "MIME-Version: 1.0" . "\r\n";
               $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

               // More headers
               $headers .= 'From: hello@lavizadevelops.com' . "\r\n";

               if(!mail($to, $subject, $message, $headers))
               {
                    echo "Email couldnt be sent!";
               }
               else{
                    header("Location: ../roles.php?msg=Verification email has been sent to the User");
                    exit();
               }
          }
     }
     else
     {
          header("Location: ../roles.php?msg=Something Went Wrong! Please try again in a while.");
          exit();
     }