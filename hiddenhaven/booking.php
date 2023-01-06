<?php include 'include/header.php' ?>
<?php 
  $HHcode = $_GET['HHCode'];

  $product = mysqli_query($connect, "SELECT * FROM haven_product WHERE product_code = '$HHcode'");
  $product_fetch = mysqli_fetch_array($product);
?>
  <br>
  <div class="row">
    <div class="col-4">
      <img class="img-section" src="https://i.postimg.cc/zvhYBcht/bora-bora.jpg" alt="" /> <br><br>
      <h2 class="text-center"><?php echo $product_fetch['product_title'] ?></h2> <br>
      <h1 class="float-right font-weight-bold"><?php echo number_format($product_fetch['product_price'], '2') ?></h1>
    </div>
    <div class="col-8">
      <?php
        if (isset($_POST['validate'])) {
          $newDate1 = $_POST['date1'];
          $date1 = date("m-d-Y", strtotime($newDate1));
          $newDate2 = $_POST['date2'];
          $date2 = date("d-m-Y", strtotime($newDate2));
          $day_count = 0;
          $correct = 0;

          while (0==0) {
            $day_count++;
            $date1 = date('d-m-Y', strtotime($date1 ."+1 days"));
            $get_date = date('m-d-Y', strtotime($date1));

            $date_correct = "SELECT * FROM haven_date WHERE book_ref = '$HHcode' AND book_remarks = 'Available' AND book_date = '$get_date'";
            $date_sql = mysqli_query($connect, $date_correct);

            // echo mysqli_num_rows($date_correct);

            if (mysqli_num_rows($date_sql) > 0) {
              $correct++;
            }
    
            // echo '<br>';
            if ($date1 === $date2) {
              break;
            }
          }

          echo $correct;
        }
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

    </div>
  </div>
<?php include 'include/footer.php' ?>