<?php
	global $post;	
	$url = get_post_meta( $post->ID, 'themestudio_feature_image', true );	
	if ($url=='') {
		if (wp_get_attachment_url( get_post_thumbnail_id($post->ID) )) {
		    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		}
	}
?>
<?php if ($url !=''): ?>	
	<div class="col-sm-6 col-xs-12 img-feature">
			<figure><img src="<?php echo esc_url($url) ?>" alt="<?php the_title(); ?>"></figure>
	</div>
<?php endif;