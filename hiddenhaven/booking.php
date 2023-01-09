<?php include 'include/header.php' ?>
<?php 
  session_start();

  $year = date('Y');
  $month = date('m'); 
  $HHcode = $_GET['HHCode'];

  $product = mysqli_query($connect, "SELECT * FROM haven_product WHERE product_code = '$HHcode'");
  $product_fetch = mysqli_fetch_array($product);
?>
  <br>
  <div class="row">
    <div class="col-4" style="border-right: 1px solid #333">
      <img class="img-section" src="https://i.postimg.cc/zvhYBcht/bora-bora.jpg" alt="" /> <br><br>
      <h2 class="text-center"><?php echo $product_fetch['product_title'] ?></h2> <br>
      <h1 class="float-right font-weight-bold"><?php echo number_format($product_fetch['product_price'], '2') ?></h1>
    </div>
    <div class="col-8">
      <?php
        $myCode = $_SESSION['code'];
        $myID = $_SESSION['uid'];

        $get_ID = mysqli_query($connect, "SELECT * FROM upti_users WHERE users_code = '$myCode'");
        $get_ID_fetch = mysqli_fetch_array($get_ID);

        $count = $get_ID_fetch['users_haven'];

        $poid = 'HH'.$year.$month.$myID.$count;

        $text1 = date_create('19-01-2023');
        $text2 = date_create('28-02-2023');

        $sum = date_diff($text1, $text2);

        $result = $sum->format("%a");

        if (isset($_POST['validate'])) {
          $newDate1 = $_POST['date1'];
          $date1 = date("d-m-Y", strtotime($newDate1));
          $date4 = date("m-d-Y", strtotime($newDate1));
          
          $newDate2 = $_POST['date2'];
          $date2 = date("d-m-Y", strtotime($newDate2));

          $text1 = date_create($date1);
          $text2 = date_create($date2);

          $sum = date_diff($text1, $text2);

          $result = $sum->format("%a");
          $ok = 0;
          $nessy = 0;

          while ($ok != $result) {
            // echo 'one';
            // echo '<br>';
            if ($ok == 0) {
              // echo $date4;
              // echo '<br>';

              $validation_1 = mysqli_query($connect, "SELECT * FROM haven_date WHERE book_remarks = 'Not Available' AND book_ref = '$HHcode' AND book_date = '$date4'");

              if (mysqli_num_rows($validation_1) > 0) {
                $nessy = $nessy + 1;
              } else {
                // echo 'blee';
                $insert_into = mysqli_query($connect, "INSERT INTO haven_date (book_poid, book_date, book_ref) VALUES ('$poid', '$date4', '$HHcode')");
              }

            }

            $date1 = date('d-m-Y', strtotime($date1 ."+1 days"));
            $get_date = date('m-d-Y', strtotime($date1));

            $validation_2 = mysqli_query($connect, "SELECT * FROM haven_date WHERE book_remarks = 'Not Available' AND book_ref = '$HHcode' AND book_date = '$get_date'");

            if (mysqli_num_rows($validation_2) > 0) {
              $nessy = $nessy + 1;
            } else {
              // echo 'blee';
              $insert_into = mysqli_query($connect, "INSERT INTO haven_date (book_poid, book_date, book_ref) VALUES ('$poid', '$get_date', '$HHcode')");
            }
            // echo '<br>';
            $ok++;
          }

          // echo $nessy;

          if ($nessy > 0) {
            $_SESSION['date1banene'] = '';
            $_SESSION['date2banene'] = '';

            // echo 'ble';
            ?>
            <script>alert('Date from <?php echo $date4. ' to ' .$get_date ?> is not available');window.location.href = 'booking.php?HHCode=<?php echo $HHcode ?>'</script>
            <?php
          } else {
            $_SESSION['date1banene'] = $date4;
            $_SESSION['date2banene'] = $get_date;
          }
        }
      ?>
      <?php
        if ($_SESSION['date1banene'] == '' && $_SESSION['date2banene'] == '') {
      ?>
        <form action="" method="post">
          <div class="row">
            <div class="col-12">
              <h2 class="text-center">Check Available Date</h2>
            </div>
            <div class="col-12"><hr></div>
            <div class="col-4">
              <div class="form-group">
                <h2>Date From</h2>
                <input type="date" name="date1" id="" class="form-control" style="padding: 10px 14px; font-size: 12px">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <h2>Date To</h2>
                <input type="date" name="date2" id="" class="form-control" style="padding: 10px 14px; font-size: 12px">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <h2 style="color: #fff">Action</h2>
                <button class="btn btn-success form-control" name="validate" style="padding: 10px 14px; font-size: 12px">Check Date</button>
              </div>
            </div>
          </div>
        </form>
      <?php
        } else {
          $new_date_booking1 = $_SESSION['date1banene'];
          $new_date_booking2 = $_SESSION['date2banene'];
          // unset($_SESSION['BookDate']);
          // unset($_SESSION['BookDate2']);
      ?>
      <div class="row">
        <div class="col-12">
          <h2 class="text-center">Booking Date</h2>
        </div>
        <div class="col-12"><hr></div>
        <div class="col-4">
          <div class="form-group">
            <h3 class="text-center">DATE FROM</h2>
            <h1 class="text-center"><?php echo $new_date_booking1 ?></h1>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <h3 class="text-center">DATE TO</h2>
            <h1 class="text-center"><?php echo $new_date_booking2 ?></h1>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <h2 style="color: #fff">Action</h2>
            <a href="booking-cancel.php?id=<?php echo $poid ?>&&HHcode=<?php echo $HHcode ?>" class="btn btn-danger form-control" name="validate" style="padding: 10px 14px; font-size: 12px">Clear</a>
          </div>
        </div>
      </div>
      <hr>
      <form action="booking-process.php?HHcodes=<?php echo $HHcode ?>&&poid=<?php echo $poid ?>" method="post">
        <h2>INFORMATION SHEET</h2>
        <br>
        <div class="row">
          <div class="col-6">
            <label for="" style="font-size: 15px">Time Slot</label>
            <input type="time" name="timeslot" class="form-control" style="border: 1px solid #000; border-radius: 0; padding: 12px 15px; font-size: 12px" autocomplete="OFF" required>
          </div>
          <div class="col-6">
            <label for="" style="font-size: 15px">Total Pax</label>
            <input type="text" name="totalpax" class="form-control" style="border: 1px solid #000; border-radius: 0; padding: 12px 15px; font-size: 12px" autocomplete="OFF" required>
          </div>
          <div class="col-6">
            <br>
            <label for="" style="font-size: 15px">Full Name</label>
            <input type="text" name="fname1" class="form-control" style="border: 1px solid #000; border-radius: 0; padding: 12px 15px; font-size: 12px" autocomplete="OFF" required>
          </div>
          <div class="col-6">
            <br>
            <label for="" style="font-size: 15px">Full Name</label>
            <input type="text" name="fname1" class="form-control" style="border: 1px solid #000; border-radius: 0; padding: 12px 15px; font-size: 12px" autocomplete="OFF" required>
          </div>
          <div class="col-12">
            <div class="form-group">
              <h2 style="color: #fff">Action</h2>
              <button class="btn btn-success form-control" name="validate" style="padding: 10px 14px; font-size: 12px">BOOK NOW</button>
            </div>
          </div>
        </div>
        <br>
      </form>
      <?php
        }
      ?>
    </div>
  </div>
<?php include 'include/footer.php' ?>