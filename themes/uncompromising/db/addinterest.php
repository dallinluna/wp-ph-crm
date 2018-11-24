<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$contact_ID=$_POST['contact_ID'];
$ID=$_POST['ID'];
$interest_name=$_POST['interest_name'];
$interest_url=$_POST['interest_url'];
$interest_category=$_POST['interest_category'];
$interest_description=$_POST['interest_description'];

}

global $wpdb;

$wpdb->insert( 
	'aud_interests', 
	array( 
		'contact_ID' => $contact_ID,
		'ID' => $ID,
		'interest_name' => $interest_name,
		'interest_url' => $interest_url,
		'interest_category' => $interest_category,
		'interest_description' => $interest_description
	), 
	array( 
		'%d',
		'%d',
		'%s',
		'%s',
		'%s',
		'%s'
	)
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>