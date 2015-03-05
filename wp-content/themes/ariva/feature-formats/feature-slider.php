<?php
	global $post;
	$attachments = get_post_meta( $post->ID, 'themestudio_feature_slider', true );
	if ( $attachments ) :
?>
 <!--Portfolio Single Slide-->
<div class="col-sm-6 col-xs-12 img-feature">
    <div id="owl-portfolio-singer" class="ts-portfolio-singer">
        <!--Portfolio Slide Item-->
        <?php foreach ( $attachments as $attachment ){ ?>
	        <div class="singer-item">
	            <img src="<?php echo esc_url($attachment); ?>" alt="<?php get_the_title() ?>">
	        </div>
  		<?php } ?>
        <!--End Portfolio Slide Item-->

    </div>
    <span id="prev-portfolio" class="next-prev"><i class="fa  fa-caret-left"></i></span>
    <span id="next-portfolio" class="next-prev"><i class="fa  fa-caret-right"></i></span>
</div>
 <!--Portfolio Single Slide-->
<?php endif; ?>