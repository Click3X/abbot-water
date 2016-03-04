<?php $link_video = get_post_meta( $post->ID, "themestudio_feature_video", true ); ?>
<?php if ( $link_video ) : ?>
		<div class="col-sm-6 col-xs-12 img-feature">
			<?php echo apply_filters('the_content', $link_video); ?>
		</div>
<?php endif;