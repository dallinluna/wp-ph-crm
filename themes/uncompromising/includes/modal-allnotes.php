<!-- Modal -->
<div class="modal" id="modalNotes">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">All Interactions for <?php echo $contact->firstname; ?></h4>
        <button type="button" class="btn btn-secondary btn-link float-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <?php include 'notesmore.php' ; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->