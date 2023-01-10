<?php

  include '../include/db.php';

  session_start();

  $code = $_SESSION['code'];

  $poid = $_GET['poid'];
  $HHcode = $_GET['HHcodes'];

  $amount_check = mysqli_query($connect, "SELECT * FROM haven_product WHERE product_code = '$HHcode'");
  $amount_check_qry = mysqli_fetch_array($amount_check);

  $amount = $amount_check_qry['product_price'];

  if (isset($_POST['process'])) {
    $time = $_POST['timeslot'];
    // echo '<br>';
    $pax = $_POST['totalpax'];
    // echo '<br>';
    $fname1 = $_POST['fname1'];
    // echo '<br>';
    $contact = $_POST['contact'];

    if (empty($time) || empty($pax) || empty($fname1) || empty($contact)) {
      
    } else {
      $insert_name1 = mysqli_query($connect, "INSERT INTO haven_name (hh_code, pangalan) VALUES ('$poid', '$fname1')");
      // $insert_name2 = mysqli_query($connect, "INSERT INTO haven_name (hh_code, pangalan) VALUES ('$poid', '$fname2')");

      $details = mysqli_query($connect, "INSERT INTO haven_details (
        details_code,
        details_ref,
        details_time,
        details_pax,
        details_amount,
        details_contact
      ) VALUES (
        '$code',
        '$poid',
        '$time',
        '$pax',
        '$amount',
        '$contact'
      )");
    }

    header('Location: booking.php?HHCode='.$HHcode.'');

  }

  if (isset($_POST['update'])) {
    $time = $_POST['timeslot'];
    // echo '<br>';
    $pax = $_POST['totalpax'];
    // echo '<br>';
    $fname1 = $_POST['fname1'];
    // echo '<br>';
    $contact = $_POST['contact'];

    if (empty($time) || empty($pax) || empty($fname1) || empty($contact)) {
      
    } else {
      $insert_name1 = mysqli_query($connect, "UPDATE haven_name SET pangalan = '$fname1' WHERE hh_code = '$poid'");

      $details = mysqli_query($connect, "UPDATE haven_details SET
        details_time = '$time',
        details_pax = '$pax',
        details_amount = '$amount',
        details_contact = '$contact'
      WHERE 
        details_ref = '$poid'
      ");
    }
    header('Location: booking.php?HHCode='.$HHcode.'');
  }

  if (isset($_POST['book'])) {
    $img_name = $_FILES['file']['name'];
    $img_size = $_FILES['file']['size'];
    $img_tmp = $_FILES['file']['tmp_name'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    // echo ($img_ex);
    $img_ex_lc = strtolower($img_ex);

    $allow_ex = array("jpg", "jpeg", "png", "gif");

    $new_name = $poid.'.'.$img_ex_lc;
    $img_path_sa_buhay_niya = 'assets/images/'.$new_name;
    move_uploaded_file($img_tmp, $img_path_sa_buhay_niya);

    $session_date1 = $_SESSION['date1banene'];
    $session_date2 = $_SESSION['date2banene'];
    $datenow = date('m-d-Y');

    // booking
    $update_booking = mysqli_query($connect, "INSERT INTO haven_booking (
      booking_ref,
      payment,
      booking_status,
      booking_start,
      booking_end,
      booking_date,
      booking_remarks
    ) VALUES (
      '$poid',
      '$new_name',
      'Pending',
      '$session_date1',
      '$session_date2',
      '$datenow',
      'Ano meron'
    )");

    // date
    $update_date = mysqli_query($connect, "UPDATE haven_date SET book_remarks = 'Not Available' WHERE book_poid = '$poid'");

    $get_haven = mysqli_query($connect, "SELECT * FROM upti_users WHERE users_code = '$code'");
    $haven_fetch = mysqli_fetch_array($get_haven);

    $new_count = $haven_fetch['users_haven'] + 1;
    // update count 
    $update_count = mysqli_query($connect, "UPDATE upti_users SET users_haven = '$new_count' WHERE users_code = '$code'");

    unset($_SESSION['date1banene']);
    unset($_SESSION['date2banene']);
    $_SESSION['date1banene'] = '';
    $_SESSION['date2banene'] = '';

    echo '<script>alert("Booking Successfully Please check on your dashboard");window.location.href = "../system/mybooking.php";</script>';

  }

?>