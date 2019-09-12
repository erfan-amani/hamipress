<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */

if ( is_active_sidebar( 'footer' ) ) : ?>

    <aside class="widget-area" role="complementary">
		<?php
		if ( is_active_sidebar( 'footer' ) ) {
			?>
            <div class="widget-column footer-widget">
				<?php dynamic_sidebar( 'footer' ); ?>
            </div>
			<?php
		}
		?>
    </aside><!-- .widget-area -->

<?php endif; ?>
