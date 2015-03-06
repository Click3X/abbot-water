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
        <footer id="page-footer" class="page-footer">
            <div class="container">
                <?php
                    $args = array( 'page_id' => 14 );
                    // The Query
                    $the_query = new WP_Query( $args );
                    // The Loop
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            echo '<div class="whole">';
                                the_content();
                            echo '</div>';
                        }
                    } 
                    wp_reset_postdata();
                ?>           
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