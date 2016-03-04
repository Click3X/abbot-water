<?php
    /**
    * single.php
    * The main post loop in ARIVA
    * @author Vulinhpc
    * @package ARIVA
    * @since 1.0.0
    */
    get_header();
    the_post();

    global $ts_ariva;
    $format = get_post_format();
    if( false === $format ){
    	$format = 'standard';
    }
?>

<?php get_template_part('content-parts/page', 'banner'); ?>
    <!-- Main content -->
    <div <?php post_class("main-content"); ?>>
        <div class="container">
            <div class="row">
                <?php
                    if ($ts_ariva['ts-blog-sidebar-position']==3) {
                        $col_md = 12;
                        $col_sm = 12;
                        $col_lg = 12;
                    } else {
                        $col_md = 9;
                        $col_sm = 8;
                        $col_lg = 9;
                    }
                ?>
                <?php if ($ts_ariva['ts-blog-sidebar-position']==1): ?>
                   <aside id="sidebar-right" class="sidebar-right col-md-3 col-sm-4 col-xs-12">
                        <?php get_sidebar(); ?>
                    </aside>
                <?php endif ?>

                <div class="page-ct col-md-<?php echo esc_attr($col_md); ?> col-lg-<?php echo esc_attr($col_lg); ?> col-sm-<?php echo esc_attr($col_sm); ?>">
                    <div class="blog-single">
                         <div class="blog-item">
                            <!-- <span class="icon-post-type"><i class="fa fa-camera-retro"></i></span> -->
                            <article>
                                <!--Blog Title-->
                                <h3><a href="#" title=""><?php the_title( ); ?></a></h3>
                                <div style="background:#252525" class="hr align-center new-hr"></div>
                                <!--End Blog Title-->
                                <!--Blog Date-->
                                <?php get_template_part('content-parts/blog', 'metas'); ?>
                                <!--End Blog Date-->
                                <!-- Post format -->
                                <?php get_template_part( 'post-formats/post', $format ); ?>
                                <!-- Post format -->
                                <!--Blog Content-->
                                <div class="blog-content">
                                    <?php the_content( ); ?>
                                    <?php
                                    wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'themestudio' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span>',
                                        'link_after'  => '</span>',
                                    ) );
                                ?>
                                </div>
                                <!--End Blog Content-->
                                <!--Blog Share-->
                                <?php get_template_part('content-parts/blog', 'social'); ?>
                                <!--Blog Share-->
                            </article>
                            <!--Blog Tag-->
                            <?php if( in_array('tags',$ts_ariva['ts-blog-metas']) ) :  ?>
                                <div class="tag text-right">
                                    <span><?php echo __('Tag :','themestudio'); ?> </span>
                                    <?php
                                        $posttags = get_the_tags();
                                        if ($posttags) {
                                            $tag_val = array();
                                            foreach($posttags as $tag) {
                                                $tag_link = get_tag_link( $tag->term_id );
                                                $tag_val[] = '<a title="'.$tag->name.'" href="'.$tag_link.'">'.$tag->name.'</a>'; 
                                            }
                                    ?>
                                        <?php echo implode(', ', $tag_val); ?>
                                    <?php } ?>
                                </div>
                            <?php endif; ?>
                            <!--End Blog Tag-->
                        <?php
                            if( comments_open() ){
                                comments_template();
                            }
                        ?>
                        </div>
                    </div>
                </div>

                 <!-- Start right sidebar -->
                <?php if ($ts_ariva['ts-blog-sidebar-position']==2): ?>
                    <aside id="sidebar-right" class="sidebar-right col-md-3 col-sm-4 col-xs-12">
                        <?php get_sidebar(); ?>
                    </aside>
                <?php endif ?>
                <!-- End right sidebar -->

            </div>
        </div>
    </div>
    <!-- End / Main content -->

<?php get_footer();