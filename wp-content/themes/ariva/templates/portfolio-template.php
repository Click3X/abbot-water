<?php
/**
* Template Name: Portfolio Template
*
* @author Vulinhpc
* @package ARIVA
* @since 1.0.0
*/

get_header();
global $ts_ariva, $post, $list_id, $style ;

?>

<?php get_template_part('content-parts/page', 'banner'); ?>

		<section class="ts-add-content">
			<div class="container">
				<?php 
					while ( have_posts() ) : the_post();
						the_content();
						wp_link_pages();
					endwhile;	
				?>
			</div>
		</section>	

			<?php 
				if (is_front_page()) {
					$paged = (get_query_var('page')) ? get_query_var('page') : 1;
				}else{
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				}
				$posts_per_page = $ts_ariva['posts_per_page'];

					$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => $posts_per_page,
						'paged' => $paged

					);

					$portfolio_posts =  query_posts( $args );
			if ($ts_ariva['show_hide_filter'] == 'show_filter_portfolio') {
				get_template_part( 'content-parts/portfolio', 'filter' );
			}
			 ?>

			<div id="grid-portfolio" class="cbp-l-grid-fullScreen">
		        <ul>
		        <?php foreach($portfolio_posts as $portfolio) :
		        		$post = $portfolio;
		        		get_template_part( 'loop/loop-portfolio', 'item' );
		        		endforeach;

					wp_reset_postdata();
		        ?>

		        </ul>
		    </div>
		    <?php 
				if ($ts_ariva['portfolio_switch_pagination'] == 'show_portfolio_pagination') {
					echo function_exists('ts_pagination') ? ts_pagination() : posts_nav_link(); 
				}
			?>
	        <div class="cbp-l-loadMore-button">
	        <?php   if ( !is_null(get_next_posts_link()) ):
		      	$npl=explode('"',get_next_posts_link());
		        $npl_url=$npl[1];?>
		          <a href="<?php echo esc_url( $npl_url ); ?>"  class="cbp-l-loadMore-button-link" title="<?php echo __('Next posts', 'themestudio') ?>"><?php echo __('LOAD MORE', 'themestudio') ?></a>
			<?php endif ?>
        	</div>

    <!-- End / content -->
<?php get_footer(); ?>