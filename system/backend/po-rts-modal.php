<div class="modal fade" id="rts<?php echo $account_fetch['ref_id']; ?>">
    <div class="modal-dialog modal-dialog-centered" style="border-radius: 0px !important;">
        <div class="modal-content rounded-0">
            <div class="modal-header">
            <h4 class="modal-title">Purchase Order Change Status</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body pt-4">
                <p>Are you sure you want to Received this PO?</p>
            </div>
            <div class="modal-footer">
                <a class="float-right btn btn-danger" style="border-radius: 0px !important;" href="backend/po-rts-process.php?id=<?php echo $account_fetch['ref_id']; ?>">Receive Items</a>
            </div>
        </div>
    </div>
</div>