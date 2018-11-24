<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="tml tml-profile" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'profile' ); ?>
	<?php $template->the_errors(); ?>
	<form id="your-profile" action="<?php $template->the_action_url( 'profile', 'login_post' ); ?>" method="post">
		<?php wp_nonce_field( 'update-user_' . $current_user->ID ); ?>
		
			<input type="hidden" name="from" value="profile" />
			<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
		

		<div class="card">
			<div class="card-header">
				<?php _e( 'Personal Options', 'theme-my-login' ); ?>
			</div>
			<div class="card-block">
				<div class="list mb-0">
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<span class="d-block"><?php _e( 'Toolbar', 'theme-my-login' )?></span>
											<small><?php _e( 'Show Toolbar when viewing site', 'theme-my-login' ); ?></span></small>
										</dt>
										<dd class="col-md-10">
										</dd>
									</dl>
								</div>
							</div>
							<label class="switch switch-primary switch-default mb-0 float-right switch-text">
								<input type="checkbox" class="switch-input" name="admin_bar_front" id="admin_bar_front" value="1"<?php checked( _get_admin_bar_pref( 'front', $profileuser->ID ) ); ?> />
								<span class="switch-label" data-on="On" data-off="Off"></span>
								<span class="switch-handle"></span>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<?php _e( 'Name', 'theme-my-login' ); ?>
			</div>
			<div class="card-block">
				<div class="list mb-0">
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="user_login"><?php _e( 'Username', 'theme-my-login' ); ?></label>
										</dt>
										<dd class="col-md-10">
											<input type="text" name="user_login" class="form-control" id="user_login" value="<?php echo esc_attr( $profileuser->user_login ); ?>" disabled="disabled" class="regular-text" /> <span class="description"><?php _e( 'Usernames cannot be changed.', 'theme-my-login' ); ?></span>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="first_name"><?php _e( 'First Name', 'theme-my-login' ); ?></label>
										</dt>
										<dd class="col-md-10">
											<input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo esc_attr( $profileuser->first_name ); ?>" class="regular-text" />	
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="last_name"><?php _e( 'Last Name', 'theme-my-login' ); ?></label>
										</dt>
										<dd class="col-md-10">
											<input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo esc_attr( $profileuser->last_name ); ?>" class="regular-text" />
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="nickname"><?php _e( 'Nickname', 'theme-my-login' ); ?> <span class="description"><?php _e( '(required)', 'theme-my-login' ); ?></span></label>
										</dt>
										<dd class="col-md-10">
											<input type="text" name="nickname" class="form-control" id="nickname" value="<?php echo esc_attr( $profileuser->nickname ); ?>" class="regular-text" />
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="display_name"><?php _e( 'Display name publicly as', 'theme-my-login' ); ?></label>
										</dt>
										<dd class="col-md-10">
											<select name="display_name" class="form-control" id="display_name">
											<?php
												$public_display = array();
												$public_display['display_nickname']  = $profileuser->nickname;
												$public_display['display_username']  = $profileuser->user_login;

												if ( ! empty( $profileuser->first_name ) )
													$public_display['display_firstname'] = $profileuser->first_name;

												if ( ! empty( $profileuser->last_name ) )
													$public_display['display_lastname'] = $profileuser->last_name;

												if ( ! empty( $profileuser->first_name ) && ! empty( $profileuser->last_name ) ) {
													$public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
													$public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;
												}

												if ( ! in_array( $profileuser->display_name, $public_display ) )// Only add this if it isn't duplicated elsewhere
													$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;

												$public_display = array_map( 'trim', $public_display );
												$public_display = array_unique( $public_display );

												foreach ( $public_display as $id => $item ) {
											?>
												<option <?php selected( $profileuser->display_name, $item ); ?>><?php echo $item; ?></option>
											<?php
												}
											?>
											</select>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<!-- /.item:last-child -->
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<?php _e( 'Contact Info', 'theme-my-login' ); ?>
			</div>
			<div class="card-block">
				<div class="list mb-0">
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="email"><?php _e( 'E-mail', 'theme-my-login' ); ?> <span class="description"><?php _e( '(required)', 'theme-my-login' ); ?></span></label>
										</dt>
										<dd class="col-md-10">
											<input type="text" class="form-control" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ); ?>" class="regular-text" />
											<?php $new_email = get_option( $current_user->ID . '_new_email' );
											if ( $new_email && $new_email['newemail'] != $current_user->user_email ) : ?>
											<p>
												<?php
												printf(
												__( 'There is a pending change of your e-mail to %1$s. <a href="%2$s">Cancel</a>', 'theme-my-login' ),
												'<code>' . $new_email['newemail'] . '</code>',
												esc_url( self_admin_url( 'profile.php?dismiss=' . $current_user->ID . '_new_email' ) )
												); 
												?>
											</p>
											<?php endif; ?>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="url"><?php _e( 'Website', 'theme-my-login' ); ?></label>
										</dt>
										<dd class="col-md-10">
										<input type="text" class="form-control" name="url" id="url" value="<?php echo esc_attr( $profileuser->user_url ); ?>" class="regular-text code" />
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<!-- /.item:last-child -->
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<?php _e( 'About Yourself', 'theme-my-login' ); ?>
			</div>
			<div class="card-block">
				<div class="list mb-0">
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="description"><?php _e( 'Biographical Info', 'theme-my-login' ); ?></label>
										</dt>
										<dd class="col-md-10">
											<textarea name="description" id="description" class="form-control" rows="5" cols="30"><?php echo esc_html( $profileuser->description ); ?></textarea>
											<small class="description"><?php _e( 'Share a little biographical information to fill out your profile. This may be shown publicly.', 'theme-my-login' ); ?></small>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<!-- /.item:last-child -->
				</div>
			</div>
		</div>

		<?php
		$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
		if ( $show_password_fields ) :
		?>
		
		<div class="card">
			<div class="card-header">
				<?php _e( 'Account Management', 'theme-my-login' ); ?>
			</div>
			<div class="card-block">
				<div class="list mb-0">
					<div class="item item-bottom-border">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<dl class="row">
										<dt class="col-md-2 text-md-right">
											<label for="pass1"><?php _e( 'New Password', 'theme-my-login' ); ?></label>
										</dt>
										<dd class="col-md-10">
											<table class="tml-form-table w-100">
												<tr id="password" class="user-pass1-wrap">
													<th></th>
													<td>
														<input class="hidden" value=" " /><!-- #24364 workaround -->
														<button type="button" class="btn btn-secondary btn-sm wp-generate-pw hide-if-no-js"><?php _e( 'Generate Password', 'theme-my-login' ); ?></button>
														<div class="wp-pwd hide-if-js">
															<span class="password-input-wrapper">
																<input type="password" name="pass1" id="pass1" class="form-control" value="" autocomplete="off" data-pw="<?php echo esc_attr( wp_generate_password( 24 ) ); ?>" aria-describedby="pass-strength-result" />
															</span>
															<div style="display:none" class="text-left" id="pass-strength-result" aria-live="polite"></div>
															<button type="button" class="btn btn-sm btn-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Hide password', 'theme-my-login' ); ?>">
																<span class="dashicons dashicons-hidden"></span>
																<span class="text"><?php _e( 'Hide', 'theme-my-login' ); ?></span>
															</button>
															<button type="button" class="btn btn-secondary btn-link btn-sm wp-cancel-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Cancel password change', 'theme-my-login' ); ?>">
																<span class="text"><?php _e( 'Cancel', 'theme-my-login' ); ?></span>
															</button>
														</div>
													</td>
												</tr>
												<tr class="user-pass2-wrap hide-if-js">
													<th scope="row"><label for="pass2"><?php _e( 'Repeat New Password', 'theme-my-login' ); ?></label></th>
													<td>
													<input name="pass2" type="password" id="pass2" class="regular-text" value="" autocomplete="off" />
													<p class="description"><?php _e( 'Type your new password again.', 'theme-my-login' ); ?></p>
													</td>
												</tr>
												<tr class="pw-weak">
													<td>
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="pw_weak" class="pw-checkbox custom-control-input" />
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description"><?php _e( 'Confirm use of weak password', 'theme-my-login' ); ?></span>
														</label>
													</td>
												</tr>
											</table>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<!-- /.item:last-child -->
				</div>
			</div>
		</div>

		<?php endif; ?>

		<?php do_action( 'personal_options', $profileuser ); ?>
		<?php do_action( 'profile_personal_options', $profileuser ); ?>
		<?php do_action( 'show_user_profile', $profileuser ); ?>

		<p class="tml-submit-wrap">
			<input type="hidden" name="action" value="profile" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />
			<input type="submit" class="btn btn-primary btn-lg" value="<?php esc_attr_e( 'Update Profile', 'theme-my-login' ); ?>" name="submit" id="submit" />
		</p>
	</form>
</div>
