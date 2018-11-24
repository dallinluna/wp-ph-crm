<!-- Modal -->
<div class="modal" id="modalAddContactInfo">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Contact Info For <?php echo $contact->firstname; ?></h4>
				<button type="button" class="btn btn-secondary btn-link pull-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="contact-info-tab" data-toggle="tab" href="#contact-info" role="tab" aria-controls="home" aria-selected="true">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="profile" aria-selected="false">Address</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="contact-info" role="tabpanel" aria-labelledby="home-tab">
						<form name="contactinfoform" class="needs-validation" method="post" action="<?php echo home_url( '/' )?>wp-content/themes/uncompromising/db/addcontactinfo.php" novalidate>
							<input type="hidden" name="ID" value="<?php echo $current_user->ID ; ?>">
							<input type="hidden" name="contact_ID" value="<?php echo $contact_ID ; ?>">
							<div class="row margin-bottom-20">
								<div class="col-sm-6">
										<label class="text-error">Contact Type</label>
										<select name="contactinfo_type" class="form-control">
											<option value='H'>Home Phone</option>
											<option value='M'>Mobile Phone</option>
											<option value='W'>Work Phone</option>
											<option value='E'>Email</option>
										</select>		
										<div class="invalid-feedback">Please provide a contact type</div>						
								</div>
							</div>
							<div class="form-group mt-3">
								<label class="text-error">Phone / Email</label>
								<input class="form-control" type="text" name="contactinfo_data" required>
								<div class="invalid-feedback">Please provide a phone # or email address</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Add Contact Info</button>
							</div>
						</form>	
					</div>
					<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="profile-tab">
						<form name="addnewsfeedform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/addaddress.php" novalidate>
							<input type="hidden" name="ID" value="<?php echo $current_user->ID ; ?>">
							<input type="hidden" name="contact_ID" value="<?php echo $contact_ID ; ?>">
							<div class="row">
								<div class="col-sm-8">
									<div class="form-group">
										<label class="text-error">Address 1</label>
										<input class="form-control" type="text" name="address_1" required>
										<div class="invalid-feedback">Please provide an address</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="text-error">Address 2</label>
										<input class="form-control" type="text" name="address_2">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="text-error">City</label>
										<input class="form-control" type="text" name="address_city" required>
										<div class="invalid-feedback">Please provide a city</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="text-error">State</label>
										<input class="form-control" type="text" name="address_state" required>
										<div class="invalid-feedback">Please provide a state</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="text-error">Zip</label>
										<input class="form-control" type="text" name="address_zip" required>
										<div class="invalid-feedback">Please provide a zip</div>
									</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Add Address</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->