<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$view = $_GET["view"];
$contact_ID=$_POST['contact_ID'];
$ID=$_POST['ID'];
$contactinfo_type=$_POST['contactinfo_type'];
$contactinfo_data=$_POST['contactinfo_data'];
}

global $wpdb;

$wpdb->insert( 
	'aud_contactinfo', 
	array( 
		'contact_ID' => $contact_ID,
		'ID' => $ID,
		'contactinfo_type' => $contactinfo_type,
		'contactinfo_data' => $contactinfo_data
	), 
	array( 
		'%d',
		'%d',
		'%s',
		'%s'
	)
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>