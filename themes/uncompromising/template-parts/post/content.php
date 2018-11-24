<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 * @version 1.2
 */

?>

<article class="article-header entry-header">

	<?php if ( has_post_thumbnail() ) { ?>

	<div class="row">
		<div class="col-lg-8">
			<header class="entry-header">
				<div class="post-image-header p-3 mb-3" style="position: relative; background: linear-gradient(to top, rgba(0, 0, 0, 0.6) 20%, rgba(0, 0, 0, 0) 60%), url(<?php the_post_thumbnail_url('full'); ?>); background-size: cover; height: 300px;">
					<div class="post-image-header-caption">  
						<?php
						if ( is_single() ) {
							the_title( '<h1 class="h3 font-bold color-white entry-title">', '</h1>' );
						} elseif ( is_front_page() && is_home() ) {
							the_title( '<h3 class="h3 font-bold color-white entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
						} else {
							the_title( '<h2 class="h3 font-bold color-white entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}
						?>
						<?php
						if ( 'post' === get_post_type() ) {
							echo '<div class="entry-meta color-white">';
								if ( is_single() ) {
									uncompromising_posted_on();
								} else {
									echo uncompromising_time_link();
									//uncompromising_edit_link();
								};
							echo '</div><!-- .entry-meta -->';
						};
						?>
					</div><!--.post-image-header-caption -->
				</div><!-- .post-image-header -->
			</header><!-- .entry-header -->
			<div class="card">
				<div class="card-block">

					<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'uncompromising' ),
						get_the_title()
					) );

					/*wp_link_pages( array(
						'before'      => '<div class="page-links">' . __( 'Pages:', 'uncompromising' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) );*/
					?>

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
			<div class="mb-3">
				<a href="/product/11-essentials/" class="btn btn-lg btn-primary btn-block btn-icon btn-icon-left"><i class="fal fa-download"></i> Free Download</a>
			</div><!-- .mb-# -->
			<div class="card">
				<div class="card-block">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!-- .card-block -->
			</div><!-- .card -->
		</div><!-- .col-## -->
	</div><!-- .row -->

	<?php } else { ?>

	<div class="row align-items-center">
		<div class="col-lg-8">
			<div class="pb-3">
				<?php
				if ( is_single() ) {
					the_title( '<h1 class="h3 font-bold color-black entry-title">', '</h1>' );
				} elseif ( is_front_page() && is_home() ) {
					the_title( '<h3 class="h3 font-bold color-black entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				} else {
					the_title( '<h2 class="h3 font-bold color-black entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				?>
				<?php
				if ( 'post' === get_post_type() ) {
					echo '<div class="entry-meta">';
						if ( is_single() ) {
							uncompromising_posted_on();
						} else {
							echo uncompromising_time_link();
							//uncompromising_edit_link();
						};
					echo '</div><!-- .entry-meta -->';
				};
				?>
			</div><!-- .pb-# -->
		</div><!-- .col-## -->
		<div class="col-lg-4">
			<div class="mb-md-3 mb-sm-3 mb-xs-3">
				<a href="/product/11-essentials/" class="btn btn-lg btn-primary btn-block btn-icon btn-icon-left"><i class="fal fa-download"></i> Free Download</a>
			</div><!-- spacing -->
		</div><!-- .col-## -->
	</div><!-- .row -->
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-block">

					<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'uncompromising' ),
						get_the_title()
					) );

					/*wp_link_pages( array(
						'before'      => '<div class="page-links">' . __( 'Pages:', 'uncompromising' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) );*/
					?>

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

	<?php } ?>
</article>
