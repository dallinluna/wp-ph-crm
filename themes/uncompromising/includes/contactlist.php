<?php

$contacts = $wpdb->get_results( 
	"
SELECT ID, contact_ID, firstname, lastname, contact_notes
FROM aud_contacts
WHERE ID = $ID
ORDER BY firstname ASC;
	"
);

if ($contacts) {

echo
'
<div class="card usd-demo">
	<div class="card-block p-0">
		<table id="usdTable2" class="table table-striped" data-page-length="50" style="width: 100% !important">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th class="d-sm-down-none">Last Note (In Days)</th>
					<th class="w-50 d-sm-down-none">Notes</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			';
				foreach ( $contacts as $contact ) {
				echo
				'	
				<tr>
					<td class="text-muted">
					' . $contact->contact_ID . '
					</td>
					<td>
						<a href="' . home_url( '/' ) . 'contact?contact_ID=' . $contact->contact_ID . '">' . $contact->firstname . '&nbsp;' . $contact->lastname . '</a>
					</td>
					<td class="d-sm-down-none">';			
					$notecontactID = $contact->contact_ID;
					$noteID = $contact->ID;				
					$interactiondays = $wpdb->get_results( 
						"	
						SELECT MAX( note_insert ) AS note_insert
						FROM aud_notes
						WHERE ID = $noteID
						AND contact_ID = $notecontactID
						AND note_insert IS NOT NULL
						"
					);
					foreach ( $interactiondays AS $interactionday) {
						//echo $interactionday->note_insert;
						if ($interactionday->note_insert == null) {
							echo
							'
							<span class="text-muted mb-0">None</span>
							';
						}
						else {
							$lastinteraction = $interactionday->note_insert; // prints "10"
							$date1 = $lastinteraction;
							$date2 = date('m/d/Y h:i:s a');
							$diff = abs(strtotime($date2) - strtotime($date1));
							$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
							echo $days;
						}
					}
					echo
					'
					</td>
					<td class="d-sm-down-none">
						'. stripslashes($contact->contact_notes) .'
					</td>
					<td>
						<div class="dropdown item-end">
							<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v"></i>
							</button>
							<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
								<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deletecontact.php">
									<input type="hidden" name="notes_ID" value="' . $contact->ID . '">
									<input type="hidden" name="contact_ID" value="' . $contact->contact_ID . '">
									<button type="submit" class="btn btn-link btn-danger"><i class="fal fa-trash"></i> Delete</button>
								</form>
							</div>
						</div>
					</td>
				</tr>
				';
}
		echo
		'
			</tbody>
		</table>
	</div>
</div>
';
} else {
echo
'
<div class="card">
	<div class="card-header">
		Contacts
	</div>
	<div class="card-block text-center">
		<h4>You do not have any contacts yet.</h4>
		<a href="' . home_url( '/' ) . 'add-contact" class="btn btn-primary"><i class="fal fa-plus"></i> Add a Contact</a>
	</div>
</div>
';
}
?>