<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$contactinfo_ID=$_POST['contactinfo_ID'];
$contact_ID=$_POST['contact_ID'];

}

global $wpdb;

$wpdb->delete( 'aud_contactinfo', array( 'contactinfo_ID' => $contactinfo_ID ) );

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>