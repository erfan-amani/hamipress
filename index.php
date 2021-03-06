<?php
/**
 *
 * Main template file
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();?>

<div class="row">
    <div class="col-sm-9">
        <section id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php
                /**
                 * @hook hamipress_before_main_content
                 *
                 * @since 0.1
                 */
                do_action( 'hamipress_before_main_content' );

                if ( have_posts() ) :

                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/content' );
                    }

                    // Post navigation
                    hamipress_posts_navigation();

                else :
                    get_template_part( 'template-parts/content/content', 'none' );

                endif;

                /**
                 * @hook hamipress_after_home_main_content
                 * @since 0.1
                 */
                do_action('hamipress_after_home_main_content');
                ?>
            </main>
        </section>
    </div>

    <div class="col-sm-3">
	    <?php get_sidebar();?>
    </div>

</div><!-- end row -->

<?php get_footer();?>
