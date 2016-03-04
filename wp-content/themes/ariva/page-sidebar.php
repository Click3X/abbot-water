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

            <div class="row">
                <!--Blog Left-->
                <article id="blog-left" class="blog-left col-sm-9 col-lg-8">

                    

                </article>
                <!--End Blog Left-->
                <!--Blog Right-->
                <aside id="blog-right" class="blog-right col-sm-3 col-lg-3">

                    <?php get_sidebar()?>

                </aside>
                <!--Blog Right-->
            </div>



        </div>
    </div>


<?php get_footer();