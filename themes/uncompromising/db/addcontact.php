<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$ID=$_POST['ID'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$profile_img_url=$_POST['profile_img_url'];
$relationship=$_POST['relationship'];
$contact_notes=$_POST['contact_notes'];
$bg_img_url=$_POST['bg_img_url'];
$description=$_POST['description'];
$contact_frequency=$_POST['contact_frequency'];
}

global $wpdb;

$wpdb->insert( 
	'aud_contacts', 
	array( 
		'ID' => $ID,
		'firstname' => $firstname, 
		'lastname' => $lastname, 
		'profile_img_url' => $profile_img_url,
		'relationship' => $relationship,
		'contact_notes' => $contact_notes,
		'bg_img_url' => $bg_img_url,
		'description' => $description,
		'contact_frequency' => $contact_frequency
		
	), 
	array( 
		'%d', 
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%d'
	)
);
header('Location:' . home_url( '/' ) . '/my-contacts');
?>