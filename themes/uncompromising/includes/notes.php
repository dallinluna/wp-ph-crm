<?php

$notes = $wpdb->get_results( 
	"
	SELECT *
	FROM aud_notes
	WHERE contact_ID = $contact_ID AND ID = $ID
	ORDER BY note_insert DESC
	LIMIT 0, 5
	"
);
?>
<div class="card">
	<div class="card-header">
		Notes
		<?php if ($notes) { ?>
		<button href="#modaladdNote" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm pull-right"><i class="fal fa-plus"></i> Add Note</button>
		<?php } ?>
	</div>
	<div class="card-block">
<?php
if ($notes) {
	include 'modal-editnote.php';
echo
'
<div class="list mb-0">
';
	foreach ( $notes as $note ) {
	$notedate = date("F j, Y ", strtotime($note->note_insert) );
	echo
	'
	<div class="item item-bottom-border">
		<div class="avatar avatar-sm">
		';
			switch ($note->interaction_type) {
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
					<p class="item-subtitle">' . stripslashes($note->note_text) . '</p>
					<p class="item-desc">- ' . $notedate . '</p>
				</div>
			</div>
		</div>
		<div class="dropdown item-end">
			<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-ellipsis-v"></i>
			</button>
			<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
				<a href="#modalEditNote" class="btn btn-link btn-primary" data-toggle="modal" data-notes-id="' . $note->notes_ID . '" data-note-text="' . $note->note_text . '" data-note-insert="' . $note->note_insert . '" data-note-interaction-type="' . $note->interaction_type . '"><i class="fal fa-pencil"></i> Edit</a>
				<hr class="m-0">
				<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deletenote.php">
					<input type="hidden" name="notes_ID" value="' . $note->notes_ID . '">
					<input type="hidden" name="contact_ID" value="' . $note->contact_ID . '">
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
if (empty($notes)) {
	echo
	'
	<div class="text-center py-4">
		<h5 class="mb-4">No recent interactions</h5>
		<button href="#modaladdNote" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm"><i class="fal fa-plus"></i> Add Note</button>
	</div>
	';
}
?>
	</div>
	<?php if ($notes) { ?>
	<div class="card-footer">
		<button href="#modalNotes" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-link float-right">View All Notes</button>	
	</div>
	<?php } ?>
</div>