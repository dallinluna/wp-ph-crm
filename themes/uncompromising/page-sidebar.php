<?php
/**
 * Template Name: Sidebar
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
		<div id="animated" class="animated fadeIn" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page-sidebar' );

				// If comments are open or we have at least one comment, load up the comment template.
				/*if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;*/

			endwhile; // End of the loop.
			?>
				
		</div><!-- #animated -->
	</div><!-- #container -->
</main><!-- #main -->

<?php get_footer();
