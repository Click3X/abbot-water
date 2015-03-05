<?php

	global $ts_ariva;
    $sidebar = 'Primary Sidebar(Right Sidebar)';
	if ( function_exists('register_sidebar') && ($sidebar <> '')){

		/*
		 * Register sidebar
		*/
		register_sidebar(
			array(
				'name' => str_replace("_"," ",$sidebar),
				'id'            => 'primary',
			    'description' => esc_html__( 'This is land of page sidebar','themestudio' ),
				'before_title' =>'<h3 class="sidebar_title">',
				'after_title' =>'</h3>',
				'before_widget' => '<div  id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
			)
		);
		if ( function_exists('register_sidebar'))	
		register_sidebar(
			array(
				'name' => esc_html__( 'Subcribe widget', 'themestudio' ),
				'id'            => 'ts-subcribe-widget',
				'description' => esc_html__( 'This is Subcribe widget','themestudio' ),
				'before_title' =>'<h2 class="widget-title">',
				'after_title' =>'</h2>',
				'before_widget' => '<div class="%1$s widget %2$s">',
				'after_widget' => '</div>',
			)
      	);
	}
	/**
	   * Check if WooCommerce is active
	   **/
	  if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	  	/*
		 * Register minicart sidebar
		*/
		register_sidebar(
			array(
				'name' => esc_html__( 'Mini Cart Sidebar', 'themestudio' ),
				'id'            => 'ts_shoping_cart_sidebar',
			    'description' => esc_html__( 'This is shoping cart sidebar','themestudio' ),
				'before_title' =>'',
				'after_title' =>'',
				'before_widget' => '<div  id="%1$s" class="shoping-cart-widget %2$s">',
				'after_widget' => '</div>',
			)
		);

		// Register shop page sidebar
		register_sidebar(
			array(
				'name' => esc_html__( 'Shop Sidebar', 'themestudio' ),
				'id'            => 'ts_shop_sidebar',
			    'description' => esc_html__( 'This is shoping cart sidebar','themestudio' ),
				'before_title' =>'',
				'after_title' =>'',
				'before_widget' => '<div  id="%1$s" class="shoping-cart-widget %2$s">',
				'after_widget' => '</div>',
			)
		);
	}
	


	/*
	 * register navigation menus
	*/
	register_nav_menus(
	    array(
	      	'onepage_menu'  => __('Onepage Menu','themestudio'),
	      	'megamenu'  => __('Default Menu','themestudio'),
	    )
	);