<?php
/*
Template Name: Interests
*/
if ( !is_user_logged_in()) {
	wp_redirect( home_url( '/login' ) );  /* this is where user will be redirected if he is not logged in. change to desired url */
} else {

get_header();
/*****Get User and Contact Information*****/

$ID = $current_user->ID;
$contact_ID = $_GET["contact_ID"];
include 'includes/contact-queries.php';
/*****/

/*****Query for Contact*****/

$contact = $wpdb->get_row($get_contact);
//get_contact();

/*****/

/*****Contact ID must be associated with Logged in User*****/

if ($contact->ID == $ID) {
$contact_fn = $contact->firstname;
$contact_ln = $contact->lastname;
$contact_img = $contact->profile_img_url;
$view = $_GET["view"];
/*****/

?>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<?php 
	include 'includes/modal-addupdate.php';
	include 'includes/modal-addinterest.php' ;
?>
<main id="main" class="usd-main">
	<div id="container" class="container-fluid">
		<div class="breadcrumb usd-breadcrumb">
			<?php the_title( '<h3 class="breadcrumb-page-title">', '</h3>' ); ?>
			<ol class="breadcrumb-list">
				<?php bcn_display(); ?>
				<li class="breadcrumb-item"><?php echo $contact_fn ; ?>&nbsp;<?php echo $contact_ln ; ?></li>
			</ol>
		</div>
		<div id="animated" class="usd-content-area usd-content-area-standard animated fadeIn" role="main">
			<div class="profile-content">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo home_url( '/' ); ?>contact/?contact_ID=<?php echo $contact_ID; ?>"><i class="fal fa-angle-left"></i> Back to Profile</a>
					</div>
					<div class="card-block-list">
						<div class="list">
							<div class="item bg-light">
								<div class="avatar avatar-lg avatar-square">
									<div class="profile-img">
										<a href="<?php echo home_url( '/' ); ?>contact/?contact_ID=<?php echo $contact_ID; ?>">
											<?php if($contact_img) { ?>
												<img src="<?php echo $contact_img; ?>">
											<?php } else { ?>
												<i class="fal fa-user"></i>
											<?php } ?>
										</a>
									</div>
								</div>
								<div class="item-inner">
									<div class="input-wrapper">
										<div class="item-label">
											<h4 class="item-title"><?php echo $contact_fn; ?>&nbsp;<?php echo $contact_ln; ?></h4>
											<p class="item-subtitle"><?php echo $contact->relationship; ?></p>
											<p class="item-desc"><?php echo $contact->contact_notes; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php include 'includes/updates.php'; ?>
						<?php include 'includes/interests.php'; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /.usd-content-area -->
	</div>
	<!-- /.container-fluid -->
</main>
<!-- /.usd-main -->

<?php
} /* END $contact->ID == $ID */

get_footer(); 
}
?>