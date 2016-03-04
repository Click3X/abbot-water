<?php 
global $ts_ariva;

?>
<ul class="blog-date">
	<?php if( in_array('date',$ts_ariva['ts-blog-metas']) ) : ?>
		<li><?php the_time( 'F' ); ?> <?php the_time( 'd' ); ?>, <?php the_time( 'Y' ); ?></li>
	<?php endif; ?>

	<?php if( in_array('category',$ts_ariva['ts-blog-metas'])  && has_category() ) :  ?>
		<li><?php the_category(', '); ?></li>
	<?php endif; ?>
	<?php if( in_array('author',$ts_ariva['ts-blog-metas']) ) : ?>
		<li><?php echo __('By', 'themestudio'); ?> <a href="<?php echo get_author_posts_url($post->post_author)   ?>"><?php echo get_the_author_meta('display_name' ); ?></a> </li>
	<?php endif; ?>
	<?php if( in_array('comment',$ts_ariva['ts-blog-metas']) && comments_open() ) : ?>
		<li><a href="<?php comments_link(); ?>"><?php comments_number( __('0 Comments','themestudio'), __('1 Comment','themestudio'), __('% Comments','themestudio') ); ?></a></li>
	<?php endif; ?>
	<?php if( in_array('tags',$ts_ariva['ts-blog-metas']) ) :  ?>
		<li>
		<?php
            $posttags = get_the_tags();
            if ($posttags) {
                $tag_val = array();
              	foreach($posttags as $tag) {
              		$tag_link = get_tag_link( $tag->term_id );
                	$tag_val[] = '<a href="'.$tag_link.'">'.$tag->name.'</a>'; 
              	}
        ?>
            <span><?php echo implode(', ', $tag_val); ?></span>
        <?php } ?>
        </li>
	<?php endif; ?>
</ul>