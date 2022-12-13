<?php include 'include/header.php' ?>

<form action="proceed-booking.php" class="booknow" method="POST">
    <div class="box">
        <img src="haven.jpg" alt="" class="haven same">
    </div>
    <div class="box">
      <input type="date" name="date1" id="" class="same date_format">
    </div>
    <div class="box">
      <input type="date" name="date2" id="" class="same date_format">
    </div>
    <div class="box">
        <button class="form-control same button" name="booknow">BOOK NOW</button>
    </div>
</form>

<?php include 'include/footer.php' ?>