<?php
    include '../include/db.php';

    session_start();

    if (isset($_POST['booknow'])) {
        $newDate1 = $_POST['date1'];
        $date1 = date("m-d-Y", strtotime($newDate1));
        $newDate2 = $_POST['date2'];
        $date2 = date("d-m-Y", strtotime($newDate2));

        $day_count = 0;

        while (0==0) {
          $day_count++;
          $date1 = date('d-m-Y', strtotime($date1 ."+1 days"));
          echo $get_date = date('m-d-Y', strtotime($date1));
          // echo '<br>';
          if ($date1 === $date2) {
            break;
          }
        }

        // // echo $_SESSION['code'];
        // if ($_SESSION['code'] == '') {
        //     header('location: ../login.php');
        // } else {
        //     header('location: booking.php?date1='.$date1.'&date2='.$date2);
        // }
        
    }
?>