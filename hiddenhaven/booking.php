<?php
    include '../include/db.php';

    session_start();

    $date1 = $_GET['date1'];
    // echo '<br>';
    // echo $date1 = date('Y-m-d', strtotime($date_dummy1));
    // echo '<br>';
    $date2 = $_GET['date2'];
    // echo '<br>';
    // $date2 = strtotime($date_dummy2);

    $day_count = 0;

    while (0==0) {
      $day_count++;
      echo $date1new = date('Y-m-d', strtotime($date1 ."+1 days"));
    //   echo ' - ';
    //   echo $date2;
      echo '<br>';
      if ($day_count == 5) {
        break;
      }
    }

    $haven = mysqli_query($connect, "SELECT * FROM haven_package");

    $login_code = $_SESSION['code'];

    $get_user_info = mysqli_query($connect, "SELECT * FROM upti_users WHERE users_code = '$login_code'");
    $get_user_info_fetch = mysqli_fetch_array($get_user_info);

    $myname = $get_user_info_fetch['users_name'];

    // while(0 == 0) {
    //     $days++;
    //     echo $today_test = date('Y-m-d', strtotime($date1."+1 days"));
    //     if($date1 == $date2) {
    //         break;
    //     }
    // }
?>

<?php include 'include/header.php' ?>
    <br>
    <h2>Welcome to Villas Resort, <b><?php echo $myname ?></b></h2>
    <br><br>    
    <h3 class="float-right">Date From <b><?php echo $date1 ?></b> To <b><?php echo $date2 ?></b></h3>
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