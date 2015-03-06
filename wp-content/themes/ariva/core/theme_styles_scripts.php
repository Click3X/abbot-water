<?php
/**
 * This file is used to load javascript and stylesheet function
 */

/**
 * Load javascript
 */
if( !function_exists( 'ts_load_js' ) ) {

	function ts_load_js()
	{
		global $ts_ariva;
		if(!is_admin())
		{
			wp_enqueue_script('jquery');

			$scripts = array(
			'bootstrap.min',
		    'modernizr',
		    'jquery.appear.min',
			'jquery.countTo',
		    'owl.carousel.min',
		    'jquery.cubeportfolio.min',
		    'waypoints',
		    'jquery.validate.min',
		    'jquery.fitvids',
		    'jquery.parallax-1.1.3',
		    'jquery.superslides',
		    'jquery.flexslider',
		    'jquery.mb.YTPlayer',
		    'portfolio',
			'custom'
			);

			foreach($scripts as $script){
				wp_enqueue_script( $script, THEMESTUDIO_JS . '/'.$script.'.js', false, THEMESTUDIO_THEME_VERSION, true );
			}

			wp_localize_script( 'portfolio', 'ARIVA', array(
				'portfolio_single_loading' => $ts_ariva['portfolio-single-loading'],
			));
			wp_localize_script( 'custom', 'ARIVA', array(
				'menu_onload_state' => $ts_ariva['ts-menu-autohide']
			));

			/**
			 * Check if WooCommerce is active
			 **/
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			    // Put your plugin code here

				$chosen_css = plugins_url('/woocommerce/assets/css/chosen.css');
			 	$chosen_js = plugins_url('/woocommerce/assets/js/chosen/chosen.jquery.min.js');


			    wp_register_style('woocommerce_chosen_styles', $chosen_css, false, THEMESTUDIO_THEME_VERSION, 'screen');
				wp_enqueue_style( 'woocommerce_chosen_styles' );


			    wp_register_script('wc-chosen', $chosen_js, false, THEMESTUDIO_THEME_VERSION, true);
				wp_enqueue_script( 'wc-chosen' );


			    wp_register_style('ts-woocommerce', get_template_directory_uri(). '/woocommerce/woocommerce.css', false, THEMESTUDIO_THEME_VERSION, 'screen');
				wp_enqueue_style( 'ts-woocommerce' );
			}

		}

	}
	add_action('wp_enqueue_scripts','ts_load_js');

}

/**
 * Load stylesheet
 */
if( !function_exists( 'ts_load_css' ) ) {

	/*
	 * Load css
	*/
	function ts_load_css()
	{

		global $ts_ariva;

		$styles = array(
			'bootstrap.min',
			'linea_ecommerce',
			'linea-basic',
		    'owl.carousel',
		    'superslides',
		    'flexslider',
		    'YTPlayer',
		    'cubeportfolio',
		    'styles',
		    'custom',
		    'abbot-addons'
		);

		wp_enqueue_style( 'ariva-style', get_stylesheet_uri() );

		if(isset($ts_ariva['ts-switch-combine-css']) && $ts_ariva['ts-switch-combine-css'] == '1'){
			wp_enqueue_style( 'ariva-combined-css', get_template_directory_uri() . '/assets/combine/do.combine.php?styles='.implode(',', $styles));
		}else {
			foreach($styles as $style){
				wp_enqueue_style( $style, THEMESTUDIO_CSS.'/'.$style.'.css');
			}
		}

	}
	add_action("wp_enqueue_scripts",'ts_load_css');

}

/**
 * Load theme custom stylesheet
 */
