<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if($_POST)
{
$view = $_GET["view"];
$contact_ID=$_POST['contact_ID'];
$ID=$_POST['ID'];
$update_search=$_POST['update_search'];
$update_type=$_POST['update_type'];
$update_category=$_POST['update_category'];
$update_string = array(" ");
$update_stringplus = str_replace($update_string, "+", $update_search);
$update_URL = "https://news.google.com/news/rss/search/section/q/" . $update_stringplus . "/" . $update_stringplus . "?hl=en&gl=US&ned=us";
}

global $wpdb;

$wpdb->insert( 
	'aud_updates', 
	array( 
		'contact_ID' => $contact_ID,
		'ID' => $ID,
		'update_URL' => $update_URL,
		'update_name' => $update_search,
		'update_type' => $update_type,
		'update_category' => $update_category
		
	), 
	array( 
		'%d',
		'%d',
		'%s',
		'%s',
		'%s',
		'%s'
	)
);	
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>