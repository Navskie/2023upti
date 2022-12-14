<?php include 'include/header.php' ?>
<?php include 'include/navbar.php' ?>
<?php include 'include/topbar.php' ?>

<div class="page-wrapper">
<!-- Page-header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Reservation Page</h4>
        <span>Manage Pending & On Process Status</span>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">Hidden Haven Resort
            </li>
            <li class="breadcrumb-item">Reservation Page
            </li>
        </ul>
    </div>
</div>
<!-- Page-header end -->
<!-- Page-body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Language - Comma Decimal Place table start -->
            <div class="card">
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
                                        <button type="button" class="btn btn-sm btn-default waves-effect md-trigger" data-modal="modal-1<?php echo $data['details_ref'] ?>">On Process</button>
                                        <button class="btn-sm btn btn-danger">Cancel</button>
                                      <?php
                                        } elseif ($status == 'On Process') {
                                      ?>
                                        <button type="button" class="btn btn-default btn-outline-default waves-effect md-trigger" data-modal="modal-1">Reserved<?php echo $data['details_ref'] ?></button>
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
</div>
<!-- Page-body end -->
<?php include 'include/footer.php' ?>