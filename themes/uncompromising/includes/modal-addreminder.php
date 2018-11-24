<!-- Modal -->
<div class="modal" id="modalAddReminder">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="addreminderform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/addreminder.php" novalidate>
				<div class="modal-header">
					<h4 class="modal-title">Create a Reminder For <?php echo $contact->firstname; ?></h4>
					<button type="button" class="btn btn-secondary btn-link pull-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
				</div>
				<div class="modal-body">
					<?php $today = date("Y-m-d"); ?>
					<input type="hidden" name="ID" value="<?php echo $current_user->ID ; ?>">
					<input type="hidden" name="contact_ID" value="<?php echo $contact_ID ; ?>">
					<div class="row">
						<div class="form-group col-lg-6">
							<input type="date" name="date" value="<?php echo $today; ?>" class="form-control" required>
							<div class="invalid-feedback">Please provide a date</div>
						</div>
						<div class="form-group col-lg-6">
							<select name="reminder_type" class="form-control" required>
								<option>To Do Reminder</option>
								<option>Thank You Note</option>
							</select>
							<div class="invalid-feedback">Please provide a reminder type</div>
						</div>
					</div>
					<div class="form-group margin-top-20">
						<label>Description</label>
						<textarea class="form-control" rows="2" name="reminder_desc" required></textarea>
						<div class="invalid-feedback">Please provide a description</div>
					</div>
        </div>
        <div class="modal-footer">
					<button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Cancel</button>
		  		<button type="submit" class="btn btn-primary">Add Reminder</button>
          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->