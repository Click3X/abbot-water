<?php 
global $post;
$themestudio_portfolio_url = get_post_meta( $post->ID, 'themestudio_portfolio_url', true );
$attachments = get_post_meta( $post->ID, 'themestudio_portfolio_slider', true );
$themestudio_portfolio_url = get_post_meta( $post->ID, 'themestudio_portfolio_url', true );
?>
<div class="single-portfolio-4">
<?php if ( $attachments ) :?>
    <?php foreach ( $attachments as $attachment ){ ?>
			<div class="background-parallax" style="background-image: url(<?php echo esc_url( $attachment ); ?>)"></div>
		<?php } ?>
<?php endif ?>

	<div class="main-content-portfolio">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12 portfolio-left">
					<div class="content-portfolio">
						<div class="section-title text-left">
							<h3><?php the_title() ?></h3>
							<hr>
						</div>
						<?php the_content() ?>
						<a href="<?php echo esc_url($themestudio_portfolio_url) ?>" target="_blank" class="ts-button button-portfolio"><?php echo __('VISIT WEBSITE', 'themestudio') ?></a>
						<div class="meta-portfolio">
							<span class="date pull-left"><?php the_time( 'F' ); ?> <?php the_time( 'd' ); ?>, <?php the_time( 'Y' ); ?></span>
							<ul class="social pull-right">
								<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">&nbsp;<i class="fa fa-facebook"></i>&nbsp;</a></li>
						      	<li><a target="_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a></li>
						      	<li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a></li>
						      	<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a></li>
						      	<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink(); ?>"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>