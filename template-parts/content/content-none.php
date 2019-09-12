<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */

?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php _e( 'Nothing Found', HAMIPRESS_TEXTDOMAIN ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
		<?php
        if ( is_search() ) :
			?>

            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', HAMIPRESS_TEXTDOMAIN ); ?></p>
			<?php
			get_search_form();

		else :
			?>

            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', HAMIPRESS_TEXTDOMAIN ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
