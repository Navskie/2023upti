<?php include 'include/header.php'; ?>
<?php if ($_SESSION['role'] == 'UPTIACCOUNTING') { ?>
<?php include 'include/preloader.php'; ?>
<?php include 'include/stockist-navbar.php'; ?>
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
                        <span class="float-left text-primary"><b>Stockist Purchase Orders List</b></span> 
                        </div>
                        
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                             <!-- Order List Table Start -->
                            <table id="example1" class="table table-sm table-striped table-hover border border-info">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Reference</th>
                                        <th class="text-center">Tracking</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Reseller</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Date Triggered</th>
                                        <th class="text-center">Optional</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Payment</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                                    $account = "SELECT * FROM stockist_request ORDER BY id DESC ";
                                    $account_qry = mysqli_query($connect, $account);
                                    $number = 1;
                                    while ($account_fetch = mysqli_fetch_array($account_qry)) {
                                        $amount = $account_fetch['req_amount'];
                                        $status = $account_fetch['req_status'];
                                        $state = $account_fetch['req_state'];
                                        $file = $account_fetch['req_img'];
                                ?>
                                  <tr>
                                    <td class="text-center"><?php echo $number; ?></td>
                                    <td class="text-center"><a href="reference-info.php?poid=<?php echo $account_fetch['req_reference']; ?>" target="_blank" class="btn btn-sm btn-dark rounded-0"><?php echo $account_fetch['req_reference']; ?></a></td>
                                    <td class="text-center"><a href="<?php echo $account_fetch['req_link']; ?>" target="_blank"><span class="badge badge-warning"><?php echo $account_fetch['req_tracking']; ?></span></a></td>
                                    <td class="text-center"><?php echo $account_fetch['ref_date'] ?></td>
                                    <td class="text-center"><?php echo $account_fetch['req_name'] ?></td>
                                    <td class="text-center"><?php echo $account_fetch['req_country']; ?></td>
                                    <td class="text-center"><?php echo number_format($amount, '2'); ?></td>
                                    <td class="text-center"><?php echo $account_fetch['ref_checked']; ?></td>
                                    <td class="text-center">
                                        <?php if($status == 'In Transit') { ?>
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#hold<?php echo $account_fetch['req_reference']; ?>"><i class="fas fa-circle"></i> Hold</button>
                                        <?php } else { ?>
                                            <span class="badge badge-warning"><?php echo 'Not Available'; ?></span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($status == 'Pending') { ?>
                                            <span class="badge badge-secondary"><?php echo $status; ?></span>
                                        <?php } elseif ($status == 'On Process') { ?>
                                            <span class="badge badge-primary"><?php echo $status; ?></span>
                                        <?php } elseif ($status == 'In Transit') { ?>
                                            <span class="badge badge-info"><?php echo $status; ?></span>
                                        <?php } elseif ($status == 'Received') { ?>
                                            <span class="badge badge-success"><?php echo $status; ?></span>
                                        <?php } elseif ($status == 'Canceled') { ?>
                                            <span class="badge badge-danger"><?php echo $status; ?></span>
                                        <?php } elseif ($status == 'To Pack') { ?>
                                            <span class="badge badge-info"><?php echo $status; ?></span>
                                        <?php } elseif ($status == 'CND Transfer') { ?>
                                            <span class="badge badge-info"><?php echo 'Transfer'; ?></span>
                                        <?php } elseif ($status == 'Hold') { ?>
                                            <span class="badge badge-info"><?php echo 'HOLD'; ?></span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($file != '') { ?>
                                            <button class="btn btn-sm btn-dark" data-toggle="modal" data-target="#view<?php echo $account_fetch['req_reference']; ?>"><i class="fas fa-image"></i> Receipt</button>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Not Paid</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                            if ($account_fetch['req_from'] == 'PHILIPPINES') {
                                                if ($status == 'Pending') { 
                                        ?>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#onpacking<?php echo $account_fetch['req_reference'] ?>">To Pack</button>
                                                <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="modal" data-target="#cancel<?php echo $account_fetch['id'] ?>">Cancel</button>
                                            </div>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Not Available</span>
                                        <?php
                                              }
                                            } else {
                                                if ($status == 'Pending' && $state == 'ALL') { 
                                        ?>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#onpacking<?php echo $account_fetch['req_reference'] ?>">To Pack</button>
                                                <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="modal" data-target="#cancel<?php echo $account_fetch['id'] ?>">Cancel</button>
                                            </div>
                                            <?php
                                                } elseif ($status == 'Pending' && $state != 'ALL') { 
                                            ?>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit" class="btn btn-secondary btn-sm rounded-0" data-toggle="modal" data-target="#onpacking<?php echo $account_fetch['req_reference'] ?>">Transfer</button>
                                                <button type="submit" class="btn btn-danger btn-sm rounded-0" data-toggle="modal" data-target="#cancel<?php echo $account_fetch['id'] ?>">Cancel</button>
                                            </div>
                                            <?php
                                                } elseif ($status == 'To Pack') { 
                                            ?>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#onprocess<?php echo $account_fetch['req_reference'] ?>">On Process</button>
                                            </div>
                                            <?php
                                                } elseif ($status == 'On Process') { 
                                            ?>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#intransit<?php echo $account_fetch['req_reference'] ?>">In Transit</button>
                                            </div>
                                            <?php
                                                } else { 
                                            ?>
                                            <span class="badge badge-danger">Not Available</span>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                    
                                  </tr>
                                <?php
                                    include 'backend/po-onpacking-modal.php';
                                    include 'backend/po-cancel-modal.php';
                                    include 'backend/po-in-transit-modal.php';
                                    include 'backend/po-on-process-modal.php';
                                    include 'backend/po-receipt-modal.php';
                                    include 'backend/po-hold-modal.php';
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

    toastr.success("<?php echo flash('success'); ?>");

    <?php } ?>
</script>
<?php } else { echo "<script>window.location='index.php'</script>"; } ?>