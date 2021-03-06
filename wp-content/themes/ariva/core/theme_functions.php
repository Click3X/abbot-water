<?php
  if( !function_exists( 'ts-favicon' ) )
  {

    /*
     * favicon
    */
    function  ts_favicon()
    {
      global $ts_ariva;
      $favicon = $ts_ariva['ts-favicon']['url'];
      if ($favicon) {
       echo '<link rel="shortcut icon" href="'.$favicon.'" />',"\n";
      }
    }
    add_action('wp_head','ts_favicon',2);

  }


  if( !function_exists( 'ts_header_metas' ) )
  {

    /*
     * header metas
    */
    function ts_header_metas()
    {
      echo '<meta name="viewport" content="width=device-width">'."\n";
      echo '<link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">'."\n";
      echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-57x57.png" />'."\n";
      echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />'."\n";
      echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />'."\n";
    }
    add_action('wp_head', 'ts_header_metas',1);

  }


  if( !function_exists( 'ts_get_tracking_code' ) )
  {

    /*
     * Get tracking code
    */
    function ts_get_tracking_code()
    {
      global $ts_ariva;

      $return ='';
      if( $ts_ariva['ts-tracking-code'] )
      {
        $return .= stripslashes($ts_ariva['ts-tracking-code']);
      }

      echo  '<script>
                jQuery(function () {
                '.$return.'
                });
            </script>';
    }
    add_action('wp_head','ts_get_tracking_code');

  }


  if( !function_exists( 'ts_ie_js' ) ) {

    /*
     * ie script
    */
    function ts_ie_js()
    {
      preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
      if (count($matches)>1){
        //Then we're using IE
        $version = $matches[1];

        switch(true){
          case ($version<=8):

             echo '<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em>Upgrade to a different browser or install Google Chrome Frame to experience this site.</p><![endif]-->';
            break;

          case ($version<=9):
          // Jquery html5.js
            wp_register_script( 'html5.js.min.js', THEMESTUDIO_JS. '/html5shiv.js', false, THEMESTUDIO_THEME_VERSION ,true);
            wp_enqueue_script('html5.js.min.js');
            break;
          case ($version=7):
            wp_register_script( 'icons-lte-ie7', THEMESTUDIO_JS. '/fonts/Simple-Line-Icons/icons-lte-ie7.js', false, THEMESTUDIO_THEME_VERSION ,true);
            wp_enqueue_script('icons-lte-ie7');
            break;
          case ($version=8):
          ?>
            <!--[if lt IE 8]>
            <style>
            /* For IE < 8 (trigger haslayout) */
            .clearfix {
                zoom:1;
            }
             8="" (trigger="" haslayout)="" */="" .clearfix="" {="" zoom:1;="" }=""></ 8 (trigger haslayout) */
            .clearfix {
                zoom:1;
            }
            ></style>
            <![endif]-->

          <?php
          break;
          default:
            //You get the idea
        }
      }
    }
    add_action('wp_head', 'ts_ie_js');

  }


  if( !function_exists( 'ts_wp_title' ) ) {

    /*
     * WP title
    */
    function ts_wp_title( $title, $separator )
    {
      if ( is_feed() )
        return $title;

      global $paged, $page;

      if ( is_search() ) {
        $title = sprintf( esc_html__( 'Search results for %s', 'themestudio' ), '"' . get_search_query() . '"' );
        if ( $paged >= 2 )
          $title .= " $separator " . sprintf( esc_html__( 'Page %s', 'themestudio' ), $paged );
          $title .= " $separator " . get_bloginfo( 'name', 'display' );
        return $title;
      }
      if (!is_home()) {
        $title .= get_bloginfo( 'name', 'display' );
      }else{
        $title .= ' – '.get_bloginfo( 'name', 'display' );
      }

      $site_description = get_bloginfo( 'description', 'display' );
      if ( $site_description && ( is_home() || is_front_page() ) )
        $title .= " $separator " . $site_description;

      if ( $paged >= 2 || $paged >= 2 )
        $title .= " $separator " . sprintf( esc_html__( 'Page %s', 'themestudio' ), max( $paged, $page ) );

      return $title;
    }
    add_filter( 'wp_title', 'ts_wp_title', 10, 2 );

  }


  if( !function_exists( 'ts_search_form' ) ) {

    /*
     * Filter Search form
    */
    function ts_search_form( $form ) {

        $form = '
          <!-- Blog Search -->
          <div class="blog-search">
              <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
                  <input placeholder="Search.." type="search" name="s"  />
                  <span><button type="submit" id="submit_btn" class="search-submit"><i class="fa fa-search"></i></button></span>
              </form>
          </div>
          <!-- End Blog Search <--></-->';

        return $form;
    }
    add_filter( 'get_search_form', 'ts_search_form' );

  }


  if( !function_exists( 'ts_get_archives_link_custom' ) ) {

    /*
     * get archives link custom
    */
    function ts_get_archives_link_custom($url) {
      $link = str_replace('<li>', '<li class="cat-item">', $url);
      return $link;
    }
    add_filter('get_archives_link','ts_get_archives_link_custom');

  }

  if(!( function_exists('ts_pagination') )){

    /*
     * function pahgination
    */

  function ts_pagination($pages = '', $range = 2)
  {
    $showitems = ($range * 1)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == ''){
     global $wp_query;
     $pages = $wp_query->max_num_pages;
      if(!$pages) {
       $pages = 1;
      }
    }
    $output = '';
    if(1 != $pages){
      $output .= "<ul class='pagination'>";

      if($paged > 1 && $showitems < $pages) {
        $output .= "<li><a href='".get_pagenum_link($paged-1)."' class='navlinks'><i class='fa fa-angle-left'></i></a></li>";
      }
      for ($i=1; $i <= $pages; $i++){
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        $output .= ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."' class='navlinks'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='navlinks'>".$i."</a></li>";
        }
      }
      if ($paged < $pages && $showitems < $pages) {
        $output .= "<li><a href='".get_pagenum_link($paged+1)."' class='navlinks'><i class='fa fa-angle-right'></i></a></li>";
      }
      $output.= "</ul>";
    }
    return $output;
  }

  }

