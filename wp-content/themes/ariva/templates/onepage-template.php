<?php
	/**
	* Template Name: One Page Template
	*
	* @author FastWP
	* @package Babel
	* @since 1.0.0
	*/
get_header();
global $ts_ariva;

?>
 <!-- content -->
    <div id="container_full">
	        <?php
	        	while ( have_posts() ) : the_post();
					the_content();
					wp_link_pages();
				endwhile;	
            ?>
    </div>
    <!-- End / content -->
<?php get_footer(); ?>