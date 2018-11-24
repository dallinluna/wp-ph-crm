<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<main id="main" class="usd-main">
	<ol class="usd-breadcrumb breadcrumb">
		<?php bcn_display(); ?>
	</ol>
	<div id="container" class="container-fluid">
		<div id="animated" class="animated fadeIn">

			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h4 class="font-bold text-uppercase mb-3 page-title">', '</h4>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->
			<?php endif; ?>

			<div class="row">
				<div class="col-lg-8">

					<div class="card">
						<div class="card-block">

							<?php
							if ( have_posts() ) : ?>
								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/
									get_template_part( 'template-parts/post/content', 'excerpt' );

								endwhile;
							?>
						</div><!-- .card-block -->
					</div><!-- card -->

					<?php

						the_posts_pagination( array(
							'prev_text' => '<i class="fal fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'uncompromising' ) . '</span>',
							'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'uncompromising' ) . '</span><i class="fal fa-arrow-right"></i>',
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'uncompromising' ) . ' </span>',
						) );

					else :

						get_template_part( 'template-parts/post/content', 'none' );

					endif; ?>

				</div><!-- .col-# -->
				<div class="col-lg-4">
					<div class="card">
						<div class="card-block">
							<?php get_sidebar(); ?>
						</div><!-- .card -->
					</div><!-- .card-block -->
				</div><!-- .col-# -->
			</div><!-- .row -->
		</div><!-- #animated -->
	</div><!-- #container -->
</main><!-- #main -->

<?php get_footer();
