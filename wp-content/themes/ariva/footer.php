<?php
    /**
    * footer.php
    * Footer
    * @author Vulinhpc
    * @package ARIVA
    * @since 1.0.0
    */
    global $ts_ariva;
?>
        <footer>
            <div class="container">
                    <?php get_template_part('content-parts/footer', 'socials'); ?>
                <div id="flags_language_selector"><?php language_selector_flags(); ?></div >
                <div class="copyright">
                    <?php echo apply_filters('the_content',  $ts_ariva['footer_copyright_text']); ?>
                </div>
            </div>
        </footer>

    </div>
    <!-- End / Page wrap -->
    <?php wp_footer(); ?>

    <?php
        // CONDITIONALLY LOAD OUTLINE SCRIPT
        $server = $_SERVER['REMOTE_ADDR'];
        // IF SERVER IS LOCAL, ADD OUTLINE BUTTON
        if($server == '127.0.0.1') {
            echo "<script>
                jQuery('head').append('<style>#outline {position:fixed;z-index:1000;bottom:50px;right:50px;} .outlines {outline:1px solid rgba(255, 0, 0, 0.3);}</style>');
                jQuery('body').append('<input id=\"outline\" type=\"button\">');

                jQuery('#outline').click(function() {
                    jQuery('*').toggleClass('outlines');
               });
            </script>";
        }
    ?>

</body>
</html>