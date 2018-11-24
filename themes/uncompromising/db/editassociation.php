<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$association_ID=$_POST['association_ID'];
$association_fn=$_POST['firstname'];
$association_ln=$_POST['lastname'];
$relationship=$_POST['relationship'];
$birth_year=$_POST['birth_year'];
$birth_month=$_POST['birth_month'];
$birth_day=$_POST['birth_day'];
$notes=$_POST['notes'];
}

global $wpdb;

$wpdb->update( 
	'aud_associations', 
	array( 
		'firstname' => $association_fn,
		'lastname' => $association_ln,
		'relationship' => $relationship,
		'birth_year' => $birth_year,
		'birth_month' => $birth_month,
		'birth_day' => $birth_day,
		'notes' => $notes
	), 
	array( 
		'association_ID' => $association_ID	// string
	),
	array( 	
		'%s',
		'%s',
		'%s',
		'%d',
		'%d',
		'%d',
		'%s'

	),
	array( '%d' )
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>