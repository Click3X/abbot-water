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
</body>
</html>