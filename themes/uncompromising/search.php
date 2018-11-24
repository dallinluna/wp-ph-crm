<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<header class="page-header">
						<?php if ( have_posts() ) : ?>
							<h1 class="h4 page-title mb-3"><?php printf( __( 'Search Results for: "%s"', 'uncompromising' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						<?php else : ?>
							<h1 class="h4 page-title mb-3"><?php _e( 'Nothing Found :-(', 'uncompromising' ); ?></h1>
						<?php endif; ?>
					</header><!-- .page-header -->
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

									/**
									* Run the loop for the search to output the results.
									* If you want to overload this in a child theme then include a file
									* called content-search.php and that will be used instead.
									*/
									get_template_part( 'template-parts/post/content', 'excerpt' );

								endwhile; // End of the loop.

								the_posts_pagination( array(
									'prev_text' => '<i class="fal fa-arrow-left"></i> <span class="screen-reader-text">' . __( 'Previous page', 'uncompromising' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'uncompromising' ) . '</span><i class="fal fa-arrow-right"></i>',
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'uncompromising' ) . ' </span>',
								) );

							else : ?>

								<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'uncompromising' ); ?></p>
								<?php
									get_search_form();

							endif;
							?>

						</div><!-- .card-block -->
					</div><!-- .card -->
				</div><!-- .col-## -->
				<div class="col-lg-4">
					<div class="card">
						<div class="card-block">
							<?php get_sidebar(); ?>
						</div><!-- .card -->
					</div><!-- .card-block -->
				</div><!-- .col-## -->
			</div><!-- .row -->
		</div><!-- #main -->
	</div><!-- #container -->
</main><!-- #main -->

<?php get_footer();
