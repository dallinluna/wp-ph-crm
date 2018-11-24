<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$reminder_ID=$_POST['reminder_ID'];
$contact_ID=$_POST['contact_ID'];

}

global $wpdb;

$wpdb->delete( 'aud_reminder', array( 'reminder_ID' => $reminder_ID ) );

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>