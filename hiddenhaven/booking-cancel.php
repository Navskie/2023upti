<?php

  include '../include/db.php';

  session_start();

  $id = $_GET['id'];
  $HHcode = $_GET['HHcode'];

  $update_date = "DELETE FROM haven_date WHERE book_poid = '$id'";
  $sql = mysqli_query($connect, $update_date);

  unset($_SESSION['BookDate']);
  unset($_SESSION['BookDate2']);
  $_SESSION['BookDate'] = '';
  $_SESSION['BookDate2'] = '';

  header('Location: booking.php?HHCode='.$HHcode.'');
  
?>