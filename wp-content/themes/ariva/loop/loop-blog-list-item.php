<?php
    global $post, $ts_ariva;
    $format = get_post_format();
    if( false === $format ){
        $format = 'standard';
    }
    $post_format_class='fa-pencil';
    if (($format == 'image')||($format == 'gallery')) {
        $post_format_class='fa-camera-retro';
    }elseif($format == 'video' ){
        $post_format_class='fa-caret-right';
    }elseif($format == 'link' ){
        $post_format_class='fa-link';
    }elseif($format == 'quote' ){
        $post_format_class='fa-quote-right';
    }elseif($format == 'audio' ){
        $post_format_class='fa-volume-up ';
    }
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
    <span class="icon-post-type"><i class="fa <?php echo esc_attr($post_format_class) ?>"></i></span>
    <article>
        <h3><a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php get_template_part('content-parts/blog', 'metas'); ?>
        <?php get_template_part( 'post-formats/post', $format ); ?>
        <?php if ($ts_ariva['ts-blog-content']=='content'): ?>
        <div class="except-post"><?php the_content('<span class="continue-reading">'.esc_attr( $ts_ariva['ts-blog-reading-text'] ). '</span>'); ?></div>
        <?php else: ?>
            <?php if(empty( $post->post_excerpt )) : ?>
              <div class="except-post"> <?php the_content('<span class="continue-reading">'.esc_attr( $ts_ariva['ts-blog-reading-text'] ). '</span>'); ?></div>
            <?php else: ?>
            <div class="except-post"><?php the_excerpt(); ?></div>
            <a title="READ MORE" class="blog-read ts-button" href="<?php the_permalink(); ?>"><?php echo esc_attr( $ts_ariva['ts-blog-reading-text']); ?></a>
            <?php endif ?>
            <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'themestudio' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
      <?php endif ?>

        <?php get_template_part('content-parts/blog', 'social'); ?>
    </article>
</div>