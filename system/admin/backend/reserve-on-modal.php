<!-- animation modal Dialogs start -->
<div class="md-modal md-effect-1" id="modal-1<?php echo $data['details_ref'] ?>">
    <div class="md-content">
        <h3>Warning</h3>
        <div>
            <ul>
                <li>
                  <b>Read:</b> Are you sure you want to change Status into On Process [<?php echo $data['details_ref'] ?>]?
                </li>
            </ul>
            <button type="button" class="float-left btn btn-danger waves-effect md-close">Close</button>
            <a href="reservation.php" class="float-right btn btn-primary">On Process</a>
            <br>
        </div>
    </div>
</div>