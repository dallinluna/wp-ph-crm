<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$view = $_GET["view"];
$contact_ID=$_POST['contact_ID'];
$ID=$_POST['ID'];
$update_rssurl=$_POST['update_rssurl'];
$update_category=$_POST['update_category'];
$update_name=$_POST['update_name'];
$update_type=$_POST['update_type'];
$update_size=$_POST['update_size'];
}

global $wpdb;

$wpdb->insert( 
	'aud_updates', 
	array( 
		'contact_ID' => $contact_ID,
		'ID' => $ID,
		'update_URL' => $update_rssurl,
		'update_category' => $update_category,
		'update_type' => $update_type,
		'update_name' => $update_name,
		'update_size' => $update_size
	), 
	array( 
		'%d',
		'%d',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s'
	)
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>