<?php
/**
 * The header for the blank page (login, landing pages, etc)
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<meta property="fb:app_id"      content="YOUR_APP_ID" />
	<meta property="og:type"        content="fitness.run" />
	<meta property="og:url"         content="http://www.productheartbeat.com/playground/" />
	<meta property="og:title"       content="2018 Fitbit Miami Marathon" />
	<meta property="og:description" content="Dallin Moon has finished the Marathon race. View more details on Athlinks." />
	<meta property="og:image"       content="http://www.productheartbeat.com/wp-content/uploads/miamimarathon.jpg" />

	<!-- First ActivityDataPoint -->
  <meta property="fitness:metrics:location:latitude"  content="25.78001" />
  <meta property="fitness:metrics:location:longitude" content="-80.16983" />
  <meta property="fitness:metrics:location:altitude"  content="2.02" />
  <meta property="fitness:metrics:timestamp" content="2017-11-26T07:00" />
  <meta property="fitness:metrics:distance:value" content="1.68" />
  <meta property="fitness:metrics:distance:units" content="mi" />
  <meta property="fitness:metrics:pace:value" content="8" />
  <meta property="fitness:metrics:pace:units" content="s/m" />
  <meta property="fitness:metrics:calories" content="0" />

	<!-- Second ActivityDataPoint -->
  <meta property="fitness:metrics:location:latitude"  content="25.78144" />
  <meta property="fitness:metrics:location:longitude" content="-80.13044" />
  <meta property="fitness:metrics:location:altitude"  content="1.62" />
  <meta property="fitness:metrics:timestamp" content="2017-11-26T07:45" />
  <meta property="fitness:metrics:distance:value" content="5.28" />
  <meta property="fitness:metrics:distance:units" content="mi" />
  <meta property="fitness:metrics:pace:value" content="8.5" />
  <meta property="fitness:metrics:pace:units" content="s/m" />
  <meta property="fitness:metrics:calories" content="0" />

</head>

<body <?php body_class( 'usd' ); ?>>
	<header class="usd-header navbar px-3 mb-5">
		<a href="/" class="navbar-brand-text row no-gutters justify-content-left align-items-center">
			<div class="navbar-brand-text-icon">
				<i class="fal fa-heartbeat fa-2x color-primary"></i>
			</div>
			<div class="navbar-brand-text-words">
				<span class="navbar-brand-text-words-top font-bold text-uppercase">Product</span>
				<br>
				<span class="navbar-brand-text-words-bottom font-bold text-uppercase">Heartbeat</span>
			</div>
		</a>
	</header>
	<div id="body" class="usd-body">
		
