<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$date_ID=$_POST['date_ID'];
$date_title=$_POST['date_title'];
$date_month=$_POST['date_month'];
$date_day=$_POST['date_day'];
$date_notes=$_POST['date_notes'];
}

global $wpdb;

$wpdb->update( 
	'aud_dates', 
	array( 
		'date_title' => $date_title,
		'date_month' => $date_month,
		'date_day' => $date_day,
		'date_notes' => $date_notes
	), 
	array( 
		'date_ID' => $date_ID	// string
	),
	array( 	
		'%s',
		'%s',
		'%s',
		'%s'

	),
	array( '%d' )
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>