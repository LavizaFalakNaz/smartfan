<?php

     $host = "https://remotemysql.com/phpmyadmin";
     $user = "adbWXh8Aas";
     $pass = "lzEnLOhuZO";
     $db = "adbWXh8Aas";

     $conn = mysqli_connect($host, $user, $pass, $db);

     if(!$conn){
          echo "Connection Failed";
          exit();
     }