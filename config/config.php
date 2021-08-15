<?php

     $host = "localhost";
     $user = "root";
     $pass = "";
     $db = "user";

     $conn = mysqli_connect($host, $user, $pass, $db);

     if(!$conn){
          echo "Connection Failed";
          exit();
     }