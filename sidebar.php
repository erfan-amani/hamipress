<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */

if ( is_active_sidebar( 'sidebar' ) ) : ?>

	<aside id="mast-sidebar" class="sidebar widget-area" role="complementary">
		<?php
		if ( is_active_sidebar( 'sidebar' ) ) {
			?>
			<div class="widget-column footer-widget">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
			<?php
		}
		?>
	</aside><!-- .widget-area -->

<?php else: get_search_form();?>
<?php endif; ?>
