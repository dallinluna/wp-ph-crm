<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 * @version 1.0
 */

?>

<section class="no-results not-found">
	<div class="row align-items-center">
		<div class="col-12">
			<div class="pb-3">
				<header class="entry-header">
					<h1 class="page-title"><?php _e( 'Nothing Found', 'uncompromising' ); ?></h1>
				</header><!-- .entry-header -->
			</div><!-- .pb-# -->
		</div><!-- .col-## -->
	</div><!-- .row -->
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-block">

					<div class="page-content">
						<?php
						if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

							<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'uncompromising' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

						<?php else : ?>

							<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'uncompromising' ); ?></p>
							<?php
								get_search_form();

						endif; ?>
					</div><!-- .page-content -->

					<?php
					/*
					if ( is_single() ) {
						uncompromising_entry_footer();
					}
					*/
					?>

				</div><!-- .card-block -->
			</div><!-- .card -->
			<div class="card">
				<div class="card-block">
					<?php
					the_post_navigation( array(
							'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'uncompromising' ) . '</span><span class="float-left"><span class="nav-title-icon-wrapper"><i class="fal fa-arrow-left"></i></span> <span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'uncompromising' ) . '</span></span>',
							'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'uncompromising' ) . '</span><span class="float-right"><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'uncompromising' ) . '</span> <i class="fal fa-arrow-right"></i></span></span></span>',
						) );
					?>
				</div><!-- .card-block -->
			</div><!-- .card -->
			<div class="card">
				<div class="card-block">
					<div class="fb-comments" data-mobile=true data-href="<?php the_permalink(); ?>" data-numposts="5"></div>
				</div><!-- .card-block -->
			</div><!-- .card -->
		</div><!-- .col-## -->
		<div class="col-lg-4">
			<div class="card">
				<div class="card-block">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!-- .card-block -->
			</div><!-- .card -->
		</div><!-- .col-## -->
	</div><!-- .row -->
</section><!-- .no-results -->
