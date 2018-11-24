<!-- Modal -->
<div class="modal" id="modalEditNote">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="editassociationform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/editnote.php" novalidate>
				<div class="modal-header">
					<h4 class="modal-title">Edit Note</h4>
					<button type="button" class="btn btn-secondary btn-link pull-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
				</div>
				<div class="modal-body">
					<input type="hidden" class="form-control" id="notes-id" name="notes_ID" val="">
					<div class="row">
						<div class="col-lg-6">
							<input type="date" name="note_insert" id="note-insert" class="form-control" placeholder="date" required>
							<div class="invalid-feedback">Please provide a date</div>
						</div>
						<div class="col-lg-6">
							<select name="interaction_type" id="note-interaction-type" class="form-control" required>
								<option>Generic Note</option>
								<option>Social Network</option>
								<option>Email</option>
								<option>Text IM</option>
								<option>Call</option>
								<option>Video Chat</option>
								<option>In Person</option>
							</select>
							<div class="invalid-feedback">Please add an interaction type</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<textarea class="form-control" id="note-text" name="note_text" placeholder="Interaction Notes..." required></textarea>
							<div class="invalid-feedback">Please provide a note</div>
						</div>
					</div>	
        </div>
        <div class="modal-footer">
					<button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Cancel</button>
		  		<button type="submit" class="btn btn-primary">Update Association</button>
          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->