<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="tml tml-lostpassword flex-row align-items-center" id="theme-my-login<?php $template->the_instance(); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="card p-4">
					<div class="text-left mb-3">
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
					</div>
					<?php $template->the_action_template_message( 'lostpassword' ); ?>
					<span class="color-danger"><?php $template->the_errors(); ?></span>
					<form name="lostpasswordform" id="lostpasswordform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'lostpassword', 'login_post' ); ?>" method="post">
						<div class="tml-user-login-wrap form-group">
							<label for="user_login<?php $template->the_instance(); ?>"><?php
							if ( 'email' == $theme_my_login->get_option( 'login_type' ) ) {
								_e( 'E-mail:', 'theme-my-login' );
							} else {
								_e( 'Username or E-mail:', 'theme-my-login' );
							} ?></label>
							<input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="form-control input" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" />
						</div>

						<?php do_action( 'lostpassword_form' ); ?>

						<p class="tml-submit-wrap">
							<input class="btn btn-primary btn-lg" type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Get New Password', 'theme-my-login' ); ?>" />
							<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'lostpassword' ); ?>" />
							<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
							<input type="hidden" name="action" value="lostpassword" />
						</p>
					</form>
					<?php $template->the_action_links( array( 'lostpassword' => false ) ); ?>
				</div><!-- .card -->
			</div><!-- .col-## -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .flex-row -->
