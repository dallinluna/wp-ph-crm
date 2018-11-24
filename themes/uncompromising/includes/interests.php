<?php
$interests = $wpdb->get_results( 
	"
	SELECT contact_ID, interest_ID, interest_name, interest_url, interest_category, interest_description
	FROM aud_interests
	WHERE contact_ID = $contact_ID AND ID = $ID
	ORDER BY interest_name ASC
	"
);
?>
<div class="card">
	<div class="card-header">
		Links
		<?php if ($interests) { ?>
		<button href="#modalAddInterest" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm pull-right"><i class="fal fa-plus"></i> Add Link</button>
		<?php } ?>
	</div>
	<div class="card-block">
<?php
if ($interests) {
echo
'
<div class="list">
';
foreach ( $interests as $interest ) {
	echo
	'
	<div class="item">
		<div class="item-inner">
			<div class="input-wrapper">
				<div class="item-label">
					<a href="' . $interest->interest_url . '" class="item-title" target="_blank">' . stripslashes($interest->interest_name) . '</a>
					<p class="item-subtitle">' . stripslashes($interest->interest_description) . '</p>
				</div>
			</div>
		</div>
		<div class="dropdown item-end">
			<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-ellipsis-v"></i>
			</button>
			<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
				<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deleteinterest.php">
					<input type="hidden" name="interest_ID" value="' . $interest->interest_ID . '">
					<input type="hidden" name="contact_ID" value="' . $interest->contact_ID . '">
					<button type="submit" class="btn btn-link btn-danger"><i class="fal fa-trash"></i> Delete</button>
				</form>
			</div>
		</div>
	</div>	
	';
}
echo
'
</div>
<!-- /.list -->
';
}
if (empty($interests)) {
	echo
	'
	<div class="text-center py-4">
		<h5 class="mb-4">Add a link</h5>
		<button href="#modalAddInterest" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm"><i class="fal fa-plus"></i> Add Link</button>
	</div>
	';
}
?>
	</div>
</div>