if(!( function_exists('themestudio_isotope_terms') )){
    function themestudio_isotope_terms() {
    global $post;
      if( get_the_terms($post->ID,'portfolio_cats') ) {
        $terms = get_the_terms($post->ID,'portfolio_cats','','','');
        $terms = array_map('themestudio_isotope_cb', $terms);
        return implode(' ', $terms);
      }
    }
  }

if(!( function_exists('themestudio_isotope_cb') )){

    function themestudio_isotope_cb($t) {
      return $t->slug;
    }
  }

if(!( function_exists('hex2rgb') )){
  function hex2rgb($hex) {
     $hex = str_replace("#", "", $hex);

     if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
     } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
     }
     $rgb = array($r, $g, $b);
     //return implode(",", $rgb); // returns the rgb values separated by commas
     return $rgb; // returns an array with the rgb values
  }
}
remove_action( 'admin_init', 'wp_auth_check_load' ); 

function subscribe_enque() {

      //Enqueue jQuery if not already loaded
      wp_enqueue_script('jquery');
      $scripts = array(
          'subscribre',
      );
      foreach ($scripts as $script) {
        wp_enqueue_script( $script, THEMESTUDIO_JS . '/'.$script.'.js', false, THEMESTUDIO_THEME_VERSION, true );
      }
       wp_localize_script('subscribre', 'ArrivaUrl', array(
              'ajaxurl' => admin_url('admin-ajax.php')
          ));
   }
  add_action( 'wp_enqueue_scripts', 'subscribe_enque' );
  
// function themestudio_subscribe_form() { 
//   global $ts_ariva;
//   $email = $_POST['email'];     
//   require_once get_template_directory() . '/core/apis/MCAPI.class.php';
//   $api_key = $ts_ariva['ts-subscribe-Mailchimp_API_Key'];
//   $api_list = $ts_ariva['ts-subscribe-Mailchimp_list_ID'];

//   $api = new MCAPI($api_key); 
//   $merge_vars = array('FNAME'=>'', 'LNAME'=>'');
  
//   // Submit subscriber data to MailChimp
//   // For parameters doc, refer to: http://apidocs.mailchimp.com/api/1.3/listsubscribe.func.php  
//    $retval = $api->listSubscribe( $api_list, $email, $merge_vars, 'html', false, true );   
//      if ($api->errorCode){              
//           echo "<h3>Please try again.</h3>";            
//         } else {
//            echo '<h3>You Have Successfully updated this Record!</h3>';           
//         }   
//     }
// add_action( 'wp_ajax_func_themestudio_subscribe_form', 'themestudio_subscribe_form' );
// add_action( 'wp_ajax_nopriv_func_themestudio_subscribe_form', 'themestudio_subscribe_form' );



if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
if(!( function_exists('woo_custom_product_searchform') )){

    add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );

    /**
     * woo_custom_product_searchform
     *
     * @access      public
     * @since       1.0
     * @return      void
    */
    function woo_custom_product_searchform( $form ) {

      $form = '<div class="blog-search"><form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">        
          <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search for product', 'themestudio' ) . '" />
          <!-- <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'themestudio' ) .'" /> -->
          <span><button class="search-submit" id="submit_btn" type="submit"><i class="fa fa-search"></i></button></span>
          <input type="hidden" name="post_type" value="product" />        
      </form></div>';

      return $form;

    }

}

