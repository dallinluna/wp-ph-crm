<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$contactinfo_ID=$_POST['address_ID'];
$contact_ID=$_POST['contact_ID'];

}

global $wpdb;

$wpdb->delete( 'aud_address', array( 'address_ID' => $contactinfo_ID ) );

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>