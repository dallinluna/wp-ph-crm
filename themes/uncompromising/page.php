<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Product Heartbeat
 * @subpackage Uncompromising
 * @since 1.0
 * @version 1.0
 */

if ( !is_user_logged_in()) {
	wp_redirect( home_url( '/login' ) );  /* this is where user will be redirected if he is not logged in. change to desired url */
} else {

get_header(); ?>

<main id="main" class="usd-main">
	<div id="container" class="container-fluid">
		<div id="animated" class="animated fadeIn" role="main">
			<div class="breadcrumb usd-breadcrumb">
				<?php the_title( '<h3 class="breadcrumb-page-title">', '</h3>' ); ?>
				<ol class="breadcrumb-list">
					<?php bcn_display(); ?>
				</ol>
			</div>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				/*if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;*/

			endwhile; // End of the loop.
			?>

		</div><!-- #animated -->
	</div><!-- #container -->
</main><!-- #main -->

<?php get_footer(); }
