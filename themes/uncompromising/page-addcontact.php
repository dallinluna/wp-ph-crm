<?php
/*
Template Name: Add Contact
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
<main id="main" class="usd-main">
	<div id="container" class="container-fluid">
		<div class="breadcrumb usd-breadcrumb">
			<?php the_title( '<h3 class="breadcrumb-page-title">', '</h3>' ); ?>
			<ol class="breadcrumb-list">
				<?php bcn_display(); ?>
			</ol>
		</div>
		<div id="animated" class="usd-content-area usd-content-area-standard animated fadeIn" role="main">
			<div class="card">
				<div class="card-header">
					Create Contact
				</div>
				<div class="card-block">
					<form class="needs-validation" name="addcontactform" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/addcontact.php" novalidate>
						<input type="hidden" name="ID" class="form-control" value="<?php echo $current_user->ID ; ?>">
						<div class="row">
							<div class="form-group col-lg-4">
								<label for="firstname">First Name*</label>
								<input id="firstname" name="firstname" class="form-control" type="text" placeholder="First Name" required>
								<div class="invalid-feedback">
									Please provide a first name
								</div>
							</div> <!-- End Col 4 -->
							<div class="form-group col-lg-4">
								<label for="lastname">Last Name*</label>
								<input id="lastname" name="lastname" class="form-control has-warning" type="text" placeholder="Last Name" required>
								<div class="invalid-feedback">
									Please provide a last name
								</div>
							</div> <!-- End Col 4 -->
							<div class="form-group col-lg-4">
								<label>Relationship*</label>
								<input id="relationship" name="relationship" class="form-control" type="text" placeholder="Relationship" required>
								<div class="invalid-feedback">
									Please indicate your relationship
								</div>
							</div> <!-- End Col 4 -->
						</div><!-- End Row -->
						<div class="row">
							<div class="form-group col-lg-4">
								<label>Profile Image URL</label>
								<input id="profile_img_url" name="profile_img_url" class="form-control" type="text" placeholder="Profile Image URL">
							</div> <!-- End Col 6 -->
							<div class="form-group col-lg-4">
								<label>Background Image URL</label>
								<input id="bg_img_url" name="bg_img_url" class="form-control" type="text" placeholder="Background Image URL">
							</div> <!-- End Col 6 -->
							<div class="form-group col-lg-4">
								<label>Short Description</label>
								<input id="description" name="description" class="form-control" type="text" placeholder="Description">
							</div> <!-- End Col 6 -->
						</div> <!-- End Row -->
						<div class="row">
							<div class="form-group col-lg-12">
								<label>Contact Notes</label>
								<textarea id="contact_notes" name="contact_notes" class="form-control" rows="3" type="text" placeholder="Notes"></textarea>
							</div><!-- End Col 12 -->
						</div> <!-- End Row -->
						<div class="row">
							<div class="form-group col-lg-6" required>
								<label>How often do you want to stay in touch?</label>
								<select name="contact_frequency" class="form-control">
									<option value="1">Once a Year</option>
									<option value="2">Twice a Year</option>
									<option value="3">Quarterly</option>
									<option value="4">Monthly</option>
									<option value="5">Weekly</option>
									<option value="6">Daily</option>
								</select>
								<div class="invalid-feedback">
									Please provide how often you would like to stay in touch
								</div>	
							</div><!-- End Col 12 -->
						</div> <!-- End Row -->
					
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary btn-lg float-right">Create Contact</button>
					</form> <!-- End Form -->
				</div>
			</div>
		</div> <!-- End Col 12 -->
	</div> <!-- End Row -->
</div> <!-- End Container -->
					
<?php } ?>			

<?php get_footer(); ?>