if(!( function_exists('ts_dequeue_styles') )){
    // Remove each style one by one
    add_filter( 'woocommerce_enqueue_styles', 'ts_dequeue_styles' );
    function ts_dequeue_styles( $enqueue_styles ) {
      unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
      unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout
      unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
      return $enqueue_styles;
    }
}

if(!( function_exists('woo_number_per_page') )){

    function woo_number_per_page(){
      global $themestudio_product_count;
      $themestudio_product_count  = 9;
      return 9;
    }
    add_filter( 'loop_shop_per_page', 'woo_number_per_page', 20 );

}

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */
function woo_related_products_limit() {
  global $product,$ts_ariva;
  $args['posts_per_page'] = 6;
  return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'ts_related_products_args' );
  function ts_related_products_args( $args ) {
    global $woocommerce_loop,$ts_ariva;
    // Store column count for displaying the grid
    if ( empty( $woocommerce_loop['columns'] ) )
      $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $ts_ariva['woo_product_layout'] );


     if ($woocommerce_loop['columns'] == '3') {
        $args['columns'] = 3; // arranged in 2 columns
        $args['posts_per_page'] = 3; // 3 related products

      }elseif ($woocommerce_loop['columns'] =='4') {
        $args['columns'] = 4; // arranged in 2 columns
        $args['posts_per_page'] = 4; // 4 related products

      }elseif ($woocommerce_loop['columns'] =='2') {
        $args['columns'] = 2; // arranged in 2 columns
        $args['posts_per_page'] = 2; // 2 related products
      }

      return $args;

    }
  if(!( function_exists('get_cart_sidebar') )){

  add_filter('mini_cart_menu_item', 'get_cart_sidebar');
      function get_cart_sidebar()
      {
        global $woocommerce;
        $sidebar_contents = '';
        $sidebar_contents .= '<li class="mini-shoping-cart-wraper menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  dropdown">';
        $sidebar_contents .= '<a class="dropdown-toggle cart-contents" href="'.$woocommerce->cart->get_cart_url().'" title="'. __('View your shopping cart', 'themestudio').'"><i class="fa fa-shopping-cart"></i><span class="cart-number-items">'.sprintf(_n('%d', $woocommerce->cart->cart_contents_count, 'themestudio')).'</span></a>';
        $sidebar_contents .= '<div  class="dropdown-menu mini-shoping-cart">';
        $sidebar_contents .= '<div  class="widget_shopping_cart_content">';
          if( is_cart() && sizeof($woocommerce->cart->cart_contents) != 0){
                ob_start();
                dynamic_sidebar('ts_shoping_cart_sidebar');
                $temp = ob_get_clean();
              $sidebar_contents .= $temp;
          }
        $sidebar_contents .= "</div>";
        $sidebar_contents .= "</div>";
        $sidebar_contents .= "</li>";
        return $sidebar_contents;
      }

  }

// Ensure cart contents update when products are added to the cart via AJAX
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

  function woocommerce_header_add_to_cart_fragment( $fragments ) {
      global $woocommerce;

      ob_start();

      ?>
      <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'themestudio'); ?>">
      <i class="fa fa-shopping-cart"></i>
      <span class="cart-number-items"><?php echo sprintf(_n('%d', $woocommerce->cart->cart_contents_count, 'themestudio'));?>
      </span></a>
      <?php

      $fragments['a.cart-contents'] = ob_get_clean();

      return $fragments;

}

// add_filter('wp_nav_menu_items','add_cart_box_to_menu', 10, 2);
  function add_cart_box_to_menu( $items, $args ) {
      if( $args->theme_location == 'main_menu' )
        {
            return $items.get_cart_sidebar();
        }


  }

}

// Overwrite Widget woocomerce
if(!( function_exists('Cart_woocommerce_widgets') )){
  function Cart_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Cart' ) ) {
      unregister_widget( 'WC_Widget_Cart' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-cart.php' );
   
      register_widget( 'Custom_WC_Widget_Cart' );
    }
   
  }
add_action( 'widgets_init', 'Cart_woocommerce_widgets', 15 );
 }

