<?php 
  // include './database/dbconn.php';

  if (isset($_POST['details-add'])) {
    $title = $_POST['title'];
    // $code = $_POST['havencode'];
    $code = 'HH5068823';
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $count = mysqli_query($connect, "SELECT COUNT(*) AS counts FROM haven_product");
    $count_fetch = mysqli_fetch_array($count);
    echo $counts = $count_fetch['counts'];

  }
?>
<!-- animation modal Dialogs start -->
<div class="md-modal md-effect-5" id="details-1">
    <form action="admin-details.php" method="post">
    <div class="md-content">
        <h3>Add Haven Package</h3>
        <div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label>Code</label>
                  <input disabled type="text" name="havencode" class="form-control">
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="desc" class="form-control">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="price" class="form-control">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Not Active">Not Active</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="button" class="float-left btn btn-danger waves-effect md-close">Close</button>
            <button type="submit" class="float-right btn btn-success" name="details-add">Submit</button>
            <br>
        </div>
        </form>
    </div>
</div>