<?php
/**
 * The template for displaying Current Discussion on posts
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */

/* Get data from current discussion on post. */
$discussion    = hamipress_get_discussion_data();
$has_responses = $discussion->responses > 0;

if ( $has_responses ) {
	/* translators: %1(X comments)$s */
	$meta_label = sprintf( _n( '%d Comment', '%d Comments', $discussion->responses, HAMIPRESS_TEXTDOMAIN ), $discussion->responses );
} else {
	$meta_label = __( 'No comments', HAMIPRESS_TEXTDOMAIN );
}
?>

<div class="discussion-meta">
	<?php
	if ( $has_responses ) {
		hamipress_discussion_avatars_list( $discussion->authors );
	}
	?>
	<p class="discussion-meta-info">
		<?php echo hamipress_get_icon_svg('ui', 'comment', 24 ); ?>
		<span><?php echo esc_html( $meta_label ); ?></span>
	</p>
</div><!-- .discussion-meta -->
