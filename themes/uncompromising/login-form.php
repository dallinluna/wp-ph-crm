<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="tml tml-login flex-row align-items-center" id="theme-my-login<?php $template->the_instance(); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="card-group">
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
						<?php $template->the_action_template_message( 'login' ); ?>
						<span class="color-danger"><?php $template->the_errors(); ?></span>
						<form class="mb-3" name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login', 'login_post' ); ?>" method="post">
							<div class="form-group tml-user-login-wrap">
								<label for="user_login<?php $template->the_instance(); ?>"><?php
									if ( 'username' == $theme_my_login->get_option( 'login_type' ) ) {
										_e( 'Username', 'theme-my-login' );
									} elseif ( 'email' == $theme_my_login->get_option( 'login_type' ) ) {
										_e( 'E-mail', 'theme-my-login' );
									} else {
										_e( 'Username or E-mail', 'theme-my-login' );
									}
								?></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fal fa-user"></i></span>
									<input type="text" placeholder="Email" name="log" id="user_login<?php $template->the_instance(); ?>" class="form-control input" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
								</div><!-- .input-group -->
							</div><!-- .form-group -->

							<div class="tml-user-pass-wrap form-group">
								<label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password', 'theme-my-login' ); ?></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fal fa-lock"></i></span>
									<input type="password" placeholder="Password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="form-control input" value="" size="20" autocomplete="off" />
								</div><!-- .input-group -->
							</div><!-- .form-group -->

							<?php do_action( 'login_form' ); ?>

							<div class="tml-rememberme-submit-wrap">
								<div class="form-group tml-rememberme-wrap">
									<input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
									<span for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me', 'theme-my-login' ); ?></span>
								</div>

								<div class="tml-submit-wrap">
									<input class="btn btn-primary btn-lg" type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In', 'theme-my-login' ); ?>" />
									<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
									<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
									<input type="hidden" name="action" value="login" />
								</div>
							</div>
						</form>
						<?php $template->the_action_links( array( 'login' => false ) ); ?>
					</div><!-- .card -->
				</div><!-- .card-group -->
			</div><!-- .col-## -->
		</div><!-- .row -->
	</div><!-- .container -->
</div>
