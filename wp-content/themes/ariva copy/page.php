<?php
    /**
    * page.php
    * The main post loop in ARIVA
    * @author Vulinhpc
    * @package ARIVA
    * @since 1.0.0
    */
    get_header();
    global $ts_ariva;
?>
<?php get_template_part('content-parts/page', 'banner'); ?>
    <!-- Start main content -->
    <div id="container_full" class="ts-page-default">
        <div class="container">
            <?php
            while ( have_posts() ) : the_post();
                the_content();
                wp_link_pages();
            endwhile;    
            ?>

        </div>
    </div>
    <!-- End / main content -->

<?php get_footer();