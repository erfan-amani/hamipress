<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */
?>
<div class="site-branding">

	<?php if ( has_nav_menu( 'action-bar-menu' ) ) : ?>
        <nav class="actiona-bar-menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'action-bar-menu',
					'menu_class'     => 'action-bar-menu',
					'depth'          => 1,
				)
			);
			?>
        </nav><!-- .social-navigation -->
	<?php endif; ?>


	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>
	<?php $blog_info = get_bloginfo( 'name' ); ?>
	<?php if ( ! empty( $blog_info ) ) : ?>
		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) :
		?>
		<p class="site-description">
			<?php echo $description; ?>
		</p>
	<?php endif; ?>
	<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary-menu-1',
					'menu_class'     => 'primary-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	<?php endif; ?>

</div><!-- .site-branding -->
