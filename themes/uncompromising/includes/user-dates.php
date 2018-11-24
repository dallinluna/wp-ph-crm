<?php
$currentMonth = date("n");
$nextMonth = $currentMonth + 1;
$monthAfterNext = $currentMonth + 2;
if ($currentMonth == 12) {
	$userDatesQuery = 
		"
		SELECT *
		FROM aud_dates
		INNER JOIN aud_contacts
		ON aud_dates.contact_ID=aud_contacts.contact_ID
		WHERE aud_dates.ID = $ID AND aud_dates.date_month IN (12,1,2)
			ORDER BY FIELD(date_month, 12,1,2)
		LIMIT 0, 10
		";
	$userDatesCountQuery = 
		"
		SELECT COUNT(*)
		FROM aud_dates
		INNER JOIN aud_contacts
		ON aud_dates.contact_ID=aud_contacts.contact_ID
		WHERE aud_dates.ID = $ID AND aud_dates.date_month IN (12,1,2)
			ORDER BY FIELD(date_month, 12,1,2)
		LIMIT 0, 10
		";
} else {
	$userDatesQuery = 
		"
		SELECT *
		FROM aud_dates
		INNER JOIN aud_contacts
		ON aud_dates.contact_ID=aud_contacts.contact_ID
		WHERE aud_dates.ID = $ID AND aud_dates.date_month IN ($currentMonth, $nextMonth, $monthAfterNext)
			ORDER BY FIELD(date_month, 12,1,2)
		LIMIT 0, 10
		";
	$userDatesCountQuery = 
		"
		SELECT COUNT(*)
		FROM aud_dates
		INNER JOIN aud_contacts
		ON aud_dates.contact_ID=aud_contacts.contact_ID
		WHERE aud_dates.ID = $ID AND aud_dates.date_month IN ($currentMonth, $nextMonth, $monthAfterNext)
			ORDER BY FIELD(date_month, 12,1,2)
		LIMIT 0, 10
		";
}

$userDates = $wpdb->get_results($userDatesQuery);
$num_userDates = $wpdb->get_var($userDatesCountQuery);

if ($userDates) {
echo
'
<div class="card">
	<div class="card-header">
		Upcoming Dates
	</div>
	<div class="card-block-list">
<div class="list">
';
foreach ( $userDates as $userDate ) 
{
$date_month = $userDate->date_month;
	echo
	'
	<a href="' . home_url( '/' ) . 'contact/?contact_ID=' . $userDate->contact_ID  . '&view=dates" class="item item-clickable">
		<div class="item-inner">
			<div class="input-wrapper">
				<div class="item-label">
					<h4 class="item-title">' . $userDate->firstname  . ' ' . $userDate->lastname . '</h4>
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
					'.$userDate->date_day.'&nbsp;(' . $userDate->date_title . ')</p>
					<p class="item-desc">' . $userDate->date_notes . '</p>
				</div>
			</div>
		</div>
		<div class="item-end item-end-caret">
      <i class="fal fa-angle-right"></i>
    </div>
	</a>
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
			Important Dates
		</div>
		<div class="card-block">
			<div class="text-center py-4">
				<h5>No Upcoming Dates</h5>
				<a href="' . home_url( '/my-contacts' ) . '" class="btn btn-primary btn-sm"><i class="fal fa-users"></i> View Contacts</a>
			</div>
		</div>
	</div>
	';
	}
?>