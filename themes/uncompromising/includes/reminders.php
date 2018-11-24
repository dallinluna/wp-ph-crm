<?php
$reminders = $wpdb->get_results( 
	"
	SELECT *
	FROM aud_reminder
	WHERE contact_ID = $contact_ID AND ID = $ID AND reminder_status = 0
	ORDER BY date ASC
	LIMIT 0, 3
	"
);
?>
<div class="card">
	<div class="card-header">
		Reminders
		<?php if ($reminders) { ?>
		<button href="#modalAddReminder" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm float-right"><i class="fal fa-plus"></i> Add Reminder</button>
		<?php } ?>
	</div>
	<div class="card-block">
<?php
if ($reminders) {
	include 'modal-editreminder.php';
	echo
	'
	<div class="list mb-0">
	';
	foreach ( $reminders as $reminder ) {
	$reminderdate = date("M j, Y ", strtotime($reminder->date) );
	if ($reminder->date >= date("Y-m-d")) {
		$reminderColor = "success";
	} else {
		$reminderColor = "warning";
	};
		echo
		'
		<div class="item callout callout-' . $reminderColor . '">
			<div class="avatar avatar-sm border border-' . $reminderColor . '">
				<i class="text-' . $reminderColor . ' fal fa-';
					switch($reminder->reminder_type){
						case "To Do Reminder":
							echo "tasks";
							break;
						case "Thank You Note":
							echo "sticky-note";
							break;
					}
				echo
				'
				"></i>								
			</div>
			<div class="item-inner">
				<div class="input-wrapper">
					<div class="item-label">
						<h4 class="item-title">' . stripslashes($reminder->reminder_desc) . '</h4>
						<p class="item-subtitle">' . $reminder->reminder_type . '</p>
						<p class="item-desc"><strong>Due: </strong>' . $reminderdate . '</p>
					</div>
				</div>
			</div>
			<div class="dropdown item-end">
				<form name="form" class="float-left mr-2" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/completereminder.php">
					<input type="hidden" name="reminder_ID" value="' . $reminder->reminder_ID . '">
					<input type="hidden" name="contact_ID" value="' . $reminder->contact_ID . '">
					<input type="hidden" name="reminder_status" value="1">
					<button type="submit" class="btn btn-primary"><i class="fal fa-check"></i></button>
				</form>
				<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-ellipsis-v"></i>
				</button>
				<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
					<a href="#modalEditReminder" class="btn btn-link btn-primary" data-toggle="modal" data-reminder-id="' . $reminder->reminder_ID . '" data-reminder-contact-id="' . $reminder->contact_ID . '" data-reminder-date="' . $reminder->date . '" data-reminder-desc="' . $reminder->reminder_desc . '" data-reminder-type="' . $reminder->reminder_type . '"><i class="fal fa-pencil"></i> Edit</a>
					<hr class="m-0">
					<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deletereminder.php">
						<input type="hidden" name="reminder_ID" value="' . $reminder->reminder_ID . '">
						<input type="hidden" name="contact_ID" value="' . $reminder->contact_ID . '">
						<input type="hidden" name="reminder_status" value="1">
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
if (empty($reminders)) {
	echo
	'
	<div class="text-center py-4">
		<h5 class="mb-4">There are no upcoming reminders for ' . $contact->firstname . '</h5>
		<button href="#modalAddReminder" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm"><i class="fal fa-plus"></i> Add Reminder</button>
	</div>
	';
}
?>
	</div>
	<?php if ($reminders) { ?>
	<div class="card-footer">
		<button href="#modalCompletedReminders" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-link float-right">View History</button>
	</div>
	<?php } ?>
</div>