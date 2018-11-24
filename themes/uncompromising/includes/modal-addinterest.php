<!-- Modal -->
<div class="modal" id="modalAddInterest">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="addinterestform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/addinterest.php" novalidate>
				<div class="modal-header">
					<h4 class="modal-title">Create Link For <?php echo $contact->firstname; ?></h4>
					<button type="button" class="btn btn-secondary btn-link pull-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="ID" value="<?php echo $current_user->ID ; ?>">
					<input type="hidden" name="contact_ID" value="<?php echo $contact_ID ; ?>">
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="interest_name" required>
						<div class="invalid-feedback">Please provide a name</div>
					</div>
					<div class="form-group">
						<label>URL</label>
						<input class="form-control" type="text" name="interest_url" required>
						<div class="invalid-feedback">Please provide a url</div>
					</div>
					<div class="form-group">
						<label>Category</label>
						<input class="form-control" type="text" name="interest_category" required>
						<div class="invalid-feedback">Please provide a category</div>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" rows="2" name="interest_description"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add Link</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->