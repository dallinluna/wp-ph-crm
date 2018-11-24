<?php
/*
Template Name: My Contacts
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
$contact_ID = $_GET["contact_ID"];
$orderby = $_GET["orderby"];
$sort = $_GET["sort"];
?>

<main id="main" class="usd-main">
	<div id="container" class="container-fluid">
		<div id="animated" class="usd-content-area usd-content-area-standard animated fadeIn" role="main">
			<div class="breadcrumb usd-breadcrumb">
				<?php the_title( '<h3 class="breadcrumb-page-title">', '</h3>' ); ?>
				<ol class="breadcrumb-list">
					<?php bcn_display(); ?>
				</ol>
			</div>
			<?php include 'includes/contactlist.php'; ?>
		</div>	
	</div>
</div>
	
<?php } ?>			

<?php get_footer(); ?>
