<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */

?>

</div><!-- #content -->

<footer id="nastfooter" class="site-footer">
	<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

	<div class="site-info">
		<?php $blog_info = get_bloginfo( 'name' ); ?>
		<?php if ( ! empty( $blog_info ) ) : ?>
			<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
		<?php endif; ?>
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', HAMIPRESS_TEXTDOMAIN ) ); ?>" class="imprint">
			<?php
			/* translators: %s: WordPress. */
			printf( __( 'Proudly powered by %s.', HAMIPRESS_TEXTDOMAIN ), 'WordPress' );
			?>
		</a>
		<?php
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		}
		?>
		<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
			<nav class="footer-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
