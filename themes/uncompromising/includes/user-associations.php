<?php

$currentMonth = date("n");
$nextMonth = $currentMonth + 1;
$monthAfterNext = $currentMonth + 2;

if ($currentmonth == 12) {
	$userAssociationsQuery =
	"
	SELECT aud_associations.birth_month, aud_associations.birth_day, aud_associations.firstname, aud_associations.lastname, aud_associations.notes
	FROM aud_associations
	INNER JOIN aud_contacts
	ON aud_associations.contact_ID=aud_contacts.contact_ID
	WHERE aud_associations.ID = $ID AND aud_associations.birth_month IN (12,1,2)
        ORDER BY FIELD(birth_month, 12,1,2)
	LIMIT 0, 10
	";
	$userAssociationsQueryCount =
	"
	SELECT COUNT(*)
	FROM aud_associations
	INNER JOIN aud_contacts
	ON aud_associations.contact_ID=aud_contacts.contact_ID
	WHERE aud_associations.ID = $ID AND aud_associations.birth_month IN (12,1,2)
        ORDER BY FIELD(birth_month, 12,1,2)
	LIMIT 0, 10
	";
} else {
	$userAssociationsQuery =
	"
	SELECT aud_associations.birth_month, aud_associations.birth_day, aud_associations.firstname, aud_associations.lastname, aud_associations.notes, aud_associations.relationship, aud_associations.contact_ID, aud_contacts.firstname AS contact_fn, aud_contacts.lastname AS contact_ln
	FROM aud_associations
	INNER JOIN aud_contacts ON aud_associations.contact_ID = aud_contacts.contact_ID
	WHERE aud_associations.ID = $ID
	AND aud_associations.birth_month IN ($currentMonth, $nextMonth, $monthAfterNext)
	ORDER BY birth_month ASC , birth_day ASC 
	LIMIT 0 , 10
	";
	$userAssociationsQueryCount =
	"
	SELECT COUNT(*)
	FROM aud_associations
	INNER JOIN aud_contacts ON aud_associations.contact_ID = aud_contacts.contact_ID
	WHERE aud_associations.ID = $ID
	AND aud_associations.birth_month IN ($currentMonth, $nextMonth, $monthAfterNext)
	ORDER BY birth_month ASC , birth_day ASC 
	LIMIT 0 , 10
	";
};

$userAssociations = $wpdb->get_results($userAssociationsQuery);
$num_userAssociations = $wpdb->get_var($userAssociationsQueryCount);
if ($num_userAssociations > 10) {
	$num_userAssociationsCount = 10;
} else {
	$num_userAssociationsCount = $num_userAssociations;
}

if ($userAssociations) {

echo
'
<div class="card">
	<div class="card-header">
		Upcoming Association B-Day
	</div>
	<div class="card-block-list">
		<div class="list">
		';

foreach ( $userAssociations as $userAssociation ) 
{

$birth_month = $userAssociation->birth_month;

echo 
	'
	<a class="item item-clickable" href="' . home_url( '/' ) . '/contact/?contact_ID=' . $userAssociation->contact_ID  . '&view=associations">
		<div class="item-inner">
			<div class="input-wrapper">
				<div class="item-label">
					<h4 class="item-title">' . $userAssociation->firstname  . ' ' . $userAssociation->lastname . '</h4> 
					<p class="item-subtitle mt-0">
					';
			
					switch($birth_month) {
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
					
					echo '&nbsp' . $userAssociation->birth_day . '</p>
					<p class="item-desc">'.$userAssociation->relationship.' of '.$userAssociation->contact_fn.' '.$userAssociation->contact_ln.'.&nbsp' . $userAssociation->notes . '</p>
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
		Upcoming Reminders
	</div>
	<div class="card-block">
		<div class="text-center py-4">
			<h5>No Upcoming Association B-days</h5>
			<a href="' . home_url( '/my-contacts' ) . '" class="btn btn-primary btn-sm"><i class="fal fa-users"></i> View Contacts</a>
		</div>
	</div>
</div>
';
}
?>