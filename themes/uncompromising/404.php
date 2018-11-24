<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
		<div id="animated" class="animated fadeIn" role="main">
			<div class="card">
				<div class="card-block">

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'uncompromising' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'uncompromising' ); ?></p>

							<?php get_search_form(); ?>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div><!-- .card-block -->
			</div><!-- .card -->
		</div><!-- #animated -->
	</div><!-- #container -->
</main><!-- #main -->

<?php get_footer();
