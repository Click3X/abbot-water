<?php global $ts_ariva; ?>
<div class="meta">
	<?php if( in_array('author',$ts_ariva['ts-blog-metas']) ) : ?>
		<span><?php echo __('By', 'themestudio'); ?> <a href="<?php echo get_author_posts_url($post->post_author)   ?>"><?php echo get_the_author_meta('display_name' ); ?></a> </span>
	<?php endif; ?>
	<?php if( in_array('date',$ts_ariva['ts-blog-metas']) ) : ?>
	<span><?php the_time( 'M' ); ?> <?php the_time( 'd' ); ?></span>
	<?php endif; ?>
	<?php if( in_array('tags',$ts_ariva['ts-blog-metas']) ) :  ?>
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
	<?php endif; ?>
	<?php if( in_array('category',$ts_ariva['ts-blog-metas'])  && has_category() ) :  ?>
		<span><?php the_category(', '); ?></span> 
	<?php endif; ?>
	<?php if( in_array('comment',$ts_ariva['ts-blog-metas']) && comments_open() ) : ?>
		<span><a href="<?php comments_link(); ?>"><?php comments_number( __('0 Comments','themestudio'), __('1 Comment','themestudio'), __('% Comments','themestudio') ); ?></a></span>
	<?php endif; ?>
</div>