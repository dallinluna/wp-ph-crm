<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$contact_ID=$_POST['contact_ID'];
$ID=$_POST['ID'];
$note_text=$_POST['note_text'];
$interaction_type=$_POST['interaction_type'];
$timestamp = strtotime($_POST['note_insert']);
$note_insert= date('Y-m-d', $timestamp);
}

global $wpdb;

$wpdb->insert( 
	'aud_notes', 
	array( 
		'contact_ID' => $contact_ID,
		'ID' => $ID,
		'note_text' => $note_text,
		'note_insert' => $note_insert,
		'interaction_type' => $interaction_type
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