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

                $name = get_field('name');
                $title = get_field('title');
                $image = get_field('image');

                echo '<h2>'.$name.'</h2>';
                echo '<h3>'.$title.'</h3>';
                echo '<img src="'.$image['url'].'" class="bio-img">';


                // helper($image);

                the_content();

            endwhile;    
            ?>

        </div>
    </div>
    <!-- End / main content -->

<?php get_footer();