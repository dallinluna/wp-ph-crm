<?php
$userReminderQuery = 
	"
	SELECT *
	FROM aud_reminder
	INNER JOIN aud_contacts
	ON aud_reminder.contact_ID=aud_contacts.contact_ID
	WHERE aud_reminder.ID = $ID AND aud_reminder.reminder_status = 0
	ORDER BY date ASC
	LIMIT 0, 10
	";
$userReminderCountQuery = 
	"
	SELECT COUNT(*)
	FROM aud_reminder
	INNER JOIN aud_contacts
	ON aud_reminder.contact_ID=aud_contacts.contact_ID
	WHERE aud_reminder.ID = $ID AND aud_reminder.reminder_status = 0
	ORDER BY date ASC
	LIMIT 0, 10
	";
$userReminders = $wpdb->get_results($userReminderQuery);
$num_userReminders = $wpdb->get_var($userReminderCountQuery);
if ($userReminders) {
include 'modal-editreminder.php';
echo
'
<div class="card">
	<div class="card-header">
		Upcoming Reminders
	</div>
	<div class="card-block-list">
<div class="list">
';
	foreach ( $userReminders as $userReminder ) {
	$userReminderDate = date("M j, Y ", strtotime($userReminder->date) );
	if ($userReminder->date >= date("Y-m-d")) {
		$reminderColor = "success";
	} else {
		$reminderColor = "warning";
	};

	echo
	'
	<div class="item callout callout-' . $reminderColor . '">
		<div class="item-inner">
			<div class="input-wrapper">
				<div class="item-label">
					<div class="row align-items-center">
						<div class="col-lg-7">
							<a class="item-title" href="' . home_url( '/' ) . 'contact/?contact_ID=' . $userReminder->contact_ID  . '&view=next">' . $userReminder->firstname  . ' ' . $userReminder->lastname . '</a>
							<p class="item-subtitle">
							';
						
							switch ($userReminder->reminder_type) {
								case "To Do Reminder":
									echo "<strong>Reminder:</strong> ";
									break;
								case "Thank You Note":
									echo "<strong>Send Thank You:</strong> ";
									break;
							}
						
							echo 
							'			
							' . stripslashes($userReminder->reminder_desc) . '
							</p>
						</div>
						<div class="col-lg-2 offset-lg-2 text-lg-right mt-3 mt-lg-0">
							<h5 class="font-bold my-0">' . $userReminderDate . '</h5>
							<p class="my-0">Date</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dropdown item-end">
			<form name="form" class="float-left mr-2" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/completereminder.php">
				<input type="hidden" name="reminder_ID" value="' . $userReminder->reminder_ID . '">
				<input type="hidden" name="contact_ID" value="' . $userReminder->contact_ID . '">
				<input type="hidden" name="reminder_status" value="1">
				<button type="submit" class="btn btn-primary"><i class="fal fa-check"></i></button>
			</form>
			<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-ellipsis-v"></i>
			</button>
			<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
				<a href="#modalEditReminder" class="btn btn-link btn-primary" data-toggle="modal" data-reminder-id="' . $userReminder->reminder_ID . '" data-reminder-contact-id="' . $userReminder->contact_ID . '" data-reminder-date="' . $userReminder->date . '" data-reminder-desc="' . $userReminder->reminder_desc . '" data-reminder-type="' . $userReminder->reminder_type . '"><i class="fal fa-pencil"></i> Edit</a>
				<hr class="m-0">
				<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deletereminder.php">
					<input type="hidden" name="reminder_ID" value="' . $userReminder->reminder_ID . '">
					<input type="hidden" name="contact_ID" value="' . $userReminder->contact_ID . '">
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
</div>
<!-- /.card-block-list -->
</div>
<!-- /.card -->
';
} else {
echo
'
<div class="card">
	<div class="card-header">
		Upcoming Reminders
	</div>
	<div class="card-block">
		<div class="text-center py-4">
			<h5>No Upcoming Reminders</h5>
			<a href="' . home_url( '/my-contacts' ) . '" class="btn btn-primary btn-sm"><i class="fal fa-users"></i> View Contacts</a>
		</div>
	</div>
</div>
';
}
?>