<?php
    include '../include/db.php';

    session_start();

    if (isset($_POST['booknow'])) {
      $newDate1 = $_POST['date1'];
      $date1 = date("m-d-Y", strtotime($newDate1));
      $newDate2 = $_POST['date2'];
      $date2 = date("d-m-Y", strtotime($newDate2));

      $day_count = 0;

      $haven = mysqli_query($connect, "SELECT * FROM haven_package");

      $login_code = $_SESSION['code'];
  
      $get_user_info = mysqli_query($connect, "SELECT * FROM upti_users WHERE users_code = '$login_code'");
      $get_user_info_fetch = mysqli_fetch_array($get_user_info);
  
      $myname = $get_user_info_fetch['users_name'];

      while (0==0) {
        $day_count++;
        $date1 = date('d-m-Y', strtotime($date1 ."+1 days"));
        $get_date = date('m-d-Y', strtotime($date1));
        // echo '<br>';
        if ($date1 === $date2) {
          break;
        }
      }        
?>
<?php include 'include/header.php' ?>
    <br>
    <h2>Welcome to Villas Resort, <b><?php echo $myname ?></b></h2>
    <br><br>    
    <h3 class="float-right">Date From <b><?php echo date('m-d-Y', strtotime($newDate1)) ?></b> To <b><?php echo date('m-d-Y', strtotime($newDate2)) ?></b></h3>
    <br><br><br>
    <section>
        <?php foreach ($haven as $data) { ?>
        <?php
            $id = $data['id'];
        ?>
        <figure>
            <img class="img-section" src="https://i.postimg.cc/zvhYBcht/bora-bora.jpg" alt="" />
            <div class="text-sec">
                <h1>Central Park</h1>
                <br>
                <!-- <p>
                    Central Park is an urban park in New York City located between the
                    Upper West and Upper East Sides of Manhattan. It is the
                    fifth-largest park in the cit
                </p> -->
                <a class="linka" href="booking-details.php?id=<?php echo $id ?>&&date1=<?php echo $date1 ?>&&date2=<?php echo $date2 ?>">BOOK NOW<span>&rarr;</span></a>
            </div>
        </figure>
        <?php } ?>
    </section>

    <div class="container">

    </div>
<?php include 'include/footer.php' ?>
<?php } ?>