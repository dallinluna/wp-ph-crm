<?php

$completedreminders = $wpdb->get_results( 
	"
	SELECT *
	FROM aud_reminder
	WHERE contact_ID = $contact_ID AND ID = $ID AND reminder_status = 1
	ORDER BY date DESC
	"
);

if ($completedreminders) {
	echo 
	'
	<div class="list">
	';
	foreach ( $completedreminders as $completedreminder ) {
		$completedreminderdate = date("F j, Y ", strtotime($completedreminder->date) );
		echo
		'
		<div class="item">
			<div class="item-inner">
				<div class="input-wrapper">
					<div class="item-label">
						<h4 class="item-title">' . $completedreminderdate . '</h4>
						<p class="item-subtitle">' . $completedreminder->reminder_type . '</p>
						<p class="item-desc">' . $completedreminder->reminder_desc . '</p>
					</div>
				</div>
			</div>
			<div class="dropdown item-end">
				<form name="form" class="float-left mr-2" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/completereminder.php">
					<input type="hidden" name="reminder_ID" value="' . $completedreminder->reminder_ID . '">
					<input type="hidden" name="contact_ID" value="' . $completedreminder->contact_ID . '">
					<input type="hidden" name="reminder_status" value="0">
					<button type="submit" class="btn btn-primary"><i class="fal fa-plus-circle"></i></button>
				</form>
				<button class="btn btn-link dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-ellipsis-v"></i>
				</button>
				<div class="dropdown-menu text-center float-right" aria-labelledby="dropdownMenuButton">
					<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deletereminder.php">
						<input type="hidden" name="reminder_ID" value="' . $completedreminder->reminder_ID . '">
						<input type="hidden" name="contact_ID" value="' . $completedreminder->contact_ID . '">
						<input type="hidden" name="reminder_status" value="1">
						<button type="submit" class="btn btn-danger btn-link" style="margin-right: 10px;"><i class="fal fa-trash"></i> Delete</button>
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
if (empty($completedreminders)) {
	echo
	'
	<h4 class="mb-0">No completed reminders.</h4>
	';
}
?>