if(!function_exists('ts_get_custom_style')){

	/*
	 * get css custom
	*/
	function ts_get_custom_style()
	{

	    global $ts_ariva;	    
	    $return ='';
	    if(isset($ts_ariva['ts-css-code'])){
	    	$custom_css = $ts_ariva['ts-css-code'];
	    } else {
	    	$custom_css = '';
	    }

	    	$custom_css .= '
							.ts-button:hover, .ts-button:focus, input[type="submit"]:hover, input[type="submit"]:focus,
							.more-link:hover, .more-link:focus{
								color: '.$ts_ariva['ts-accent-color'].';
								border: 2px solid '.$ts_ariva['ts-accent-color'].';
							}
							a {
							  color: '.$ts_ariva['ts-accent-color'].';
							}
							.owl-theme .owl-controls .owl-buttons div:hover,
							.owl-theme .owl-controls .owl-buttons div:focus{
								background: '.$ts_ariva['ts-accent-color'].';
							}
							.social-top li a:hover,
							.social-top li a:focus{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.menubar:hover .icon-bar{
								background: '.$ts_ariva['ts-accent-color'].';
							}							
							#menu-main-menu li a:hover,
							#menu-main-menu li a.active{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							#menu-main-menu li a {
								font-family:'.$ts_ariva['ts-menu-font']['font-family'].';
							}
							#menu-main-menu > li ul.dropdown-menu a:hover:before,
							#menu-main-menu > li ul.dropdown-menu a:focus:before{
								background: '.$ts_ariva['ts-accent-color'].';
							}
							.top-info a{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-service-slide hr{
								background: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-service-slide .item-service-slide:hover{
								background: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-item-member .member-icon{
								background: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-item-member .member-social a:hover,
							.ts-item-member .member-social a:focus{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.cbp-l-filters-alignCenter .cbp-filter-item.cbp-filter-item-active{
								border: 1px solid '.$ts_ariva['ts-accent-color'].';
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.cbp-popup-singlePage .cbp-popup-next:hover,
							.cbp-popup-singlePage .cbp-popup-prev:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-pricing-table.active .icon{
								background: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-pricing-table.active .ts-button{
								background: '.$ts_ariva['ts-accent-color'].';
								border: 2px solid '.$ts_ariva['ts-accent-color'].';
							}
							.ts-pricing-table.active .ts-button:hover,
							.ts-pricing-table.active .ts-button:focus{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-testimonial-slide .ts-testimonial-item  .client-position a:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							#map-canvas{
								background-color: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-contact-form input[type="submit"]{
								background: '.$ts_ariva['ts-accent-color'].';
								border: 2px solid '.$ts_ariva['ts-accent-color'].';
							}
							.social-footer li a:hover,
							.social-footer li a:focus{
								border: 2px solid '.$ts_ariva['ts-accent-color'].';
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.blog-item .icon-post-type {
							  background: '.$ts_ariva['ts-accent-color'].';
							}
							.blog-item h3 a:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.blog-date li a:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.blog-item .group-share {
							  color: '.$ts_ariva['ts-accent-color'].';
							}
							.blog-item .ts-button:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.blog-item .blog-link a:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							ul li.cat-item a:hover,
							ul li.cat-item a:focus,
							.widget_recent_entries ul li a:hover,
							.widget_recent_entries ul li a:focus{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							ul li.cat-item a:hover:before,
							.widget_recent_entries ul li a:hover:before{
								 background-color:'.$ts_ariva['ts-accent-color'].';
							}
							.widget_tag_cloud .tagcloud a:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.comment-item .comment-reply-link:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.comment-form input[type="submit"]:hover, .comment-form input[type="submit"]:focus{
								color: '.$ts_ariva['ts-accent-color'].';
								border: 2px solid '.$ts_ariva['ts-accent-color'].';
							}
							.meta-portfolio .social li a:hover{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.button-portfolio{
								background: '.$ts_ariva['ts-accent-color'].';
								border: 2px solid '.$ts_ariva['ts-accent-color'].';
							}
							.widget_recent_comments ul li a{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.widget_meta ul li a abbr{
								color: '.$ts_ariva['ts-accent-color'].'
							}
							.widget_meta ul li a:hover, 
							.widget_meta ul li a:focus,
							.widget_pages ul li a:hover,
							.widget_nav_menu ul li a:hover{
							  color: '.$ts_ariva['ts-accent-color'].';
							}
							.widget_pages ul li a:hover:before,
							.widget_nav_menu ul li a:hover:before,
							.widget_meta ul li a:hover:before{
								background: '.$ts_ariva['ts-accent-color'].'
							}
							.widget_meta ul li:hover abbr[title], .widget_meta ul li:hover abbr[data-original-title] {
							  border-bottom: 1px dotted '.$ts_ariva['ts-accent-color'].';
							}
							#wp-calendar a:hover{
							    color: '.$ts_ariva['ts-accent-color'].';
							}
							.tp-caption .ts-button-wellcome:hover, .ts-button-wellcome:hover{
								color: '.$ts_ariva['ts-accent-color'].'!important;
							}
							.ts-lastest-from-blog .item-post:hover .overlay{
								background: '.$ts_ariva['ts-accent-color'].';
								opacity: 0.85;
								filter: alpha(opacity=85);
							}
							.ts-default-menu a:hover, .ts-default-menu a:focus, .ts-default-menu a.active{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-default-menu a:before{
								background: '.$ts_ariva['ts-accent-color'].';
							}
							.ts-default-menu li > ul.dropdown-menu li a:hover,
							.ts-default-menu li > ul.dropdown-menu li a:focus,
							.ts-default-menu li > ul.dropdown-menu li a.active,
							.ts-default-menu li > ul.dropdown-menu li.active a{
								color: '.$ts_ariva['ts-accent-color'].';
							}
							.woocommerce table.cart a.remove:hover, .woocommerce #content table.cart a.remove:hover, .woocommerce-page table.cart a.remove:hover, .woocommerce-page #content table.cart a.remove:hover {
							        color: '.$ts_ariva['ts-accent-color'].';
							}
							table.cart td.actions .button.alt:hover, 
							#content table.cart td.actions .button.alt:hover{
							    background: '.$ts_ariva['ts-accent-color'].';
							}
							.woocommerce .addresses .title .edit:hover, .woocommerce-page .addresses .title .edit:hover{
							    background: '.$ts_ariva['ts-accent-color'].';
							}
							.woocommerce-page .woocommerce-message .button:hover, 
							.woocommerce-page .woocommerce-error .button:hover, 
							.woocommerce-page .woocommerce-info .button:hover {
							   background: '.$ts_ariva['ts-accent-color'].';
							}
							div.products div.product h3 a:hover{
							     color: '.$ts_ariva['ts-accent-color'].';
							}
							div.products div.product .price{
							    color: '.$ts_ariva['ts-accent-color'].';
							}
							ins span.amount {
							    color: '.$ts_ariva['ts-accent-color'].';
							}
							.woocommerce  a.button.product_type_simple:hover,
							.woocommerce  a.button.product_type_variable:hover,
							.woocommerce  a.button.add_to_cart_button:hover,
							.woocommerce  a.button.product_type_simple.added:hover,
							.woocommerce  a.button.product_type_simple:hover{
							    background: '.$ts_ariva['ts-accent-color'].';
							    color: '.$ts_ariva['ts-accent-color'].';
							}
							div.products div.product .onsale, 
							div.products div.product .product-thumbnail-image-wrap span.onsale{
							    background: '.$ts_ariva['ts-accent-color'].';
							}
							.single-product .product > .onsale{
								background: '.$ts_ariva['ts-accent-color'].';
							   }
							#commentform .stars > span a:hover:before, #commentform .stars > span a.active:before {
							  color: '.$ts_ariva['ts-accent-color'].';
							}
							.woocommerce .comment-form input[type="submit"]:hover{
							    background: '.$ts_ariva['ts-accent-color'].';
							}
							.shipping_calculator h2 a:hover{
							    color: '.$ts_ariva['ts-accent-color'].';
							}
							.products div.product .added_to_cart.wc-forward:hover{
							    background-color: '.$ts_ariva['ts-accent-color'].';
							}
							li.mini-shoping-cart-wraper .buttons a:hover{
							    background: '.$ts_ariva['ts-accent-color'].';
							}
							.widget_price_filter .ui-slider-horizontal {
							    background: '.$ts_ariva['ts-accent-color'].';
							}
							.widget_price_filter .ui-slider .ui-slider-handle:before{
								border-bottom-color: '.$ts_ariva['ts-accent-color'].';
							}
							.widget_price_filter .price_slider_amount .button:hover{
							    background: '.$ts_ariva['ts-accent-color'].';
							    border-color: '.$ts_ariva['ts-accent-color'].';
							}
							.star-rating span {
							    color: '.$ts_ariva['ts-accent-color'].';
							}
							.shoping-cart-widget .product_list_widget span.amount{
							    color: '.$ts_ariva['ts-accent-color'].';
							}
							div.product  .button:hover{
							    background: '.$ts_ariva['ts-accent-color'].';
							}
							.widget_shopping_cart_content .buttons > a:hover,
							.widget_shopping_cart_content .buttons > a:focus{
								background: '.$ts_ariva['ts-accent-color'].';
								border-color: '.$ts_ariva['ts-accent-color'].';
							}
							.widget_product_tag_cloud .tagcloud a:hover{
								border-color: '.$ts_ariva['ts-accent-color'].';
								color: '.$ts_ariva['ts-accent-color'].';
							}


	    				';
	    				$menu_bg_color = hex2rgb($ts_ariva['ts-menu-bg-color']);
						// css style for menu
	    				$custom_css .= '
		    				.main-header {
						    /* Fallback for web browsers that don\'t support RGBa */
						    background-color: rgb('.esc_attr($menu_bg_color['0'].','.$menu_bg_color['1'].','.$menu_bg_color['2']).');
						    /* RGBa with 0.6 opacity */
						    background-color: rgba('.esc_attr($menu_bg_color['0'].','.$menu_bg_color['1'].','.$menu_bg_color['2']).', '.$ts_ariva['ts-menu-bg-opacity'].');
						    /* For IE 5.5 - 7*/
						    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='.$ts_ariva['ts-menu-bg-color'].', endColorstr='.$ts_ariva['ts-menu-bg-color'].');
						    /* For IE 8*/
						    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='.$ts_ariva['ts-menu-bg-color'].', endColorstr='.$ts_ariva['ts-menu-bg-color'].')";
						}';

						if ($ts_ariva['ts-menu-autohide'] == 'menu_hide') {
							$custom_css .= '
							.header-1{display:none;}';
						}

				
	    $return.= $custom_css;

	    if ( is_user_logged_in() ) {
	    	$return.='
	    		header { margin-top: 32px; }
	    		#slides{margin-top: -32px;}
				@media(max-width: 767px){
					header{margin-top: 46px;}
					#slides{margin-top: -46px;
				}
	    	';
	    }

	    wp_add_inline_style( 'custom', $return );
	}
	add_action( 'wp_enqueue_scripts', 'ts_get_custom_style' );

}