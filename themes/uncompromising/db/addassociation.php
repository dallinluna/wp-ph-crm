<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$view = $_GET["view"];
$contact_ID=$_POST['contact_ID'];
$ID=$_POST['ID'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$relationship=$_POST['relationship'];
$birth_month=$_POST['birth_month'];
$birth_day=$_POST['birth_day'];
$birth_year=$_POST['birth_year'];
$notes=$_POST['notes'];
$association_size=$_POST['association_size'];
}

global $wpdb;

$wpdb->insert( 
	'aud_associations', 
	array( 
		'contact_ID' => $contact_ID,
		'ID' => $ID,
		'firstname' => $firstname,
		'lastname' => $lastname,
		'relationship' => $relationship,
		'birth_month' => $birth_month,
		'birth_day' => $birth_day,
		'birth_year' => $birth_year,
		'notes' => $notes,
		'association_size' => $association_size
	), 
	array( 
		'%d',
		'%d',
		'%s',
		'%s',
		'%s',
		'%d',
		'%d',
		'%d',
		'%s',
		'%s'
	)
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>