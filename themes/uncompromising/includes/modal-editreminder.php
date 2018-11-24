<!-- Modal -->
<div class="modal" id="modalEditReminder">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="editreminderform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/editreminder.php" novalidate>
				<div class="modal-header">
					<h4 class="modal-title">Edit Reminder</h4>
					<button type="button" class="btn btn-secondary btn-link pull-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
				</div>
				<div class="modal-body">
					<input type="hidden" class="form-control" id="reminder-id" name="reminder_ID" val="">
					<div class="row">
						<div class="form-group col-lg-6">
							<input type="date" id="reminder-date" name="date" class="form-control" required>
							<div class="invalid-feedback">Please provide a date</div>
						</div>
						<div class="form-group col-lg-6">
							<select name="reminder_type" id="reminder-type" class="form-control" required>
								<option>To Do Reminder</option>
								<option>Thank You Note</option>
							</select>
							<div class="invalid-feedback">Please provide a reminder type</div>
						</div>
					</div>
					<div class="form-group margin-top-20">
						<label>Description</label>
						<textarea class="form-control" id="reminder-desc" rows="2" name="reminder_desc" required></textarea>
						<div class="invalid-feedback">Please provide a description</div>
					</div>
        </div>
        <div class="modal-footer">
					<button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Cancel</button>
		  		<button type="submit" class="btn btn-primary">Update Reminder</button>
          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->