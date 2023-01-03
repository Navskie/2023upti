<?php

  include '../database/dbconn.php';

  $id = $_GET['id'];

  // $update_book = mysqli_query($connect, "UPDATE haven_booking SET booking_status = 'Success' WHERE booking_ref = '$id'");

  $get_info = mysqli_query($connect, "SELECT * FROM haven_details WHERE details_ref = '$id'");
  $get_info_fetch = mysqli_fetch_array($get_info);

  $details_code = $get_info_fetch['details_code'];
  $details_amount = $get_info_fetch['details_amount'];

  $details_amount_5 = $details_amount * 0.08;
  // echo '<br>';
  $details_amount_admin = $details_amount * 0.02;

  $seller = mysqli_query($connect, "SELECT * FROM upti_reseller WHERE reseller_code = '$details_code'");
  $seller_fetch = mysqli_fetch_array($seller);

  $reseller_earning = $seller_fetch['reseller_earning'];

  echo $new_reseller_earn = $reseller_earning + $details_amount_5;

  // header('Location: ../reservation.php');
  
?>