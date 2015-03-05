<?php 
global $post;
$themestudio_portfolio_url = get_post_meta( $post->ID, 'themestudio_portfolio_url', true );
$attachments = get_post_meta( $post->ID, 'themestudio_portfolio_slider', true );
?>
<div class="single-portfolio-2">
	<div class="portfolio-img">
		<figure><?php the_post_thumbnail('full') ?></figure>
	</div>
	<div class="detail-portfolio">
		<div class="container">
			<div class="content-portfolio text-center">
				<div class="section-title text-center">
					<h3><?php the_title() ?></h3>
					<hr>
				</div>
				<div class="meta-portfolio text-center">
					<span class="date"><?php the_time( 'F' ); ?> <?php the_time( 'd' ); ?>, <?php the_time( 'Y' ); ?></span>
					<ul class="social">
						<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">&nbsp;<i class="fa fa-facebook"></i>&nbsp;</a></li>
				      	<li><a target="_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a></li>
				      	<li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a></li>
				      	<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a></li>
				      	<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink(); ?>"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
				<div class="content-text">
					<?php the_content() ?>
				</div>
				<a href="<?php echo esc_url($themestudio_portfolio_url) ?>" target="_blank" class="ts-button button-portfolio"><?php echo __('VISIT WEBSITE', 'themestudio') ?></a>
			</div>
			<?php if ( $attachments ) :?>
				<div class="list-images">

		        <?php foreach ( $attachments as $attachment ){ ?>
			            <figure><img src="<?php echo esc_url( $attachment ); ?>" alt="<?php get_the_title() ?>"></figure>
		  		<?php } ?>

				</div>
			<?php endif ?>
		</div>
	</div>
</div>