<?php include 'include/header.php' ?>

  <!-- slide show -->

  <!-- slide show ENDDDDDDD -->

  <?php 
    $haven = mysqli_query($connect, "SELECT * FROM haven_product WHERE product_status = 'Active'");
  ?>
    <section>
        <?php foreach ($haven as $data) { ?>
        <?php
            $id = $data['id'];
        ?>
        <figure>
            <img class="img-section" src="https://i.postimg.cc/zvhYBcht/bora-bora.jpg" alt="" />
            <div class="text-sec">
                <h1><?php echo $data['product_title'] ?></h1>
                <br>
                <p>
                  <?php echo $data['product_desc'] ?>
                </p>
                <h3 class="text-center">
                  <?php echo $data['product_price'] ?>
                </h3>
                <br>
                <a class="linka" href="booking.php?HHCode=<?php echo $data['product_code'] ?>">BOOK NOW<span>&rarr;</span></a>
            </div>
        </figure>
        <?php } ?>
    </section>

    <div class="container">
      
    </div>

<?php include 'include/footer.php' ?>