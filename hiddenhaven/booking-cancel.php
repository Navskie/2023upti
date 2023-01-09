<?php

  include '../include/db.php';

  session_start();

  $id = $_GET['id'];
  $HHcode = $_GET['HHcode'];

  $update_date = "DELETE FROM haven_date WHERE book_poid = '$id'";
  $sql = mysqli_query($connect, $update_date);

  unset($_SESSION['date1banene']);
  unset($_SESSION['date2banene']);
  $_SESSION['date1banene'] = '';
  $_SESSION['date2banene'] = '';

  header('Location: booking.php?HHCode='.$HHcode.'');
  
?>