<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$view = $_GET["view"];
$contact_ID=$_POST['contact_ID'];
$ID=$_POST['ID'];
$date_title=$_POST['date_title'];
$date_month=$_POST['date_month'];
$date_day=$_POST['date_day'];
$date_notes=$_POST['date_notes'];
$date_size=$_POST['date_size'];
}

global $wpdb;

$wpdb->insert( 
	'aud_dates', 
	array( 
		'contact_ID' => $contact_ID,
		'ID' => $ID,
		'date_title' => $date_title,
		'date_month' => $date_month,
		'date_day' => $date_day,
		'date_notes' => $date_notes,
		'date_size' => $date_size
	), 
	array( 
		'%d',
		'%d',
		'%s',
		'%d',
		'%d',
		'%s',
		'%s'
	)
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>