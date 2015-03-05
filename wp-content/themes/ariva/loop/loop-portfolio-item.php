<?php 
    global $ts_ariva, $post;
    $grid_url = get_post_meta( $post->ID, "themestudio_grid_custom_url", true );
    $portfolio_hover_color = get_post_meta( $post->ID, "themestudio_portfolio_hover_color", true );
    $p_rgba = hex2rgb($portfolio_hover_color);
    $portfolio_hover_style = 'style="background-color:rgba('.$p_rgba[0].', '.$p_rgba[1].', '.$p_rgba[2].', '.$ts_ariva['portfolio_hover_opacity'].')"';
    $cbpClass ='';

    if ($grid_url == '') {
        $grid_url = get_permalink( );
        $cbpClass ='singlePage';
    }
 ?>

<li class="cbp-item <?php echo themestudio_isotope_terms() ?>" style="width:<?php echo $ts_ariva['portfolio-item-width'] ?>px; height: <?php echo $ts_ariva['portfolio-item-height'] ?>px">
    <a href="<?php echo esc_url( $grid_url );  ?>" class="cbp-caption cbp-<?php echo $cbpClass ?>">
        <div class="cbp-caption-defaultWrap">
            <?php the_post_thumbnail('portfolio-grid-4-full'); ?>
        </div>
        <div class="cbp-caption-activeWrap" <?php echo $portfolio_hover_style  ?>>
            <div class="cbp-l-caption-alignLeft">
                <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title"><?php the_title( ); ?></div>
                    <div class="cbp-l-caption-cats"><?php echo strip_tags(get_the_term_list(get_the_id(),'portfolio_cats', '',', ' ), '') ?></div>
                </div>
            </div>
        </div>
    </a>
</li>