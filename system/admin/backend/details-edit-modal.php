<!-- animation modal Dialogs start -->
<div class="md-modal md-effect-5" id="edit-1<?php echo $data['product_code'] ?>">
    <form action="backend/details-edit-process.php?id=<?php echo $data['product_code'] ?>" method="post">
    <div class="md-content">
        <h3>Update Villa Style</h3>
        <div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" required autocomplete="OFF" value="<?php echo $data['product_title'] ?>">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label>Code</label>
                  <input disabled type="text" value="<?php echo $data['product_code'] ?>" name="havencode" class="form-control" required autocomplete="OFF">
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="desc" class="form-control" required autocomplete="OFF" value="<?php echo $data['product_desc'] ?>">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="price" class="form-control" required autocomplete="OFF" value="<?php echo $data['product_price'] ?>">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="<?php echo $data['product_status'] ?>"><?php echo $data['product_status'] ?></option>
                    <option value="Active">Active</option>
                    <option value="Not Active">Not Active</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="button" class="float-left btn btn-danger waves-effect md-close">Close</button>
            <button type="submit" class="float-right btn btn-success" name="details-edit">Submit</button>
            <br>
        </div>
        </form>
    </div>
</div>