if(!( function_exists('Layered_Nav_woocommerce_widgets') )){
  function Layered_Nav_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Layered_Nav' ) ) {
      unregister_widget( 'WC_Widget_Layered_Nav' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-layered-nav.php' );
   
      register_widget( 'Custom_WC_Widget_Layered_Nav' );
    }
   
  }
   
  add_action( 'widgets_init', 'Layered_Nav_woocommerce_widgets', 15 );
}
if(!( function_exists('Layered_Nav_Filters_woocommerce_widgets') )){
  function Layered_Nav_Filters_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Layered_Nav_Filters' ) ) {
      unregister_widget( 'WC_Widget_Layered_Nav_Filters' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-layered-nav-filters.php' );
   
      register_widget( 'Custom_WC_Widget_Layered_Nav_Filters' );
    }
   
  }
   
  add_action( 'widgets_init', 'Layered_Nav_Filters_woocommerce_widgets', 15 );
}

if(!( function_exists('Price_Filter_woocommerce_widgets') )){
  function Price_Filter_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Price_Filter' ) ) {
      unregister_widget( 'WC_Widget_Price_Filter' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-price-filter.php' );
   
      register_widget( 'Custom_WC_Widget_Price_Filter' );
    }
   
  }
   
  add_action( 'widgets_init', 'Price_Filter_woocommerce_widgets', 15 );
}

if(!( function_exists('Product_Categories_woocommerce_widgets') )){
  function Product_Categories_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Product_Categories' ) ) {
      unregister_widget( 'WC_Widget_Product_Categories' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-product-categories.php' );
   
      register_widget( 'Custom_WC_Widget_Product_Categories' );
    }
   
  }
   
  add_action( 'widgets_init', 'Product_Categories_woocommerce_widgets', 15 );
}

if(!( function_exists('Products_woocommerce_widgets') )){
  function Products_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Products' ) ) {
      unregister_widget( 'WC_Widget_Products' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-products.php' );
   
      register_widget( 'Custom_WC_Widget_Products' );
    }
   
  }
   
  add_action( 'widgets_init', 'Products_woocommerce_widgets', 15 );
}

if(!( function_exists('Product_Search_woocommerce_widgets') )){
  function Product_Search_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Product_Search' ) ) {
      unregister_widget( 'WC_Widget_Product_Search' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-product-search.php' );
   
      register_widget( 'Custom_WC_Widget_Product_Search' );
    }
   
  }
   
  add_action( 'widgets_init', 'Product_Search_woocommerce_widgets', 15 );
}
if(!( function_exists('Product_Tag_Cloud_woocommerce_widgets') )){
  function Product_Tag_Cloud_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Product_Tag_Cloud' ) ) {
      unregister_widget( 'WC_Widget_Product_Tag_Cloud' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-product-tag-cloud.php' );
   
      register_widget( 'Custom_WC_Widget_Product_Tag_Cloud' );
    }
   
  }
   
  add_action( 'widgets_init', 'Product_Tag_Cloud_woocommerce_widgets', 15 );
}

if(!( function_exists('Recently_Viewed_woocommerce_widgets') )){
  function Recently_Viewed_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Recently_Viewed' ) ) {
      unregister_widget( 'WC_Widget_Recently_Viewed' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-recently-viewed.php' );
   
      register_widget( 'Custom_WC_Widget_Recently_Viewed' );
    }
   
  }
   
  add_action( 'widgets_init', 'Recently_Viewed_woocommerce_widgets', 15 );
}

if(!( function_exists('Recent_Reviews_woocommerce_widgets') )){
  function Recent_Reviews_woocommerce_widgets() {
    // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
   
    if ( class_exists( 'WC_Widget_Recent_Reviews' ) ) {
      unregister_widget( 'WC_Widget_Recent_Reviews' );
   
      include_once( 'widgets/woocomerce/class-wc-widget-recent-reviews.php' );
   
      register_widget( 'Custom_WC_Widget_Recent_Reviews' );
    }
   
  }
   
  add_action( 'widgets_init', 'Recent_Reviews_woocommerce_widgets', 15 );
}
if(!( function_exists('Top_Rated_Products_woocommerce_widgets') )){
function Top_Rated_Products_woocommerce_widgets() {
  // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
 
  if ( class_exists( 'WC_Widget_Top_Rated_Products' ) ) {
    unregister_widget( 'WC_Widget_Top_Rated_Products' );
 
    include_once( 'widgets/woocomerce/class-wc-widget-top-rated-products.php' );
 
    register_widget( 'Custom_WC_Widget_Top_Rated_Products' );
  }
 
}
 
add_action( 'widgets_init', 'Top_Rated_Products_woocommerce_widgets', 15 );
}


function ts_custom_walker( $args ) {
    return array_merge( $args, array(
        'walker' => new ts_bootstrap_navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'ts_custom_walker' );

function language_selector_flags(){
    if(( function_exists('icl_get_languages') )){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
            if(!$l['active']) echo '</a>';
        }
    }
  }
}