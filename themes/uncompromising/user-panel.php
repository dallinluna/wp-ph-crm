<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="tml tml-user-panel flex-row align-items-center" id="theme-my-login<?php $template->the_instance(); ?>">
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
					<?php //if ( $template->options['show_gravatar'] ) : ?>
					<!--<div class="tml-user-avatar"><?php //$template->the_user_avatar(); ?></div>-->
					<?php //endif; ?>

					<?php //$template->the_user_links(); ?>

					<p>You are currently logged in. <a href="<?php echo wp_logout_url(); ?>">Logout?</a></p>
					<a href="/" class="btn btn-primary btn-lg"><i class="fa fa-home"></i> Go to Product Heartbeat</a>

					<?php do_action( 'tml_user_panel' ); ?>
				</div><!-- .card -->
			</div><!-- .col-## -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .flex-row -->
