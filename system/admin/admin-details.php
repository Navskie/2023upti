<?php include 'include/header.php' ?>
<?php include 'include/navbar.php' ?>
<?php include 'include/topbar.php' ?>

<div class="page-wrapper">
<!-- Page-header start -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Homepage</h4>
        <span>Admin Dashboard</span>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">Hidden Haven Resort
            </li>
            <li class="breadcrumb-item">Hidden Products
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
                  <button type="button" class="btn btn-sm btn-primary waves-effect md-trigger" data-modal="details-1">Add Package</button>
                  <br><br>
                    <div class="dt-responsive table-responsive">
                        <table id="lang-dt" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                  <th class="text-center">#</th>
                                  <th class="text-center">Title</th>
                                  <th class="text-center">Description</th>
                                  <th class="text-center">Price</th>
                                  <th class="text-center">Code</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $booking_qry = "SELECT * FROM haven_product ORDER BY id DESC";
                                $booking = mysqli_query($connect, $booking_qry);
                                $number = 1;
                                foreach ($booking as $data) {
                              ?>
                                <tr>
                                    <td class="text-center"><?php echo $number ?></td>
                                    <td class="text-center"><?php echo $data['product_title'] ?></td>
                                    <td class="text-center"><?php echo $data['product_title'] ?></td>
                                    <td class="text-center"><?php echo $data['product_title'] ?></td>
                                    <td class="text-center"><?php echo $data['product_title'] ?></td>
                                    <td class="text-center"><?php echo $data['product_title'] ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-default waves-effect md-trigger" data-modal="modal-1<?php echo $data['id'] ?>">On Process</button>
                                        <button type="button" class="btn btn-sm btn-default waves-effect md-trigger" data-modal="modal-1<?php echo $data['id'] ?>">On Process</button>
                                    </td>
                                </tr>
                              <?php
                                include 'backend/details-edit-modal.php';
                                include 'backend/details-delete-modal.php';
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
<?php include 'backend/details-add-modal.php'; ?>
<!-- Page-body end -->
<?php include 'include/footer.php' ?>