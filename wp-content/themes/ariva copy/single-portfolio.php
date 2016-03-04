<?php
	/**
	* single-projects.php
	* The main post loop in ARIVA
	* @author Vulinhpc
	* @package ARIVA
	* @since 1.0.0
	*/

	global $ts_ariva;
	the_post();
	$portfolio_single_layout = get_post_meta( $post->ID, 'themestudio_portfolio_single_layout', true );
	$portfolio_type = get_post_meta( $post->ID, 'themestudio_portfolio_type', true );
	if ($ts_ariva['portfolio-single-loading'] == 'redirect') {
		get_header();
	get_template_part('content-parts/page', 'banner');
	}
?>

<?php if ($portfolio_type != 'slider'): ?>
	<?php get_template_part('loop/portfolio-ajax', 'normal'); ?>
<?php else: ?>
	<?php get_template_part('loop/portfolio-ajax', $portfolio_single_layout); ?>
<?php endif ?>

<?php 
	if ($ts_ariva['portfolio-single-loading'] == 'redirect') {
		get_footer();
	}