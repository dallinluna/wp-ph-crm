<?php
$view = $_GET["view"];
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{

$association_ID=$_POST['association_ID'];
$contact_ID=$_POST['contact_ID'];

}

global $wpdb;

$wpdb->delete( 'aud_associations', array( 'association_ID' => $association_ID ) );

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>