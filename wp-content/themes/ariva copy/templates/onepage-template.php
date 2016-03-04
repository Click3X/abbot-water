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
	<!-- VIEW PORT TEST DIV - NOT VISIBLE -->
	<div id="vw-test" class="vw-test"></div>

 	<!-- content -->
    <div id="container_full">

	        <?php
	        	while ( have_posts() ) : the_post();
					the_content();
				endwhile;	

				wp_reset_postdata();
            ?>
    
    	
        <?php
            // BIO + CREDENTIALS
            $args = array(
            	'page_id'=>8
            );
            // The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
			  while ( $the_query->have_posts() ) {
			    $the_query->the_post();
			    	echo '<article id="bio" class="clearfix article-page">';

				    	echo '<div class="banner new-banner">
				                <div class="banner-content text-center">
				                    <h1>'.get_the_title().'</h1>
				                     <hr>
				                </div>
				            </div>';

				    	echo '<div class="container">';
				    		the_content();
				    	echo '</div>';

				    echo '</article>';
			  	}
			}
			/* Restore original Post Data */
			wp_reset_postdata();
        ?>

        <?php
            // PHIL + APPROACH
            $args = array(
            	'page_id'=>10
            );
            // The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
			  while ( $the_query->have_posts() ) {
			    $the_query->the_post();

			    echo '<article id="philosophy" class="clearfix article-page">';
				    
				    echo '<div class="banner new-banner">
				                <div class="banner-content text-center">
				                    <h1>'.get_the_title().'</h1>
				                     <hr>
				                </div>
				            </div>';

			    	echo '<div class="container">';
			    		the_content();
			    	echo '</div>';

			    echo '</article>';

			  	}
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		?>

       	<?php
            // SERVICES
            $args = array(
            	'page_id'=>12
            );
            // The Query
			$the_query = new WP_Query( $args );
			// The Loop
			if ( $the_query->have_posts() ) {
			  	while ( $the_query->have_posts() ) {
			    $the_query->the_post();

			    echo '<article id="services" class="clearfix article-page">';

			    	echo '<div class="banner new-banner">
			                <div class="banner-content text-center">
			                    <h1>'.get_the_title().'</h1>
			                     <hr>
			                </div>
			            </div>';
			    	
			    	echo '<div class="container">';
			    		the_content();
			    	echo '</div>';

			    echo '</article>';
			  	}
			} 
			/* Restore original Post Data */
			wp_reset_postdata();
        ?>


        <?php
            // NYC-LA
            $args = array(
            	'post_type' => 'portfolio',
            	'posts_per_page' => -1
            );
            // The Query
			$the_query = new WP_Query( $args );
			// The Loop
			if ( $the_query->have_posts() ) {
				echo '<article id="nyc-la" class="clearfix article-page">';

			    	echo '<div class="banner new-banner">
			                <div class="banner-content text-center">
			                    <h1>NYC <---> LA</h1>
			                    <hr>
			                </div>
			            </div>';
			    	
			    	echo '<div class="container_full">';

						echo '<ul id="portfolio-grid" class="portfolio-grid clearfix">';
						  	while ( $the_query->have_posts() ) {
						    $the_query->the_post();
						    $post_thumb = get_the_post_thumbnail( $post->ID, 'square-500');  

						    echo '<li>'.$post_thumb.'</li>';

						  	}
						echo '</ul>';

					echo '</div>';

				echo '</article>';
			} 
			/* Restore original Post Data */
			wp_reset_postdata();
        ?>


    </div>
    <!-- End / content -->
<?php get_footer(); ?>