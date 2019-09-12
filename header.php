<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="">

	<header id="masthead" class="site-header">

		<div class="site-branding-container container">
			<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		</div><!-- .site-branding-container -->

	</header><!-- #masthead -->

	<div id="content" class="site-content container">
