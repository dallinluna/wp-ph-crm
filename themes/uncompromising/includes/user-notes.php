<?php
$usernotes = $wpdb->get_results( 
	"
	SELECT *
	FROM aud_notes
	INNER JOIN aud_contacts
	ON aud_notes.contact_ID=aud_contacts.contact_ID
	WHERE aud_notes.ID = $ID
	ORDER BY note_insert DESC
	LIMIT 0, 25
	"
);
if ($usernotes) {
include 'modal-editnote.php';
echo
'
<div class="card">
	<div class="card-header">
		Recent Notes
	</div>
	<div class="card-block-list">
		<div class="list">
';
foreach ( $usernotes as $usernote ) {
$usernotedate = date("F j, Y ", strtotime($usernote->note_insert) );
	echo
	'
	<div class="item">
		<div class="avatar avatar-sm">
		';
			switch ($usernote->interaction_type) {
				case "Generic Note":
					echo '<i class="fal fa-sticky-note"></i>';
					break;
				case "Social Network":
					echo '<i class="fal fa-share-alt"></i>';
					break;
				case "Email":
					echo '<i class="fal fa-envelope"></i>';
					break;
				case "Text IM":
					echo '<i class="fal fa-comments"></i>';
					break;
				case "Call":
					echo '<i class="fal fa-phone"></i>';
					break;
				case "Video Chat":
					echo '<i class="fal fa-tablet"></i>';
					break;
				case "In Person":
					echo '<i class="fal fa-group"></i>';
					break;
			}
		echo
		'
		</div>
		<div class="item-inner">
			<div class="input-wrapper">
				<div class="item-label">
				';

					

					echo
					'
					<p class="item-subtitle mt-0 text-dark">' . stripslashes($usernote->note_text) . '</p>
					<p class="item-desc">' . $usernotedate . ' | <a href="' . home_url( '/' ) . 'contact/?contact_ID=' . $usernote->contact_ID  . '">' . $usernote->firstname  . '&nbsp;' . $usernote->lastname . '</a></p>
				</div>
			</div>
		</div>
		<div class="dropdown item-end">
			<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-ellipsis-v"></i>
			</button>
			<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
				<a href="#modalEditNote" class="btn btn-link btn-primary" data-toggle="modal" data-notes-id="' . $usernote->notes_ID . '" data-note-text="' . $usernote->note_text . '" data-note-insert="' . $usernote->note_insert . '" data-note-interaction-type="' . $usernote->interaction_type . '"><i class="fal fa-pencil"></i> Edit</a>
				<hr class="m-0">
				<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deletenote.php">
					<input type="hidden" name="notes_ID" value="' . $usernote->notes_ID . '">
					<input type="hidden" name="contact_ID" value="' . $usernote->contact_ID . '">
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
<!-- /.card-block-list -->
</div>
<!-- /.card -->
</div>
<!-- /.list -->
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
			<h5>No Recent Notes</h5>
			<a href="' . home_url( '/my-contacts' ) . '" class="btn btn-primary btn-sm"><i class="fal fa-users"></i> View Contacts</a>
		</div>
	</div>
</div>
';
}
?>