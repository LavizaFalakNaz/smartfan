<?php

     session_start();
     include "../config/config.php";

     if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']))
     {
          function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
          }

          $username = test_input($_POST['username']);
          $password = test_input($_POST['password']);
          $role = test_input($_POST['role']);

          if(empty($username))
          {
               header("Location: login.php?error=Username is Required");
               exit();
          }
          else if (empty($password))
          {
               header("Location: login.php?error=Password is Required");
               exit();
          }
          else 
          {
               //hashing the password
               $password = md5($password);

               $sql = "SELECT * FROM users WHERE username='$username'
                         AND password='$password'";

               $result = mysqli_query($conn, $sql);

               if(mysqli_num_rows($result) === 1)
               //username must be unique 
               {
                    $row = mysqli_fetch_assoc($result);
                    if($row['password'] === $password && $row['role'] == $role)
                    {
                         if($row['is_active'] == 1){

                              $_SESSION['name'] = $row['name'];
                              $_SESSION['username'] = $row['username'];
                              $_SESSION['id'] = $row['id'];
                              $_SESSION['role'] = $row['role'];
                               
                              //for temporary use 
                              $uid = $_row['id']; 

                              if ($_SESSION['role'] == "admin")
                              {
                                   header("location: ../users/admin/index.php");
                              }
                              else if ($_SESSION['role'] == "fan_user"){
                                   header("Location: ../users/fan_user/index.php");
                              }
                              else if ($_SESSION['role'] == "loc_user"){
                                   header("Location: ../users/loc_user/index.php");
                              }
                              else if ($_SESSION['role'] == "demo"){
                                   header("Location: ../users/demo/index.php");
                              }
                         }
                         else{
                              header("Location: login.php?error=Account not verified. Please check your email");
                         }
                    }
                    else
                    {
                         header("Location: login.php?error=Incorrect username or password");
                    }
               }
               else{
                    header("Location: login.php?error=Incorrect username or password");
               }

          }
     }
     else
     {
          header("Location: login.php");
          exit();
     }
?>