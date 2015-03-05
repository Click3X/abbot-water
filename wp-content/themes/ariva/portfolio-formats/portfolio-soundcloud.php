<?php $link_soundcloud = get_post_meta( $post->ID, "themestudio_portfolio_soundcloud", true ); ?>
<?php if ( $link_soundcloud ) : ?>
	<div class="portfolio-post-video owl-portfolio-singer">
		<div class="audio">
		<?php echo apply_filters('the_content', $link_soundcloud); ?>
		</div>
	</div>
		<script>
		jQuery(document).ready(function ($) {
			$(".portfolio-post-audio p iframe").css({"width":"100%","height":"100"});
		});
	</script>
	<div class="clearfix"></div>
<?php endif;