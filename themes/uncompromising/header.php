<?php
/**
 * The header for our theme
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109083445-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109083445-1');
</script>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class( 'usd header-fixed sidebar-fixed' ); ?>>
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=121760338590315';
 		 fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<header class="usd-header navbar">
		<button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button"><i class="fal fa-bars"></i></button>
		<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button"><i class="fal fa-bars"></i></button>
		<!--<a style="background-image: url('/wp-content/uploads/ph_logo.png');" class="navbar-brand" href="/"></a>-->
		<a href="<?php echo home_url( '/' ); ?>" class="navbar-brand-text row no-gutters justify-content-left align-items-center">
			<div class="navbar-brand-text-icon">
				<i class="fal fa-heartbeat fa-2x color-primary"></i>
			</div>
			<div class="navbar-brand-text-words">
				<span class="navbar-brand-text-words-top font-bold text-uppercase">Product</span>
				<br>
				<span class="navbar-brand-text-words-bottom font-bold text-uppercase">Heartbeat</span>
			</div>
		</a>
		<!--<ul class="nav nav-search">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle nav-link dropdown-no-caret text-muted" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="fal fa-search fa-flip-horizontal"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-search dropdown-menu-lg animated fadeTop">
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<div class="input-group">
							<input type="search" placeholder="Search..." class="form-control form-control-sm" id="s" name="s" value="" />
							<span class="input-group-btn">
								<button type="submit" id="searchsubmit" class="btn btn-primary" ><i class="far fa-search fa-flip-horizontal"></i></button>
							</span>
						</div>
					</form>
				</div>
			</li>
		</ul>-->
		<ul class="nav navbar-nav ml-auto">
			<?php if ( is_user_logged_in() ) { ?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<i class="fal fa-user"></i>
					<span class="d-md-down-none">
						<?php 
							global $current_user;
							get_currentuserinfo();
							echo strstr($current_user->user_email, '@', true);
						?>
						(ID: <?php echo get_current_user_id(); ?>)
					</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="dropdown-header text-center">
						<strong>Account</strong>
					</div>
					<a class="dropdown-item" href="<?php echo home_url( '/' ); ?>account"><i class="far fa-user"></i> Account</a>
					<a class="dropdown-item" href="<?php echo wp_logout_url(); ?>"><i class="far fa-lock"></i> Logout</a>
				</div>
			</li>
			<?php } else { ?>
			<li class="nav-item px-0">
				<a href="/login">Login</a>
			</li>
			<li class="nav-item">
				<a href="/register" class="btn btn-primary my-2 my-sm-0">Register</a>
			</li>
			<?php } ?>
		</ul>
	</header>
	<div id="body" class="usd-body">
		<div id="sidebar1" class="usd-sidebar" role="complementary">
			<nav class="sidebar-nav">
				<ul class="nav">
					<li class="nav-item p-3">
						<a class="btn btn-primary btn-block" href="<?php echo home_url( '/' ); ?>add-contact"><i class="fal fa-plus"></i> Add Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo home_url( '/' ); ?>"><i class="fal fa-tachometer"></i> Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo home_url( '/' ); ?>my-contacts"><i class="fal fa-user"></i> My Contacts</a>
					</li>
				</ul>
			</nav>
		</div>
