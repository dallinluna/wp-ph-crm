<!-- Modal -->
<div class="modal" id="modaladdNote">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="interactionForm" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/addnote.php" novalidate>
				<div class="modal-header">
					<h4 class="modal-title">Add Note for <?php echo $contact->firstname; ?></h4>
					<button type="button" class="btn btn-secondary btn-link float-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
				</div>
				<div class="modal-body">
					<?php $today = date("Y-m-d"); ?>
					<input type="hidden" name="ID" value="<?php echo $current_user->ID ; ?>">
					<input type="hidden" name="contact_ID" value="<?php echo $contact_ID ; ?>">
					<div class="row">
						<div class="col-lg-6">
							<input type="date" name="note_insert" class="form-control" placeholder="date" value="<?php echo $today ; ?>" required>
							<div class="invalid-feedback">Please provide a date</div>
						</div>
						<div class="col-lg-6">
							<select name="interaction_type" class="form-control" required>
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
							<textarea class="form-control" name="note_text" placeholder="Interaction Notes..." required></textarea>
							<div class="invalid-feedback">Please provide a note</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add Note</button></form>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->