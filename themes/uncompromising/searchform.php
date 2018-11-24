<?php
/**
 * Template for displaying search forms in Uncompromising
 *
 * @package Product Heartbeat
 * @subpackage Uncompromising
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		Search
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'uncompromising' ); ?></span>
	</label><!-- label -->
	<div class="input-group">
		<input type="search" id="<?php echo $unique_id; ?>" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'uncompromising' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<span class="input-group-btn">
			<button type="submit" class="btn btn-secondary search-submit"><i class="far fa-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'uncompromising' ); ?></span></button>
		</span><!-- .input-group-btn -->
	</div><!-- .input-group -->
</form>
