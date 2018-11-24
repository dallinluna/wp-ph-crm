<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Product Heartbeat
 * @subpackage Uncompromising
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
			<div class="row">
				 <div class="col-12">
					<?php if ( is_home() && ! is_front_page() ) : ?>
						<header class="page-header">
							<h4 class="font-bold text-uppercase page-title mb-"=><?php single_post_title(); ?></h4>
						</header><!-- .page-header -->
					<?php else : ?>
					<header class="page-header">
						<h2 class="page-title"><?php _e( 'Posts', 'uncompromising' ); ?></h2>
					</header><!-- .page-header -->
					<?php endif; ?>
				</div><!-- .col-## -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-block">

							<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/
									get_template_part( 'template-parts/page/content', 'blog' );

								endwhile;

								the_posts_pagination( array(
									'prev_text' => uncompromising_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'uncompromising' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'uncompromising' ) . '</span>' . uncompromising_get_svg( array( 'icon' => 'arrow-right' ) ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'uncompromising' ) . ' </span>',
								) );

							else :

								get_template_part( 'template-parts/post/content', 'none' );

							endif;
							?>
						</div><!-- .card-block -->
					</div><!-- .card -->
				</div><!-- .col-## -->
				<div class="col-lg-4">
					<div class="card">
						<div class="card-block">
							<?php get_sidebar(); ?>
						</div><!-- .card-block -->
					</div><!-- .card -->
				</div><!-- .col-## -->
			</div><!-- .row -->
		</div><!-- #animated -->
	</div><!-- #container -->
</main><!-- .main -->

<?php get_footer();
