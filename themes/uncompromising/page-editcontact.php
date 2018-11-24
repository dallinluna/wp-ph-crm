<?php
/*
Template Name: Edit Contact
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
$contact = $wpdb->get_row( 
"
SELECT *
FROM aud_contacts
WHERE contact_ID = $contact_ID
"
);
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
			<li class="breadcrumb-item"><?php echo $contact_fn ; ?>&nbsp;<?php echo $contact_ln ; ?></li>
		</ol>
	</div>
	<div id="animated" class="usd-content-area usd-content-area-standard animated fadeIn" role="main">
		<script>
			function validateeditcontactForm()
				{
				var firstname=document.forms["editcontactform"]["firstname"].value;
				var lastname=document.forms["editcontactform"]["lastname"].value;
				if (firstname=="" || lastname=="" || interaction_freq=="")
					{
					alert("Your contact needs a name");
					return false;
					}
				}
		</script>
		<form name="editcontactform" class="needs-validation" method="post" action="<?php echo home_url( '/' ); ?>wp-content/themes/uncompromising/db/editcontact.php" novalidate>

		<a class="btn btn-sm btn-outline-primary mb-3" href="<?php echo home_url(); ?>/contact?contact_ID=<?php echo $contact_ID ; ?>&view=next"><i class="fal fa-angle-left"></i>Back</a>
		
		<div class="card">
			<div class="card-block">
				<input type="hidden" name="ID" class="form-control" value="<?php echo $current_user->ID ; ?>">
				<input type="hidden" name="contact_ID" class="form-control" value="<?php echo $contact_ID ; ?>">
				<div class="row">
					<div class="form-group col-lg-4">
						<label>First Name*</label>
						<input id="firstname" name="firstname" class="form-control" type="text" placeholder="First Name" value="<?php echo $contact->firstname; ?>" required>
						<div class="invalid-feedback">
							Please provide a first name
						</div>
					</div><!-- End col 4-->
					<div class="form-group col-lg-4">
						<label>Last Name*</label>
						<input id="lastname" name="lastname" class="form-control" type="text" placeholder="Last Name" value="<?php echo $contact->lastname; ?>" required>
						<div class="invalid-feedback">
							Please provide a last name
						</div>
					</div><!-- End col 4-->
					<div class="col-lg-4">
						<label>Relationship*</label>
						<input id="relationship" name="relationship" class="form-control" type="text" value="<?php echo $contact->relationship ; ?>" required>
						<div class="invalid-feedback">
							Please indicate your relationship
						</div>
					</div><!-- End col 4-->
				</div><!-- End row-->
				<div class="row">
					<div class="form-group col-lg-4">
						<label>Background Image URL</label>
						<input id="bg_img_url" name="bg_img_url" class="form-control" type="text" value="<?php echo $contact->bg_img_url ; ?>">
					</div><!-- End col 4-->
					<div class="form-group col-lg-4">
						<label>Profile Image URL</label>
						<input id="profile_img_url" name="profile_img_url" class="form-control" type="text" value="<?php echo $contact->profile_img_url ; ?>">
					</div><!-- End col 4-->
					<div class="col-lg-4">
						<label>Short Description</label>
						<input id="description" name="description" class="form-control" type="text" value="<?php echo $contact->description ; ?>">
					</div><!-- End col 4-->
				</div><!-- End row-->
				<div class="row">
					<div class="form-group col-lg-12">
						<label>Contact Notes</label>
						<textarea id="contact_notes" name="contact_notes" class="form-control" rows="3" type="text" placeholder="Notes"><?php echo stripslashes($contact->contact_notes) ; ?></textarea>
					</div><!-- End col 12-->
				</div><!-- End row-->
				<?php
				switch($contact->contact_frequency){
						case 0:
							$contact_frequency_text = "";
							break;
						case 1:
							$contact_frequency_text = "Once a Year";
							break;
						case 2:
							$contact_frequency_text = "Twice a Year";
							break;
						case 3:
							$contact_frequency_text = "Quarterly";
							break;
						case 4:
							$contact_frequency_text = "Monthly";
							break;
						case 5:
							$contact_frequency_text = "Weekly";
							break;
							case 6:
							$contact_frequency_text = "Daily";
							break;
					}
				?>
				<div class="row">
					<div class="form-group col-lg-6">
						<label>How often do you want to stay in touch?</label>
						<select name="contact_frequency" class="form-control" required>
							<option value="<?php echo $contact->contact_frequency; ?>"><?php echo $contact_frequency_text; ?></option>
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
				<button type="submit" class="btn btn-primary btn-lg float-right">Update</button>
			</div>
		</div>
	</div>
</div><!-- End Container-->
					
<?php } ?>			

<?php get_footer(); ?>
