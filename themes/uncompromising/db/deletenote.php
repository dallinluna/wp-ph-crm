<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$ID=$_POST['ID'];
$notes_ID=$_POST['notes_ID'];
$contact_ID=$_POST['contact_ID'];

}

global $wpdb;

$wpdb->delete( 'aud_notes', array( 'notes_ID' => $notes_ID ) );

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>