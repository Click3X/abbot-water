<?php
	/*
	 * Load Framework
	*/
	require_once ( "core/init.php");


	add_action( 'after_setup_theme', 'newimg_theme_setup' );
	function newimg_theme_setup() {
	 	add_image_size( 'square-500', 500, 500 );
	}