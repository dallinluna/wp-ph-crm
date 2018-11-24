<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$ID=$_POST['ID'];
$contact_ID=$_POST['contact_ID'];
$timestamp = strtotime($_POST['date']);
$date= date('Y-m-d', $timestamp);
$reminder_desc=$_POST['reminder_desc'];
$reminder_type=$_POST['reminder_type'];

}

global $wpdb;

$wpdb->insert( 
	'aud_reminder', 
	array( 
		'ID' => $ID,
		'contact_ID' => $contact_ID,
		'date' => $date,
		'reminder_desc' => $reminder_desc,
		'reminder_type' => $reminder_type
	), 
	array( 
		'%d',
		'%d',		
		'%s',
		'%s',
		'%s'
	)
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>