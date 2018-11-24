<?php
/**
 * Template part for displaying gallery posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row align-items-center">
		<div class="col-12">
			<div class="pb-3">
				<header class="entry-header">
					<?php
					/*
					if ( is_sticky() && is_home() ) {
						echo uncompromising_get_svg( array( 'icon' => 'thumb-tack' ) );
					}
					*/
					?>
					<?php

						if ( is_single() ) {
							the_title( '<h1 class="h3 font-bold color-black entry-title">', '</h1>' );
						} elseif ( is_front_page() && is_home() ) {
							the_title( '<h3 class="h3 font-bold color-black entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
						} else {
							the_title( '<h2 class="h3 font-bold color-black entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}

						if ( 'post' === get_post_type() ) {
							echo '<div class="entry-meta">';
								if ( is_single() ) {
									uncompromising_posted_on();
								} else {
									echo uncompromising_time_link();
									//uncompromising_edit_link();
								}
							echo '</div><!-- .entry-meta -->';
						};
					?>
				</header><!-- .entry-header -->
			</div><!-- .pb-# -->
		</div><!-- .col-## -->
	</div><!-- .row -->
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-block">

					<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && ! get_post_gallery() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'uncompromising-featured-image' ); ?>
							</a>
						</div><!-- .post-thumbnail -->
					<?php endif; ?>

					<div class="entry-content">

						<?php
						if ( ! is_single() ) {

							// If not a single post, highlight the gallery.
							if ( get_post_gallery() ) {
								echo '<div class="entry-gallery">';
									echo get_post_gallery();
								echo '</div>';
							};

						};

						if ( is_single() || ! get_post_gallery() ) {

							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'uncompromising' ),
								get_the_title()
							) );

							wp_link_pages( array(
								'before'      => '<div class="page-links">' . __( 'Pages:', 'uncompromising' ),
								'after'       => '</div>',
								'link_before' => '<span class="page-number">',
								'link_after'  => '</span>',
							) );

						};
						?>

					</div><!-- .entry-content -->

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

</article><!-- #post-## -->
