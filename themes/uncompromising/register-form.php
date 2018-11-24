<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="tml tml-register flex-row align-items-center" id="theme-my-login<?php $template->the_instance(); ?>">
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
					<?php $template->the_action_template_message( 'register' ); ?>
					<span class="color-danger"><?php $template->the_errors(); ?></span>
					<form class="mb-3" name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post">
						<?php if ( 'email' != $theme_my_login->get_option( 'login_type' ) ) : ?>
						<div class="tml-user-login-wrap form-group">
							<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username', 'theme-my-login' ); ?></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fal fa-user"></i></span>
								<input type="text" name="user_login" placeholder="Username" id="user_login<?php $template->the_instance(); ?>" class="form-control input" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" />
							</div><!-- .input-group -->
						</div>
						<?php endif; ?>

						<div class="tml-user-email-wrap form-group">
							<label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'E-mail', 'theme-my-login' ); ?></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fal fa-envelope"></i></span>
								<input type="text" name="user_email" placeholder="Email" id="user_email<?php $template->the_instance(); ?>" class="form-control input" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" />
							</div><!-- .input-group -->
						</div>

						<?php do_action( 'register_form' ); ?>

						<p class="tml-registration-confirmation" id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'Registration confirmation will be e-mailed to you.', 'theme-my-login' ) ); ?></p>

						<div class="tml-submit-wrap">
							<input class="btn btn-primary btn-lg" type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>" />
							<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />
							<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
							<input type="hidden" name="action" value="register" />
						</div>
					</form>
					<?php $template->the_action_links( array( 'register' => false ) ); ?>
				</div><!-- .card -->
			</div><!-- .col-## -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .flex-row -->
