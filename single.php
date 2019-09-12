<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Hamipress
 * @since 0.1
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', HAMIPRESS_TEXTDOMAIN ) . '</span> ' .
							               '<span class="screen-reader-text">' . __( 'Next post:', HAMIPRESS_TEXTDOMAIN ) . '</span> <br/>' .
							               '<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', HAMIPRESS_TEXTDOMAIN ) . '</span> ' .
							               '<span class="screen-reader-text">' . __( 'Previous post:', HAMIPRESS_TEXTDOMAIN ) . '</span> <br/>' .
							               '<span class="post-title">%title</span>',
						)
					);
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
