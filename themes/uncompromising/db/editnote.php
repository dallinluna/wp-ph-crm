<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$notes_ID=$_POST['notes_ID'];
$note_insert=$_POST['note_insert'];
$interaction_type=$_POST['interaction_type'];
$note_text=$_POST['note_text'];
}

global $wpdb;

$wpdb->update( 
	'aud_notes', 
	array( 
		'note_text' => $note_text,
		'note_insert' => $note_insert,
		'interaction_type' => $interaction_type
	), 
	array( 
		'notes_ID' => $notes_ID	// string
	),
	array( 	
		'%s',
		'%s',
		'%s'

	),
	array( '%d' )
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>