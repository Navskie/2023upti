<?php require_once 'include/header.php' ?>
<?php require_once 'include/navbar.php' ?>
<?php require_once 'include/topbar.php' ?>
<div class="pcoded-wrapper">
  <div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
          <div class="page-wrapper">
            <!-- Page header start -->
            <div class="page-header m-t-10">
              <div class="page-header-title">
                <h4>Managed Reservation</h4>
              </div>
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="index.php">
                      <i class="icofont icofont-home"></i>
                    </a>
                  </li>
                  <li class="breadcrumb-item"><a href="reservation.php">Reservation</a>
                </ul>
              </div>
            </div>
            <!-- Page header end -->

            <!-- Page body start -->
            <div class="page-body">
              <!-- Language - Comma Decimal Place table start -->
              <div class="card">
                <div class="card-header">
                    <h5>Reservation List</h5>
                    <!-- <span>A dot (.) is used to mark the decimal place in Javascript, however, many parts of the world use a comma (,) and other characters such as the Unicode decimal separator (⎖) or a dash (-) are often used to show the decimal place in a displayed number.</span> -->
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="lang-dt" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Book Reference</th>
                                    <th>Book Date</th>
                                    <th>Reservation Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $booking_qry = "SELECT * FROM haven_details INNER JOIN haven_booking ON details_ref = booking_ref ORDER BY booking_date DESC";
                                $booking = mysqli_query($connect, $booking_qry);
                                $number = 1;
                                foreach ($booking as $data) {
                              ?>
                                <tr>
                                    <td><?php echo $number ?></td>
                                    <td><?php echo $data['details_ref'] ?></td>
                                    <td><?php echo $data['booking_date'] ?></td>
                                    <td><?php echo $data['booking_start'] ?> - <?php echo $data['booking_end'] ?></td>
                                    <td><?php echo $data['details_desc'] ?></td>
                                    <td><?php echo $data['details_amount'] ?></td>
                                    <td><?php echo $data['booking_status'] ?></td>
                                    <td class="text-center">
                                      <?php
                                        $status = $data['booking_status'];

                                        if ($status == 'Pending') {
                                      ?>
                                        <button class="btn-sm btn btn-info" data-modal="modal-2">On Process</button>
                                        <button class="btn-sm btn btn-danger">Cancel</button>
                                      <?php
                                        } elseif ($status == 'On Process') {
                                      ?>
                                        <button type="button" class="btn-sm btn btn-success">Reserved</button>
                                      <?php
                                        }
                                      ?>
                                    </td>
                                </tr>
                              <?php
                                include 'backend/reserve-on-modal.php';
                                $number++;
                                }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
              <!-- Language - Comma Decimal Place table end -->
            </div>
          </div>
          <!-- Page body end -->
        </div>
      </div>
      <!-- Main-body end -->
      <div id="styleSelector">
      </div>
  </div>
</div>
<?php require_once 'include/footer.php' ?>