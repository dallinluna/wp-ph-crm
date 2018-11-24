<!-- Modal -->
<div class="modal" id="modalAddUpdate">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Interest For <?php echo $contact->firstname; ?></h4>
				<button type="button" class="btn btn-link btn-secondary pull-right" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="rss-tab" data-toggle="tab" href="#rss" role="tab" aria-controls="rss" aria-selected="true">RSS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="tab" aria-selected="false">News</a>
					</li>
				</ul>
				<div class="tab-content" id="addInterestForm">
					<div class="tab-pane fade show active" id="rss" role="tabpanel" aria-labelledby="rss-tab">
						<form name="addrssfeedform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/addupdaterss.php?" novalidate>
							<input type="hidden" name="ID" value="<?php echo $current_user->ID ; ?>">
							<input type="hidden" name="contact_ID" value="<?php echo $contact_ID ; ?>">
							<input type="hidden" name="update_type" value="rss">
							<div class="form-group">
								<label class="text-error">RSS Feed Name</label>
								<input class="form-control" type="text" name="update_name" required>
								<div class="invalid-feedback">Please provide an RSS feed name</div>
							</div>
							<div class="form-group">
								<label class="text-error">RSS Feed URL</label>
								<input class="form-control" type="text" name="update_rssurl" required>
								<div class="invalid-feedback">Please provide an RSS feed URL</div>
							</div>
							<div class="form-group">
								<label class="text-error">RSS Feed Category</label>
								<input class="form-control" type="text" name="update_category" required>
								<div class="invalid-feedback">Please provide an RSS feed category</div>
							</div>
							<div class="row margin-bottom-20">
								<div class="col-sm-6">
									<label class="text-error">Size</label>
									<select name="update_size" class="form-control">
										<option value="1">Small</option>
										<option value="2">Medium</option>
										<option value="3">Large</option>
									</select>								
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary mt-3">Add RSS Feed</button>
							</div>
						</form>		
					</div>
					<div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
						<form name="addnewsfeedform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/addupdatesearch.php?view=updates" novalidate>
							<input type="hidden" name="ID" value="<?php echo $current_user->ID ; ?>">
							<input type="hidden" name="contact_ID" value="<?php echo $contact_ID ; ?>">
							<input type="hidden" name="update_type" value="search">
							<div class="form-group">
								<label class="text-error">Google News Terms</label>
								<input class="form-control" type="text" name="update_search" required>
								<div class="invalid-feedback">Please provide the text you want searched</div>
							</div>
							<div class="form-group">
								<label class="text-error">Google News Category</label>
								<input class="form-control" type="text" name="update_category" required>
								<div class="invalid-feedback">Please provide a news category</div>
							</div>
							<div class="row margin-bottom-20">
								<div class="col-sm-6">
									<label class="text-error">Size</label>
									<select name="update_size" class="form-control">
										<option value="1">Small</option>
										<option value="2">Medium</option>
										<option value="3">Large</option>
									</select>								
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary mt-3">Add News</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link btn-primary" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->