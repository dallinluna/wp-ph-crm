<?php
/*
Template Name: Dashboard
*/
?>
<?php if ( !is_user_logged_in()) {
wp_redirect( home_url( '/login' ) );  /* this is where user will be redirected if he is not logged in. change to desired url */
} else {
get_header();
global $current_user;
get_currentuserinfo();
$ID = $current_user->ID;
$user_firstname = $current_user->first_name;
?>
<main id="main" class="usd-main">
	<div id="container" class="container-fluid">
		<div id="animated" class="animated fadeIn" role="main">
			<div class="breadcrumb usd-breadcrumb">
				<?php the_title( '<h3 class="breadcrumb-page-title">', '</h3>' ); ?>
				<ol class="breadcrumb-list">
					<?php bcn_display(); ?>
				</ol>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<?php include 'includes/user-reminders.php' ; ?>
					<?php include 'includes/user-dates.php' ; ?>
					<?php include 'includes/user-associations.php'; ?>
				</div>
				<!-- /.col -->
				<div class="col-lg-4">
					<?php include 'includes/user-notes.php'; ?>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.animated -->
	</div>
	<!-- /.container-fluid -->
</main> 
<!-- /.usd-main -->
<?php } ?>
<?php get_footer(); ?>