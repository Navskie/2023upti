<?php
    include '../include/db.php';

    session_start();

    if (isset($_POST['booknow'])) {
        $newDate1 = $_POST['date1'];
        $date1 = date("m-d-Y", strtotime($newDate1));
        $newDate2 = $_POST['date2'];
        $date2 = date("m-d-Y", strtotime($newDate2));
        // echo $_SESSION['code'];
        if ($_SESSION['code'] == '') {
            header('location: ../login.php');
        } else {
            header('location: booking.php?date1='.$date1.'&date2='.$date2);
        }
        
    }
?>