<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$reminder_ID=$_POST['reminder_ID'];
$timestamp=strtotime($_POST['date']);
$date=date('Y-m-d', $timestamp);
$reminder_type=$_POST['reminder_type'];
$reminder_desc=$_POST['reminder_desc'];
}

global $wpdb;

$wpdb->update( 
	'aud_reminder', 
	array( 
		'date' => $date,
		'reminder_desc' => $reminder_desc,
		'reminder_type' => $reminder_type
	), 
	array( 
		'reminder_ID' => $reminder_ID	// string
	),
	array( 	
		'%s',
		'%s',
		'%s'
	),
	array( '%d' )
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>