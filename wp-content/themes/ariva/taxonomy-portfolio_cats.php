<?php
	/**
	 * taxonomy-portfolio_cats.php
	 * The project archive used in ARIVA
	 * @author Vu Ngoc Linh
	 * @package ARIVA
	 * @since 1.0.0
	 */
	get_header();
	global $ts_ariva, $style;
?>

<section id="banner">
        <div class="banner parallax-section portfolio-banner" >
        <div class="overlay"></div>
            <div class="banner-content text-center">
                <h1><?php echo esc_attr($ts_ariva['portfolio_title']); ?></h1>
                 <hr>
                <p><?php echo esc_attr($ts_ariva['portfolio_sub_title']); ?></p>
            </div>
        </div>
</section>
<br>
<?php 
	if ($ts_ariva['show_hide_filter'] == 'show_filter_portfolio') {
		get_template_part( 'content-parts/portfolio', 'filter' );
	}
?>
<!-- End Banner -->
<div id="grid-portfolio" class="cbp-l-grid-fullScreen">
    <ul>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

	    		get_template_part( 'loop/loop-portfolio', 'item' );

				endwhile;
		  	else :
			    get_template_part('loop/content','none');

		  	endif;
?>

    </ul>
</div>
<?php 
	if ($ts_ariva 'portfolio_switch_pagination' == 'show_portfolio_pagination') {
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


<?php get_footer();