<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<?php global $ts_ariva;
$menu_position = 'megamenu';
if( is_page( ) && basename( get_page_template() ) == 'onepage-template.php' ){
    $menu_position = 'onepage_menu';
}
?>
<body <?php body_class(); ?>>
    <!--Wrapper-->
    <div id="wrapper">
    	<?php if ($ts_ariva['menu-style'] == 'clasic_menu') {
            $ts_class_header = 'header-1';
        }else if ($ts_ariva['menu-style'] == 'dropdown_menu') {
             $ts_class_header = 'header-2';
        }?>
        <header class="<?php echo  esc_attr($ts_class_header) ?>">
            <div class="main-header">
                <div class="container">
                    <!-- <div class="logo">
                        <h1><a href="<?php echo get_home_url(); ?>" class="ariva_logo"><img src="<?php echo esc_url($ts_ariva['ts-logo']['url']); ?>" data-at2x="<?php echo esc_url($ts_ariva['ts-logo2x']['url']); ?>" alt="<?php echo get_bloginfo('name') ?>"></a></h1>
                    </div> -->
                    <?php if ($ts_ariva['menu-style'] == 'clasic_menu') {
                        $ts_class = 'menubar-default';
                    }else if ($ts_ariva['menu-style'] == 'dropdown_menu') {
                         $ts_class = 'menubar-animation';
                    }?>
                        <a href="javascript:void(0)" class="menubar <?php echo  esc_attr($ts_class); ?>">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <?php get_template_part('content-parts/header', 'socials'); ?>
                    <?php if ($ts_ariva['menu-style'] == 'clasic_menu') : ?>
                        <nav id="default-menu-position" class="ts-default-menu ts-main-menu">
                            <?php 
                                wp_nav_menu(
                                array(
                                    'theme_location'    => $menu_position,
                                    'menu_id'         => 'default-main-menu',
                                    'menu_class'        => 'default-nav',
                                    'fallback_cb'       => 'ts_bootstrap_navwalker::fallback',
                                    'walker'            => new ts_bootstrap_navwalker()
                                    )
                            );
                             ?>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($ts_ariva['menu-style'] == 'dropdown_menu') : ?>
                <nav id="dropdown-menu-position"  class="ts-main-menu ts-menu-animation">
                   <?php 
                        wp_nav_menu(
                            array(
                                'theme_location'    => $menu_position,
                                'menu_id'         => 'menu-main-menu',
                                'menu_class'        => 'menu-nav',
                                'fallback_cb'       => 'ts_bootstrap_navwalker::fallback',
                                'walker'            => new ts_bootstrap_navwalker()
                                )
                        );
                    ?>
                        <?php if ($ts_ariva['ts-subscribe-enable'] == '1'): ?>
                            <?php get_template_part('content-parts/content', 'subscribe'); ?>
                        <?php endif ?>
                        <span class="close-menu"><img src="<?php echo get_template_directory_uri().'/assets/images/close-menu.png' ?>" alt=""></span>
                </nav>
            <?php endif ?>
        </header>
        <!-- END HEADER -->

        <!-- VIEW PORT TEST DIV -->
        <div id="vw-test" style="opacity:0;"></div>
        