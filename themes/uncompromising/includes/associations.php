<?php
$associations = $wpdb->get_results( 
	"
	SELECT *
	FROM aud_associations
	WHERE contact_ID = $contact_ID AND ID = $ID
	ORDER BY lastname ASC
	"
);
?>
<div class="card">
	<div class="card-header">
		Associations
		<?php if ($associations) { ?>
		<button href="#modalAddAssociation" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm pull-right"><i class="fal fa-plus"></i> Add Association</button>
		<?php } ?>
	</div>
	<div class="card-block">
<?php
if ($associations) {
include 'modal-editassociation.php';
echo
'
<div class="list mb-0">
';
foreach ( $associations as $association ) 
{
$association_ID = $association->association_ID;
$association_fn = $association->firstname;
$association_ln = $association->lastname;
$relationship = $association->relationship;
$birth_year = $association->birth_year;
$birth_month = $association->birth_month;
$birth_day = $association->birth_day;
$notes = $association->notes;
$size = $association->association_size;

	echo
	'
	<div class="item">	
		<div class="item-inner">
			<div class="input-wrapper">
				<div class="item-label">
					<h4 class="item-title">' . $association_fn . ' '.$association_ln.' ('.$relationship.')</h4>
					<p class="item-subtitle">'.$notes.'</p>
					';		
					if($birth_month > 0) {
					echo
					'
					<p class="item-desc"><i class="fal fa-birhday-cake"></i> ' .$birth_month.'/'.$birth_day.'/'.$birth_year.'</p>
					';
					}
				echo
				'
				</div>
			</div>
		</div>
		<div class="dropdown item-end">
			<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-ellipsis-v"></i>
			</button>
			<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
				<a href="#modalEditAssociation" class="btn btn-link btn-primary" data-toggle="modal" data-association-id="' . $association_ID . '" data-firstname="' . $association_fn . '" data-lastname="' . $association_ln . '" data-relationship="' . $relationship . '" data-birth-year="' . $birth_year . '" data-birth-month="' . $birth_month . '" data-birth-day="' . $birth_day . '" data-notes="' . $notes . '"><i class="fal fa-pencil"></i> Edit</a>
				<hr class="m-0">
				<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deleteassociation.php?view=associations">
					<input type="hidden" name="association_ID" value="' . $association_ID . '">
					<input type="hidden" name="contact_ID" value="' . $contact_ID . '">
					<button type="submit" class="btn btn-primary btn-link text-danger text-centerf"><i class="fal fa-trash"></i> Delete</button>
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
if (empty($associations)) {
	echo '
	<div class="text-center py-4">
		<h5 class="mb-4">Who does ' . $contact->firstname . ' know that you want to remember? Spouse? Kids? </h5>
		<button href="#modalAddAssociation" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm"><i class="fal fa-plus"></i> Add Association</button>
	</div>
	';
}
?>
	</div>
</div>