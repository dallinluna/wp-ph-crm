<?php
global $wpdb;
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
$currentMonth = date("n");
$nextMonth = $currentMonth + 1;
$monthAfterNext = $currentMonth + 2;

$userreminders = $wpdb->get_results( 
"
SELECT *
FROM aud_reminder
INNER JOIN aud_contacts ON aud_reminder.contact_ID = aud_contacts.contact_ID
WHERE aud_reminder.ID =4
AND aud_reminder.reminder_status =0
AND aud_reminder.date < DATE_ADD( NOW( ) , INTERVAL 7 DAY )
ORDER BY date ASC
"
);

if ($currentmonth == 12) {

$userdates = $wpdb->get_results( 
	"
	SELECT date_title, date_month, date_day, firstname, lastname, date_notes
	FROM aud_dates
	INNER JOIN aud_contacts
	ON aud_dates.contact_ID=aud_contacts.contact_ID
	WHERE aud_dates.ID = 4 AND aud_dates.date_month IN (12,1,2)
        ORDER BY FIELD(date_month, 12,1,2)
	LIMIT 0, 10
	"
);

$userassociations = $wpdb->get_results( 
	"
	SELECT aud_associations.birth_month, aud_associations.birth_day, aud_associations.firstname, aud_associations.lastname, aud_associations.notes
	FROM aud_associations
	INNER JOIN aud_contacts
	ON aud_associations.contact_ID=aud_contacts.contact_ID
	WHERE aud_associations.ID = 4 AND aud_associations.birth_month IN (12,1,2)
        ORDER BY FIELD(birth_month, 12,1,2)
	LIMIT 0, 10
	"
);

} else {

$userdates = $wpdb->get_results( 
	"
	SELECT date_title, date_month, date_day, firstname, lastname, date_notes, aud_dates.contact_ID
	FROM aud_dates
	INNER JOIN aud_contacts
	ON aud_dates.contact_ID=aud_contacts.contact_ID
  WHERE aud_dates.ID = 4 AND aud_dates.date_month IN ($currentMonth, $nextMonth, $monthAfterNext)
	ORDER BY date_month ASC,date_day ASC
	LIMIT 0, 10
	"
);

$userassociations = $wpdb->get_results( 
	"
	SELECT aud_associations.birth_month, aud_associations.birth_day, aud_associations.firstname, aud_associations.lastname, aud_associations.notes, aud_associations.relationship, aud_associations.contact_ID, aud_contacts.firstname AS contact_fn, aud_contacts.lastname AS contact_ln
	FROM aud_associations
	INNER JOIN aud_contacts ON aud_associations.contact_ID = aud_contacts.contact_ID
	WHERE aud_associations.ID =4
	AND aud_associations.birth_month IN ($currentMonth, $nextMonth, $monthAfterNext)
	ORDER BY birth_month ASC , birth_day ASC 
	LIMIT 0 , 10
	"
);

}
$to = "dalandjen@gmail.com";
$subject = "Reminders";
$txt = "";
$headers = "From: info@productheartbeat.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $txt .="<strong>Important Dates</strong><br>";
foreach ( $userdates as $userdate ) {
  $txt .= $userdate->date_month;
  $txt .= "&nbsp;/&nbsp;";
  $txt .= $userdate->date_day;
  $txt .= "&nbsp;-&nbsp;";
  $txt .= $userdate->firstname;
  $txt .= "&nbsp;";
  $txt .= $userdate->lastname;
  $txt .= "&nbsp;-&nbsp;";
  $txt .= $userdate->date_title;
  $txt .= ":&nbsp;";
  $txt .= $userdate->date_notes;
  $txt .= "<br>";
}
 $txt .="<br><strong>This Week's Reminders</strong><br>";
foreach ( $userreminders as $userreminder ) {
  $txt .= $userreminder->date;
  $txt .= "&nbsp;-&nbsp;";
  $txt .= $userreminder->firstname;
  $txt .= "&nbsp;";
  $txt .= $userreminder->lastname;
  $txt .= "&nbsp;-&nbsp;";
  $txt .= $userreminder->reminder_type;
  $txt .= ":&nbsp;";
  $txt .= stripslashes($userreminder->reminder_desc);
  $txt .= "<br>";
}
 $txt .="<br><strong>Association Birthdays</strong><br>";
foreach ( $userassociations as $userassociation ) {
  $txt .= $userassociation->birth_month;
  $txt .= "&nbsp;/&nbsp;";
  $txt .= $userassociation->birth_day;
  $txt .= "&nbsp;-&nbsp;";
  $txt .= $userassociation->firstname;
  $txt .= "&nbsp;";
  $txt .= $userassociation->lastname;
  $txt .= "&nbsp;&nbsp;(";
  $txt .= $userassociation->relationship;
  $txt .= "&nbsp;=>&nbsp;";
  $txt .= $userassociation->contact_fn;
  $txt .= "&nbsp;";
  $txt .= $userassociation->contact_ln;
  $txt .= ")&nbsp;";
  $txt .= stripslashes($userassociation->notes);
  $txt .= "<br>";
}

mail( $to, $subject, $txt, $headers );

?>