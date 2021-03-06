<?php
/**
 * Displays content for front page
 *
 * @package Product Heartbeat
 * @subpackage Uncompromising
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'uncompromising-panel ' ); ?> >

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php //the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php //uncompromising_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'uncompromising' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->
		</div><!-- .wrap -->
	</div><!-- .panel-content -->
</article><!-- #post-## -->
