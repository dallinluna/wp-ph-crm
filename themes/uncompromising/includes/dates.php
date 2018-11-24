<?php
$dates = $wpdb->get_results( 
	"
	SELECT *
	FROM aud_dates
	WHERE contact_ID = $contact_ID AND ID = $ID
	ORDER BY date_month ASC,date_day ASC
	"
);
?>
<div class="card">
	<div class="card-header">
		Dates
		<?php if ($dates) { ?>
		<button href="#modalAddDate" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm pull-right"><i class="fal fa-plus"></i> Add Date</button>
		<?php } ?>
	</div>
	<div class="card-block">
<?php
if ($dates) {
include 'modal-editdate.php';
echo
'
<div class="list">
';

foreach ( $dates as $date ) {
$date_ID = $date->date_ID;
$date_month = $date->date_month;
$date_day = $date->date_day;
$title = $date->date_title;
$notes = $date->date_notes;
$size = $date->date_size;

	echo 
	'
	<div class="item">	
		<div class="item-inner">
			<div class="input-wrapper">
				<div class="item-label">
					<h4 class="item-title"><i class="fal fa-calendar"></i> ' . stripslashes($title) . '</h4>
					<p class="item-subtitle">
					';
					switch($date_month) {
						case 1:
							echo "January";
							break;
						case 2:
							echo "February";
							break;
						case 3:
							echo "March";
							break;
						case 4:
							echo "April";
							break;
						case 5:
							echo "May";
							break;
						case 6;
							echo "June";
							break;
						case 7:
							echo "July";
							break;
						case 8:
							echo "August";
							break;
						case 9:
							echo "September";
							break;
						case 10:
							echo "October";
							break;
						case 11:
							echo "November";
							break;
						case 12:
							echo "December";
							break;
					}
					echo
					'
					' . $date_day . '
					</p>
					<p class="item-desc">' . stripslashes($notes) . '</p>
				</div>
			</div>
		</div>
		<div class="dropdown item-end">
			<button class="btn btn-link btn-secondary dropdown-toggle dropdown-no-caret float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-ellipsis-v"></i>
			</button>
			<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
				<a href="#modalEditDate" class="btn btn-link btn-primary" data-toggle="modal" data-date-id="' . $date->date_ID . '" data-date-title="' . $date->date_title . '" data-date-month="' . $date->date_month . '" data-date-day="' . $date->date_day . '" data-date-notes="' . $date->date_notes . '"><i class="fal fa-pencil"></i> Edit</a>
				<hr class="m-0">
				<form name="form" method="post" action="' . home_url( '/' ) . 'wp-content/themes/uncompromising/db/deletedate.php?view=dates">
					<input type="hidden" name="date_ID" value="' . $date_ID . '">
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
if (empty($dates)) {
	echo
	'
	<div class="text-center py-4">
		<h5 class="mb-4">Any dates you want to remember for ' . $contact->firstname . '?</h5>
		<button href="#modalAddDate" data-toggle="modal" role="button" type="button" class="btn btn-primary btn-sm"><i class="fal fa-plus"></i> Add Date</button>
	</div>
	';
}
?>
	</div>
</div>