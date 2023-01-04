<?php
  $host = 'localhost'; #online hostname
  $user = 'root'; #online username
  $pass = ''; #online password
  $dbms = 'uptimisedph'; #online dbname test

  // try
  // {
  //   $connection = new PDO("mysql:host=$host;dbname=$dbms", $user, $pass);
  //   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   // echo 'Database Connected Successfully';
  // }
  // catch (PDOException $x)
  // {
  //   echo 'Database Error Connection: ' . $x->getMessage();
  // }

  $connect = mysqli_connect($host, $user, $pass, $dbms);

  date_default_timezone_set('Asia/Manila');

  session_start();
?>