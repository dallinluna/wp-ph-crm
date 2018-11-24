<?php

$notes = $wpdb->get_results( 
	"
	SELECT note_insert, contact_ID, interaction_type, note_text
	FROM aud_notes
	WHERE contact_ID = $contact_ID
	ORDER BY note_insert DESC
	"
);

if ($notes) {
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
						<p class="item-subtitle mt-0">
						' . stripslashes($note->note_text) . '
						</p>
						<p class="item-desc">' . $notedate . '</psmall>
					</div>
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
?>