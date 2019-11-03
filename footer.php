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

</div><!-- #content container -->

    <footer id="main-footer" class="site-footer">
        <div class="container">
            <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
