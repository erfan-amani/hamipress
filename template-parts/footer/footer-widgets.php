<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */

if ( is_active_sidebar( 'footer' ) ) : ?>

<aside class="widget-area row">
     <?php dynamic_sidebar( 'footer' ); ?>
</aside><!-- .widget-area -->

<?php endif; ?>
