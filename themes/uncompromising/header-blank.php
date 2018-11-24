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
		
