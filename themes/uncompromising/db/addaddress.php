<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$view = $_GET["view"];
$contact_ID=$_POST['contact_ID'];
$ID=$_POST['ID'];
$address_1=$_POST['address_1'];
$address_2=$_POST['address_2'];
$address_city=$_POST['address_city'];
$address_state=$_POST['address_state'];
$address_zip=$_POST['address_zip'];
}

global $wpdb;

$wpdb->insert( 
	'aud_address', 
	array( 
		'contact_ID' => $contact_ID,
		'ID' => $ID,
		'address_1' => $address_1,
		'address_2' => $address_2,
		'address_city' => $address_city,
		'address_state' => $address_state,
		'address_zip' => $address_zip
	), 
	array( 
		'%d',
		'%d',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s'
	)
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>