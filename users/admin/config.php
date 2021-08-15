<?php

$host = "remotemysql.com:3306";
$user = "adbWXh8Aas";
$pass = "lzEnLOhuZO";
$db = "adbWXh8Aas";

     $conn = mysqli_connect($host, $user, $pass, $db);

     if(!$conn){
          echo "Connection Failed";
          exit();
     }