<?php
/*
Template Name: Contact
*/
?>
<?php 
if ( !is_user_logged_in()) {
	wp_redirect( home_url( '/login' ) );
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
$contact_note = $contact->contact_notes;
$contact_ln = $contact->lastname;
$contact_bg = $contact->bg_img_url;
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
	include 'includes/modal-completedreminders.php';
	include 'includes/modal-addreminder.php';
	include 'includes/modal-addupdate.php';
	include 'includes/modal-addassociation.php';
	include 'includes/modal-adddate.php';
	include 'includes/modal-addinterest.php' ;
	include 'includes/modal-addcontactinfo.php' ;
	include 'includes/modal-addnote.php';
	include 'includes/modal-allnotes.php';
?>
<main id="main" class="usd-main contact-page">
	<div id="container">
		<div id="animated" class="usd-content-area usd-content-area-standard animated fadeIn" role="main">
			<div class="breadcrumb usd-breadcrumb p-3 text-light" style="background-color: rgba(0,0,0,0.5)">
				<?php the_title( '<h3 class="breadcrumb-page-title text-light">', '</h3>' ); ?>
				<ol class="breadcrumb-list">
					<?php bcn_display(); ?>
					<li class="breadcrumb-item"><?php echo $contact_fn ; ?>&nbsp;<?php echo $contact_ln ; ?></li>
				</ol>
			</div>
			<?php if($contact->bg_img_url) { ?>
				<div class="profile-header" style="
				background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 65%,rgba(0,0,0,0.65) 100%), url('<?php echo $contact_bg; ?>') no-repeat; background-size: cover; background-position: center center;"
				>
			<?php } else { ?>
				<div class="profile-header" style="background-image: url('https://www.productheartbeat.com/wp-content/uploads/leather-2767928_1280.jpg'); background-size: cover; background-position: center center;">
			<?php } ?>
			</div>
			<div class="profile-identity">
				<div class="profile-title">
					<h1 class="mb-0 font-bold h2"><?php echo $contact_fn ; ?>&nbsp;<?php echo $contact_ln ; ?> <a href="<?php echo home_url( '/' ); ?>edit-contact/?contact_ID=<?php echo $contact_ID ?>"><span class="font-sm ml-2"><i class="fal fa-pencil"></i> Edit</a></span></h1>
					<?php if($contact->relationship) { ?>
						<p class="mb-0 mb-lg-3"><?php echo stripslashes($contact->relationship) ?></p>
					<?php } else { ?>
						<div class="mb-lg-3"></div>
					<?php } ?>
				</div>
				<div class="profile-img">
					<?php if($contact->profile_img_url) { ?>
						<img src="<?php echo $contact->profile_img_url; ?>">
					<?php } else { ?>
						<img src="https://www.productheartbeat.com/wp-content/uploads/user-icon.png">
					<?php } ?>
				</div>
			</div>
			<div class="profile-menu">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item profile-menu-img">
						<?php if($contact_img) { ?>
							<img class="float-left ml-3 mr-2 animated fadeIn" src="<?php echo $contact_img; ?>">
						<?php } else { ?>
							<img class="float-left ml-3 mr-2 animated fadeIn" src="https://www.productheartbeat.com/wp-content/uploads/user-icon.png">
						<?php } ?>
						<?php if($contact->relationship) { ?>
							<h6 class="font-bold mb-0 profile-menu-name d-md-down-none animated fadeIn"><?php echo $contact_fn ; ?>&nbsp;<?php echo $contact_ln ; ?></h6>
							<p class="text-secondary small d-md-down-none animated fadeIn"><?php echo stripslashes($contact->relationship) ?></p>
						<?php } else { ?>
							<h6 class="font-bold mb-0 mt-3 profile-menu-name d-md-down-none animated fadeIn"><?php echo $contact_fn ; ?>&nbsp;<?php echo $contact_ln ; ?></h6>
						<?php } ?>
					</li>
					<li class="nav-item">
						<a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"><i class="fal fa-fw fa-tachometer"></i> <span>Overview</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="tab-2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><i class="fal fa-fw fa-circle"></i> <span>Timeline (Future)</span></a>
					</li>
					
				</ul>
			</div>
			<div class="profile-content m-3">
				<div class="row">
					<div class="col-lg-8">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active p-0" id="tab1" role="tabpanel" aria-labelledby="tab-1">
								<?php include 'includes/reminders.php'; ?>
								<?php include 'includes/associations.php'; ?>
								<?php include 'includes/dates.php'; ?>
							</div>
							<div class="tab-pane fade p-0" id="tab2" role="tabpanel" aria-labelledby="tab-2">
								<div class="card">
									<div class="card-header">
									</div>
									<div class="card-block">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="mb-3">
							<a class="btn btn-lg btn-primary btn-block btn-icon btn-icon-left" href="<?php echo home_url( '/' ); ?>interests/?contact_ID=<?php echo $contact_ID ?>"><i class="fal fa-newspaper"></i> View Interests</a>
						</div>
						<?php include 'includes/contactnote.php'; ?>
						<?php include 'includes/contactinfo.php'; ?>
						<?php include 'includes/notes.php'; ?>
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