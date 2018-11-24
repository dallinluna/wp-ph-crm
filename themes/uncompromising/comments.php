<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>



<div id="comments" class="comments-area">
	<div class="card">
		<div class="card-block">

			<?php
			// You can start editing here -- including this comment!
			if ( have_comments() ) : ?>
				<h4 class="font-bold text-uppercase comments-title">
					<?php
					$comments_number = get_comments_number();
					if ( '1' === $comments_number ) {
						/* translators: %s: post title */
						printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'uncompromising' ), get_the_title() );
					} else {
						printf(
							/* translators: 1: number of comments, 2: post title */
							_nx(
								'%1$s Reply to &ldquo;%2$s&rdquo;',
								'%1$s Replies to &ldquo;%2$s&rdquo;',
								$comments_number,
								'comments title',
								'uncompromising'
							),
							number_format_i18n( $comments_number ),
							get_the_title()
						);
					}
					?>
				</h4>

				<ol class="comment-list">
					<?php
						wp_list_comments( array(
							'avatar_size' => 100,
							'style'       => 'ol',
							'short_ping'  => true,
							'reply_text'  => uncompromising_get_svg( array( 'icon' => 'mail-reply' ) ) . __( 'Reply', 'uncompromising' ),
						) );
					?>
				</ol>

				<?php the_comments_pagination( array(
					'prev_text' => uncompromising_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'uncompromising' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'uncompromising' ) . '</span>' . uncompromising_get_svg( array( 'icon' => 'arrow-right' ) ),
				) );

			endif; // Check for have_comments().

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

				<p class="no-comments"><?php _e( 'Comments are closed.', 'uncompromising' ); ?></p>
			<?php
			endif;

			$args = array(
				'fields' => apply_filters(
					'comment_form_default_fields', array(
						'author' =>'<p class="comment-form-author">' . 
									'<label for="author">' . __( 'Your Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
									'<input id="author" class="form-control" placeholder="Your Name" name="author" type="text" value="' .
									esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.					  
									'</p>',
						'email'  => '<p class="comment-form-email">' . 
									'<label for="email">' . __( 'Your Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
									'<input id="email" class="form-control" placeholder="your-email@example.com" name="email" type="text" value="' . 
									esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'  .
									'</p>'
					)
				),
				'comment_field' => '<p class="comment-form-comment">' .
					'<label for="comment">' . __( 'Comment:' ) . '</label>' .
					'<textarea id="comment" class="form-control" name="comment" placeholder="Express your thoughts, idea or feedback" cols="45" rows="5" aria-required="true"></textarea>' .
					'</p>',
				'comment_notes_after' => '',
				'title_reply' => '<h4 class="font-bold">Post a Comment</h4>'
			);

			comment_form($args);

			?>
		</div>
	</div>
</div><!-- #comments -->
