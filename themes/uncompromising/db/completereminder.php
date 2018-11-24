<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$reminder_ID=$_POST['reminder_ID'];
$contact_ID=$_POST['contact_ID'];
$reminder_status=$_POST['reminder_status'];
}

global $wpdb;

$wpdb->update( 
	'aud_reminder',
	array( 
		'reminder_status' => $reminder_status
	), 
	array( 
		'reminder_ID' => $reminder_ID	// string
	),
	array( 
		'%d'
	),
	array( 
		'%d' 
	)
);	

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>