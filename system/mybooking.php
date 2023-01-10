<?php include 'include/header.php'; ?>
<?php include 'include/preloader.php'; ?>
<?php include 'include/navbar.php'; ?>
<?php include 'include/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: #f8f8f8 !important">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card rounded-0">
                <div class="card-body login-card-body text-dark">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="float-left text-info">Booking Sales</h4>
                             <!-- Order List Table Start -->
                            <table id="example1" class="table table-sm table-striped table-hover border border-info">
                                <thead>
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Reference</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Booking Date</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">When</th>
                                    <th class="text-center">Total Pax</th>
                                    <th class="text-center">Payment</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Status</th>
                                  </tr>
                                </thead>
                                <?php
                                  $mycode = $_SESSION['code'];
                    
                                  $order_sql = "SELECT * FROM haven_booking INNER JOIN haven_details ON booking_ref = details_ref INNER JOIN haven_name ON hh_code = booking_ref ORDER BY booking_date";
                                  $order_qry = mysqli_query($connect, $order_sql);
                                  $number =1;
                                  while ($order = mysqli_fetch_array($order_qry)) {
                                ?>
                                <tr>
                                  <td class="text-center"><?php echo $number; ?></td>
                                  <td class="text-center"><?php echo $order['details_ref']; ?></td>
                                  <td class="text-center"><?php echo $order['pangalan']; ?></td>
                                  <td class="text-center"><?php echo $order['booking_date']; ?></td>
                                  <td class="text-center"><?php echo $order['details_contact']; ?></td>
                                  <td class="text-center"><?php echo $order['details_time']; ?> (<?php echo $order['booking_start']; ?> - <?php echo $order['booking_end']; ?>)</td>
                                  <td class="text-center"><?php echo $order['details_pax']; ?></td>
                                  <td class="text-center"><?php echo $order['payment']; ?></td>
                                  <td class="text-center"><?php echo $order['details_amount']; ?></td>
                                  <td class="text-center"><?php echo $order['booking_status']; ?></td>
                                </tr>
                                <?php
                                    include 'backend/order-cancel-modal.php';
                                    $number++;
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>

<?php include 'include/footer.php'; ?>
<script type="text/javascript">
    <?php if (isset($_SESSION['success'])) { ?>

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr.success("<?php echo flash('success'); ?>");

    <?php } ?>

    <?php if (isset($_SESSION['order'])) { ?>

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-center-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr.success("<?php echo flash('order'); ?>");

    <?php } ?>
</script>