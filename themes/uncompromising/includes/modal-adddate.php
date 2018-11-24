<!-- Modal -->
<div class="modal" id="modalAddDate">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="adddateform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/adddate.php?view=dates" novalidate>
				<div class="modal-header">
					<h4 class="modal-title"><?php echo $contact->firstname; ?></h4>
					<button type="button" class="btn btn-secondary btn-link float-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="ID" value="<?php echo $current_user->ID ; ?>">
					<input type="hidden" name="contact_ID" value="<?php echo $contact_ID ; ?>">
					<div class="form-group">
						<label>Title*</label>
						<input class="form-control" type="text" name="date_title" required>
						<div class="invalid-feedback">Please provide a title</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Month*</label>
							<select name="date_month" class="form-control" required>
								<option value="">Month</option>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>		
							<div class="invalid-feedback">Please provide a month</div>						
						</div>
						<div class="form-group col-sm-6">
							<label>Day*</label>
							<select name="date_day" class="form-control" required>
								<option value="">Day</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
							<div class="invalid-feedback">Please provide a day</div>
						</div>
					</div>
					<div class="form-group">
						<label>Notes</label>
						<textarea class="form-control" type="text" name="date_notes" rows="5"></textarea>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Size</label>
							<select name="date_size" class="form-control">
								<option value="1">Small</option>
								<option value="2">Medium</option>
								<option value="3">Large</option>
							</select>								
						</div>
					</div>		
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add Date</button>
				</div>
			</form>	
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->