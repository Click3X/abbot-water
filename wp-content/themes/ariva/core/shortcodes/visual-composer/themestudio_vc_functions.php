<?php
if (class_exists('Vc_Manager')) {

	add_action( 'init', 'themestudio_register_vc_shortcodes' );
	function themestudio_register_vc_shortcodes() {
//****************************************************** Variable ******************************************************//
	$add_yes_no = array(
			'type' => 'dropdown',
			'heading' => __( 'Choose Animation', 'themestudio' ),
			'param_name' => 'onclick',
			'value' => array(
				__( 'No', 'themestudio' ) => 'no',
				__( 'Yes', 'themestudio' ) => 'yes'
			),
			'description' => __( 'Define action for choose event if needed.', 'themestudio' )
			);
	$add_css_animation = array(
		'type' => 'dropdown',
		'heading' => __( 'CSS Animation', 'themestudio' ),
		'param_name' => 'css_animation',
		'admin_label' => true,
		'value' => array(
			__( 'No', 'themestudio' ) => '',
			__( 'bounce', 'themestudio' ) => 'bounce',
			__( 'rubberBand', 'themestudio' ) => 'rubberBand',
			__( 'flash', 'themestudio' ) => 'flash',
			__( 'pulse', 'themestudio' ) => 'pulse',
			__( 'shake', 'themestudio' ) => 'shake',
			__( 'swing', 'themestudio' ) => 'swing',
			__( 'tada', 'themestudio' ) => 'tada',
			__( 'wobble', 'themestudio' ) => 'wobble',

__( 'bounceIn', 'themestudio' ) => 'bounceIn',
			__( 'bounceInDown', 'themestudio' ) => 'bounceInDown',
			__( 'bounceInLeft', 'themestudio' ) => 'bounceInLeft',
			__( 'bounceInRight', 'themestudio' ) => 'bounceInRight',
			__( 'bounceInUp', 'themestudio' ) => 'bounceInUp',
			__( 'bounceOut', 'themestudio' ) => 'bounceOut',
			__( 'bounceOutDown', 'themestudio' ) => 'bounceOutDown',
			__( 'bounceOutLeft', 'themestudio' ) => 'bounceOutLeft',
__( 'bounceOutRight', 'themestudio' ) => 'bounceOutRight',
			__( 'bounceOutUp', 'themestudio' ) => 'bounceOutUp',
			__( 'fadeIn', 'themestudio' ) => 'fadeIn',
			__( 'fadeInDown', 'themestudio' ) => 'fadeInDown',
			__( 'fadeInDownBig', 'themestudio' ) => 'fadeInDownBig',
			__( 'fadeInLeft', 'themestudio' ) => 'fadeInLeft',
			__( 'fadeInLeftBig', 'themestudio' ) => 'fadeInLeftBig',
			__( 'fadeInRight', 'themestudio' ) => 'fadeInRight',
__( 'fadeInRightBig', 'themestudio' ) => 'fadeInRightBig',
			__( 'fadeInUp', 'themestudio' ) => 'fadeInUp',
			__( 'fadeInUpBig', 'themestudio' ) => 'fadeInUpBig',
			__( 'fadeOut', 'themestudio' ) => 'fadeOut',
			__( 'fadeOutDown', 'themestudio' ) => 'fadeOutDown',
			__( 'fadeOutDownBig', 'themestudio' ) => 'fadeOutDownBig',
			__( 'fadeOutLeft', 'themestudio' ) => 'fadeOutLeft',
			__( 'fadeOutLeftBig', 'themestudio' ) => 'fadeOutLeftBig',
__( 'fadeOutRight', 'themestudio' ) => 'fadeOutRight',
			__( 'fadeOutRightBig', 'themestudio' ) => 'fadeOutRightBig',
			__( 'fadeOutUp', 'themestudio' ) => 'fadeOutUp',
			__( 'fadeOutUpBig', 'themestudio' ) => 'fadeOutUpBig',
			__( 'flip', 'themestudio' ) => 'flip',
			__( 'flipInX', 'themestudio' ) => 'flipInX',
			__( 'flipInY', 'themestudio' ) => 'flipInY',
			__( 'flipOutX', 'themestudio' ) => 'flipOutX',
__( 'flipOutY', 'themestudio' ) => 'flipOutY',
			__( 'lightSpeedIn', 'themestudio' ) => 'lightSpeedIn',
			__( 'lightSpeedOut', 'themestudio' ) => 'lightSpeedOut',
			__( 'rotateIn', 'themestudio' ) => 'rotateIn',
			__( 'rotateInDownLeft', 'themestudio' ) => 'rotateInDownLeft',
			__( 'rotateInDownRight', 'themestudio' ) => 'rotateInDownRight',
			__( 'rotateInUpLeft', 'themestudio' ) => 'rotateInUpLeft',
			__( 'rotateInUpRight', 'themestudio' ) => 'rotateInUpRight',
__( 'rotateOut', 'themestudio' ) => 'rotateOut',
			__( 'rotateOutDownLeft', 'themestudio' ) => 'rotateOutDownLeft',
			__( 'rotateOutDownRight', 'themestudio' ) => 'rotateOutDownRight',
			__( 'rotateOutUpLeft', 'themestudio' ) => 'rotateOutUpLeft',
			__( 'rotateOutUpRight', 'themestudio' ) => 'rotateOutUpRight',
			__( 'hinge', 'themestudio' ) => 'hinge',
			__( 'rollIn', 'themestudio' ) => 'rollIn',
			__( 'rollOut', 'themestudio' ) => 'rollOut',

			__( 'zoomIn', 'themestudio' ) => 'zoomIn',
			__( 'zoomInDown', 'themestudio' ) => 'zoomInDown',
			__( 'zoomInLeft', 'themestudio' ) => 'zoomInLeft',
			__( 'zoomInRight', 'themestudio' ) => 'zoomInRight',
			__( 'zoomInUp', 'themestudio' ) => 'zoomInUp',
			__( 'zoomOut', 'themestudio' ) => 'zoomOut',
			__( 'zoomOutDown', 'themestudio' ) => 'zoomOutDown',
			__( 'zoomOutLeft', 'themestudio' ) => 'zoomOutLeft',
			__( 'zoomOutRight', 'themestudio' ) => 'zoomOutRight',
			__( 'zoomOutUp', 'themestudio' ) => 'zoomOutUp',
			__( 'Appear from center', 'themestudio' ) => "appear"
		),
		'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'themestudio' ),
		'dependency' => array(
				'element' => 'onclick',
				'value' => array( 'yes' )
			)
	);


	$data_wow_delay = array(
					"type" => "textfield",
		            "holder" => "div",
		            "class" => "",
		            "heading" => __("Data Wow Delay",'themestudio'),
		            "param_name" => "data_wow_delay",
		            "value" => "",
		            "description" => __("Data Wow Delay eg:0.2s,0.3s ...",'themestudio'),
		            'dependency' => array(
					'element' => 'onclick',
					'value' => array( 'yes' )
					)
		);
	$data_wow_duration = array(
					"type" => "textfield",
		            "holder" => "div",
		            "class" => "",
		            "heading" => __("Data Wow Duration",'themestudio'),
		            "param_name" => "data_wow_duration",
		            "value" => "",
		            "description" => __("Data Wow Duration eg:0.2s,0.3s ...",'themestudio'),
		            'dependency' => array(
					'element' => 'onclick',
					'value' => array( 'yes' )
					)
		);
	$add_css_style = array(
	     'type' => 'css_editor',
	     'heading' => __( 'Css', 'themestudio' ),
	     'param_name' => 'css',
	     'group' => __( 'Design options', 'themestudio' )
	    );

	$add_css_awesome = array(
		'type' => 'dropdown',
		'heading' => __( 'font awesome icon class', 'themestudio' ),
		'param_name' => 'css_awesome',
		'admin_label' => true,
		'value' => array(
			__( "No", "themestudio" ) => "",				
			__( "fa-music","themestudio" ) =>  "fa-music",
			__( "fa-tint","themestudio" ) =>  "fa-tint",
			__( "fa-magic","themestudio" ) =>  "fa-magic",
			__( "fa-camera-retro", 'themestudio' ) =>  "fa-camera-retro",
			__( "fa-phone", 'themestudio' ) =>  "fa-phone",
			__( "fa-map-marker", 'themestudio' ) =>  "fa-map-marker",
			__( "fa-envelope", 'themestudio' ) =>  "fa-envelope",
			__( "fa-coffee", 'themestudio' ) =>  "fa-coffee",
			__( "fa-thumbs-up", 'themestudio' ) =>  "fa-thumbs-up",
			__( "fa-user", 'themestudio' ) =>  "fa-user",
			__( "fa-truck", 'themestudio' ) =>  "fa-truck",
			__( "fa-lock", 'themestudio' ) =>  "fa-lock",
			__( "fa-money", 'themestudio' ) =>  "fa-money",
			__( "fa-adjust",'themestudio')	=> "fa-adjust",
			__( "fa-align-center",'themestudio')	=> "fa-align-center",
			__( "fa-align-justify",'themestudio')	=> "fa-align-justify",
			__( "fa-align-left",'themestudio')	=> "fa-align-left",
			__( "fa-align-right",'themestudio')	=> "fa-align-right",
			__( "fa-ambulance",'themestudio')	=> "fa-ambulance",
			__( "fa-angle-down",'themestudio')	=> "fa-angle-down",
			__( "fa-angle-left",'themestudio')	=> "fa-angle-left",
			__( "fa-angle-right",'themestudio')	=> "fa-angle-right",
			__( "fa-angle-up",'themestudio')	=> "fa-angle-up",
			__( "fa-arrow-down",'themestudio')	=> "fa-arrow-down",
			__( "fa-arrow-left",'themestudio')	=> "fa-arrow-left",
			__( "fa-arrow-right",'themestudio')	=> "fa-arrow-right",
			__( "fa-arrow-up",'themestudio')	=> "fa-arrow-up",
			__( "fa-apple",'themestudio')	=> "fa-apple",
			__( "fa-asterisk",'themestudio')	=> "fa-asterisk",
			__( "fa-backward",'themestudio')	=> "fa-backward",			
			__( "fa-barcode",'themestudio')	=> "fa-barcode",			
			__( "fa-beer",'themestudio')	=> "fa-beer",
			__( "fa-bell",'themestudio')	=> "fa-bell",			
			__( "fa-bug",'themestudio')	=> "fa-bug",
			__( "fa-bold",'themestudio')	=> "fa-bold",
			__( "fa-bolt",'themestudio')	=> "fa-bolt",
			__( "fa-book",'themestudio')	=> "fa-book",
			__( "fa-bookmark",'themestudio')	=> "fa-bookmark",			
			__( "fa-briefcase",'themestudio')	=> "fa-briefcase",
			__( "fa-building",'themestudio')	=> "fa-building",
			__( "fa-bullhorn",'themestudio')	=> "fa-bullhorn",
			__( "fa-calendar",'themestudio')	=> "fa-calendar",
			__( "fa-camera",'themestudio')	=> "fa-camera",			
			__( "fa-caret-down",'themestudio')	=> "fa-caret-down",
			__( "fa-caret-left",'themestudio')	=> "fa-caret-left",
			__( "fa-caret-right",'themestudio')	=> "fa-caret-right",
			__( "fa-caret-up",'themestudio')	=> "fa-caret-up",
			__( "fa-certificate",'themestudio')	=> "fa-certificate",
			__( "fa-check",'themestudio')	=> "fa-check",			
			__( "fa-chevron-down",'themestudio')	=> "fa-chevron-down",
			__( "fa-chevron-left",'themestudio')	=> "fa-chevron-left",
			__( "fa-chevron-right",'themestudio')	=> "fa-chevron-right",
			__( "fa-chevron-up",'themestudio')	=> "fa-chevron-up",
			__( "fa-circle",'themestudio')	=> "fa-circle",						
			__( "fa-cloud",'themestudio')	=> "fa-cloud",
			__( "fa-cloud-download",'themestudio')=> "fa-cloud-download",
			__( "fa-cloud-upload",'themestudio')	=> "fa-cloud-upload",
			__( "fa-code",'themestudio')	=> "fa-code",			
			__( "fa-cog",'themestudio')	=> "fa-cog",
			__( "fa-cogs",'themestudio')	=> "fa-cogs",
			__( "fa-columns",'themestudio')	=> "fa-columns",
			__( "fa-comment",'themestudio')	=> "fa-comment",			
			__( "fa-comments",'themestudio')	=> "fa-comments",			
			__( "fa-copy",'themestudio')	=> "fa-copy",
			__( "fa-credit-card",'themestudio')	=> "fa-credit-card",
			__( "fa-crop",'themestudio')	=> "fa-crop",
			__( "fa-cut",'themestudio')	=> "fa-cut",
			__( "fa-dashboard",'themestudio')	=> "fa-dashboard",
			__( "fa-desktop",'themestudio')	=> "fa-desktop",			
			__( "fa-download",'themestudio')	=> "fa-download",			
			__( "fa-edit",'themestudio')	=> "fa-edit",
			__( "fa-eject",'themestudio')	=> "fa-eject",						
			__( "fa-exchange",'themestudio')	=> "fa-exchange",			
			__( "fa-external-link",'themestudio')	=> "fa-external-link",			
			__( "fa-facebook",'themestudio')	=> "fa-facebook",			
			__( "fa-fast-backward",'themestudio')	=> "fa-fast-backward",
			__( "fa-fast-forward",'themestudio')	=> "fa-fast-forward",
			__( "fa-fighter-jet",'themestudio')	=> "fa-fighter-jet",
			__( "fa-file",'themestudio')	=> "fa-file",			
			__( "fa-film",'themestudio')	=> "fa-film",
			__( "fa-filter",'themestudio')	=> "fa-filter",
			__( "fa-fire",'themestudio')	=> "fa-fire",
			__( "fa-flag",'themestudio')	=> "fa-flag",			
			__( "fa-folder-open",'themestudio')	=> "fa-folder-open",			
			__( "fa-font",'themestudio')	=> "fa-font",			
			__( "fa-forward",'themestudio')	=> "fa-forward",
			__( "fa-fullscreen",'themestudio')	=> "fa-fullscreen",
			__( "fa-gift",'themestudio')	=> "fa-gift",
			__( "fa-github",'themestudio')	=> "fa-github",
			__( "fa-github-alt",'themestudio')	=> "fa-github-alt",			
			__( "fa-glass",'themestudio')	=> "fa-glass",
			__( "fa-globe",'themestudio')	=> "fa-globe",
			__( "fa-google-plus",'themestudio')	=> "fa-google-plus",			
			__( "fa-group",'themestudio')	=> "fa-group",			
			__( "fa-headphones",'themestudio')	=> "fa-headphones",
			__( "fa-heart",'themestudio')	=> "fa-heart",			
			__( "fa-home",'themestudio')	=> "fa-home",
			__( "fa-hospital",'themestudio')	=> "fa-hospital",
			__( "fa-html5",'themestudio')	=> "fa-html5",
			__( "fa-inbox",'themestudio')	=> "fa-inbox",
			__( "fa-italic",'themestudio')	=> "fa-italic",
			__( "fa-key",'themestudio')	=> "fa-key",
			__( "fa-laptop",'themestudio')	=> "fa-laptop",
			__( "fa-leaf",'themestudio')	=> "fa-leaf",
			__( "fa-legal",'themestudio')	=> "fa-legal",			
			__( "fa-link",'themestudio')	=> "fa-link",
			__( "fa-linkedin",'themestudio')	=> "fa-linkedin",			
			__( "fa-list",'themestudio')	=> "fa-list",
			__( "fa-list-alt",'themestudio')	=> "fa-list-alt",
			__( "fa-list-ol",'themestudio')	=> "fa-list-ol",
			__( "fa-list-ul",'themestudio')	=> "fa-list-ul",
			__( "fa-lock",'themestudio')	=> "fa-lock",			
			__( "fa-magnet",'themestudio')	=> "fa-magnet",			
			__( "fa-medkit",'themestudio')	=> "fa-medkit",
			__( "fa-minus",'themestudio')	=> "fa-minus",			
			__( "fa-mobile-phone",'themestudio')	=> "fa-mobile-phone",
			__( "fa-money",'themestudio')	=> "fa-money",
			__( "fa-move",'themestudio')	=> "fa-move",						
			__( "fa-paste",'themestudio')	=> "fa-paste",
			__( "fa-pause",'themestudio')	=> "fa-pause",
			__( "fa-pencil",'themestudio')	=> "fa-pencil",						
			__( "fa-picture-o",'themestudio')	=> "fa-picture-o",
			__( "fa-pinterest",'themestudio')	=> "fa-pinterest",			
			__( "fa-plane",'themestudio')	=> "fa-plane",
			__( "fa-play",'themestudio')	=> "fa-play",
			__( "fa-play-circle",'themestudio')	=> "fa-play-circle",
			__( "fa-plus",'themestudio')	=> "fa-plus",			
			__( "fa-print",'themestudio')	=> "fa-print",			
			__( "fa-qrcode",'themestudio')	=> "fa-qrcode",			
			__( "fa-quote-left",'themestudio')	=> "fa-quote-left",
			__( "fa-quote-right",'themestudio')	=> "fa-quote-right",
			__( "fa-random",'themestudio')	=> "fa-random",
			__( "fa-refresh",'themestudio')	=> "fa-refresh",			
			__( "fa-reorder",'themestudio')	=> "fa-reorder",
			__( "fa-repeat",'themestudio')	=> "fa-repeat",
			__( "fa-reply",'themestudio')	=> "fa-reply",
			__( "fa-resize-full",'themestudio')	=> "fa-resize-full",
			__( "fa-resize-horizontal",'themestudio')	=> "fa-resize-horizontal",
			__( "fa-resize-small",'themestudio')	=> "fa-resize-small",
			__( "fa-resize-vertical",'themestudio')	=> "fa-resize-vertical",
			__( "fa-retweet",'themestudio')	=> "fa-retweet",
			__( "fa-road",'themestudio')	=> "fa-road",
			__( "fa-rss",'themestudio')	=> "fa-rss",
			__( "fa-save",'themestudio')	=> "fa-save",			
			__( "fa-search",'themestudio')	=> "fa-search",
			__( "fa-share",'themestudio')	=> "fa-share",			
			__( "fa-shopping-cart",'themestudio')	=> "fa-shopping-cart",			
			__( "fa-signal",'themestudio')	=> "fa-signal",
			__( "fa-sitemap",'themestudio')	=> "fa-sitemap",
			__( "fa-sort",'themestudio')	=> "fa-sort",
			__( "fa-sort-down",'themestudio')	=> "fa-sort-down",
			__( "fa-sort-up",'themestudio')	=> "fa-sort-up",
			__( "fa-spinner",'themestudio')	=> "fa-spinner",
			__( "fa-star",'themestudio')	=> "fa-star",			
			__( "fa-star-half",'themestudio')	=> "fa-star-half",
			__( "fa-step-backward",'themestudio')	=> "fa-step-backward",
			__( "fa-step-forward",'themestudio')	=> "fa-step-forward",
			__( "fa-stethoscope",'themestudio')	=> "fa-stethoscope",
			__( "fa-stop",'themestudio')	=> "fa-stop",
			__( "fa-strikethrough",'themestudio')	=> "fa-strikethrough",
			__( "fa-suitcase",'themestudio')	=> "fa-suitcase",
			__( "fa-table",'themestudio')	=> "fa-table",
			__( "fa-tablet",'themestudio')	=> "fa-tablet",
			__( "fa-tag",'themestudio')	=> "fa-tag",
			__( "fa-tags",'themestudio')	=> "fa-tags",
			__( "fa-tasks",'themestudio')	=> "fa-tasks",
			__( "fa-text-height",'themestudio')	=> "fa-text-height",
			__( "fa-text-width",'themestudio')	=> "fa-text-width",
			__( "fa-th",'themestudio')	=> "fa-th",
			__( "fa-th-large",'themestudio')	=> "fa-th-large",
			__( "fa-th-list",'themestudio')	=> "fa-th-list",
			__( "fa-thumbs-down",'themestudio')	=> "fa-thumbs-down",
			__( "fa-thumbs-up",'themestudio')	=> "fa-thumbs-up",			
			__( "fa-trophy",'themestudio')	=> "fa-trophy",
			__( "fa-truck",'themestudio')	=> "fa-truck",
			__( "fa-twitter",'themestudio')	=> "fa-twitter",			
			__( "fa-umbrella",'themestudio')	=> "fa-umbrella",
			__( "fa-underline",'themestudio')	=> "fa-underline",
			__( "fa-undo",'themestudio')	=> "fa-undo",
			__( "fa-unlock",'themestudio')	=> "fa-unlock",
			__( "fa-upload",'themestudio')	=> "fa-upload",			
			__( "fa-user",'themestudio')	=> "fa-user",
			__( "fa-user-md",'themestudio')	=> "fa-user-md",
			__( "fa-user-md",'themestudio')	=> "fa-user-md",
			__( "fa-volume-down",'themestudio')	=> "fa-volume-down",
			__( "fa-volume-off",'themestudio')	=> "fa-volume-off",
			__( "fa-volume-up",'themestudio')	=> "fa-volume-up",			
			__( "fa-wrench",'themestudio')	=> "fa-wrench",	
		),
		'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'themestudio' ),
	);




//******************************************************************************************************/
// font basic
//******************************************************************************************************/
$add_css_basic = array(
		'type' => 'dropdown',
		'heading' => __( 'font Basic icon class', 'themestudio' ),
		'param_name' => 'css_basic',
		'admin_label' => true,
		'value' => array(
			__( 'No', 'themestudio' ) => '',
			__( 'icon-basic-joypad', 'themestudio' ) => 'icon-basic-joypad',
			__( 'icon-basic-keyboard', 'themestudio' ) => 'icon-basic-keyboard',
			__( 'icon-basic-laptop', 'themestudio' ) => 'icon-basic-laptop',
			__( 'icon-basic-accelerator', 'themestudio' ) => 'icon-basic-accelerator',
			__( 'icon-basic-alarm', 'themestudio' ) => 'icon-basic-alarm',
			__( 'icon-basic-anchor', 'themestudio' ) => 'icon-basic-anchor',
			__( 'icon-basic-anticlockwise', 'themestudio' ) => 'icon-basic-anticlockwise',
			__( 'icon-basic-archive', 'themestudio' ) => 'icon-basic-archive',
			__( 'icon-basic-archive-full', 'themestudio' ) => 'icon-basic-archive-full',
			__( 'icon-basic-ban', 'themestudio' ) => 'icon-basic-ban',
			),

		'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'themestudio' ),
	);


//******************************************************************************************************/
// Section/ Block title
//******************************************************************************************************/

	vc_map( array(
	"name" => __("Section/ block title",'themestudio'),
    "base" => "themestudio_title",
    "class" => "",
    "category" => __('ARIVA Blocks','themestudio'),
    "params" => array(
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Title",'themestudio'),
              "param_name" => "title",
              "value" => "",
              "description" => __("Enter section title ",'themestudio')
          ),
  		 array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Title alignment","themestudio"),
            "param_name" => "align",
            "value" => array(
	            	'Align center '=>'align-center',
	            	'Align left'=>'align-left',
	            	'Align right '=>'align-right'
            	),
            "description" => __("Align title to the left/right or center","themestudio")
		),
  		array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Subtitle alignment","themestudio"),
            "param_name" => "text_align",
            "value" => array(
	            	'Align center '=>'center',
	            	'Align left'=>'left',
	            	'Align right '=>'right'
            	),
            "description" => __("Align subtitle to the left/right or center","themestudio")
		),
	 	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Title color","themestudio"),
	        "param_name" => "title_color",
	        "value" => '#252525', //Default Red color
	        "description" => __("Choose color for title","themestudio")
	        ), 

	 	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Under line color","themestudio"),
	        "param_name" => "underline_color",
	        "value" => '#252525', //Default Red color
	        "description" => __("Choose color for underline","themestudio")
	        ),
	    array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" => __("",'themestudio'),
              "description" => __("Subtitle content",'themestudio')
          ), 
	    $add_css_style,
    )
	));
//******************************************************************************************************/
// Button Welcome 
//******************************************************************************************************/
	vc_map( array(
   		"name" => __("Button Welcome",'themestudio'),
        "base" => "ts_button_welcom",
        "class" => "",
        "category" => __('ARIVA Blocks','themestudio'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Text Button",'themestudio'),
              "param_name" => "text_button",
              "value" => "",
              "description" => __("Add Text Button",'themestudio')
          ), 
	       array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Link Button",'themestudio'),
              "param_name" => "link_button",
              "value" => "",
              "description" => __("Add Link Button",'themestudio')
          ),
	       array(
	            "type" => "dropdown",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Postion Button","themestudio"),
	            "param_name" => "postion_button",
	            'value' => array(
					__( 'No', 'themestudio' ) => '',
					__( 'Right', 'themestudio' ) => 'pull-right',
					__( 'Left', 'themestudio' ) => 'pull-left'
				),
		    ),
         
        )
   	));
//******************************************************************************************************/
// FUNFACT
//******************************************************************************************************/

	vc_map( array(
   		"name" => __("Box Funfact",'themestudio'),
        "base" => "fun_fact",
        "class" => "",
        "category" => __('ARIVA Blocks','themestudio'),
        "params" => array(
          array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Funfact number",'themestudio'),
              "param_name" => "number_funfact",
              "value" => "",
              "description" => __("Number for funfact",'themestudio')
          ),
          array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Funfact title",'themestudio'),
              "param_name" => "title_funfact",
              "value" => "",
              "description" => __("Funfact title",'themestudio')
          ),

          $add_css_style,
          //$add_yes_no,
          //$add_css_animation,
          //$data_wow_delay,
          //$data_wow_duration,
          //$add_css_awesome,
        )
   	));

//******************************************************************************************************/
// Team Member
//******************************************************************************************************/
 vc_map( array(
   		"name" => __("Team Member",'themestudio'),
        "base" => "ts_team_member",
        "class" => "",
        "category" => __('ARIVA Blocks','themestudio'),
        "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("Member's avatar","themestudio"),
            "param_name" => "bg_member",
            "value" => '',
            "description" => __("Upload member's avatar","themestudio")
        		),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's name",'themestudio'),
              "param_name" => "name_member",
              "value" => __("ROBERT SMITH",'themestudio'),
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's postion",'themestudio'),
              "param_name" => "member_postion",
              "value" => __("Senior Designer",'themestudio'),
              "description" => ""
          ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Postion display","themestudio"),
            "param_name" => "css_member",
            "value" => array(
	            	'member-left'=>'member-left',
	            	'member-center'=>'member-center',
	            	'member-right'=>'member-right'
            	),
            "description" => __("Postion display member fontpage","themestudio")
	        ),
        array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Biography",'themestudio'),
              "param_name" => "content",
              "value" => __("Proactively expedite corporate data via premium materials. Assertively iterate extensible best practices before visionary functionalities. ",'themestudio'),
              "description" => __("Biography for member",'themestudio')
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's Facebook url",'themestudio'),
              "param_name" => "fa_facebook",
              "value" => "",
              "description" => ""
          ), array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's twitter url",'themestudio'),
              "param_name" => "fa_tiwtter",
              "value" => "#",
              "description" => ""
          ), array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's Google plus url",'themestudio'),
              "param_name" => "fa_google",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's behance url",'themestudio'),
              "param_name" => "fa_behance",
              "value" => "#",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's dribble url",'themestudio'),
              "param_name" => "fa_dribble",
              "value" => "#",
              "description" => ""
          ),

          //$add_yes_no,
          //$add_css_animation,
          //$data_wow_delay,
          //$data_wow_duration,
          //$add_css_awesome,
          $add_css_style,
        )
   	));

//******************************************************************************************************/
// Box Contact
//******************************************************************************************************/
	vc_map( array(
   		"name" => __("Contact",'themestudio'),
        "base" => "box_contact",
        "class" => "",
        "category" => __('ARIVA Blocks','themestudio'),
        "params" => array(
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Custom class",'themestudio'),
              "param_name" => "el_class",
              "value" => "",
              "description" => __("Add custom class for this shortcode block",'themestudio')
          ),
          $add_css_awesome,
          array(
		        "type" => "colorpicker",
		        "holder" => "div",
	            "class" => "",
	            "heading" => __("Line Undre Icon","themestudio"),
	            "param_name" => "line_under_icon",
	            "value" => '#252525', //Default Red color
	            "description" => __("Choose color line under Icon","themestudio")
	            ),
          array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" => __("<div><p><strong>121 King Street, Melbourne ,Victoria 3000 Australia</strong></p></div>",'themestudio'),
              "description" => __("Add content",'themestudio')
          ),
          $add_css_style,
          // $add_yes_no,
          // $add_css_animation,
          // $data_wow_delay,
          // $data_wow_duration,
        )
   	));

//******************************************************************************************************/
// Portfolio
//******************************************************************************************************/
	vc_map( array(
	      "name" => __("Portfolio",'themestudio'),
	      "base" => "ts_portfolio",
	      "class" => "",
	      "category" => __('ARIVA Blocks','themestudio'),
	      "params" => array(
		   	array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Portfolio item width",'themestudio'),
              "param_name" => "portfolio_item_width",
              "value" => "474",
              "description" => __("Portfolio item width in pixel",'themestudio')
          ),
        	array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Portfolio item height",'themestudio'),
              "param_name" => "portfolio_item_height",
              "value" => "350",
              "description" => __("Portfolio item height in pixel",'themestudio')
          ),
        	array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Portfolio hover background opacity",'themestudio'),
              "param_name" => "portfolio_hover_opacity",
              "value" => "0.85",
              "description" => __("Portfolio hover opacity from 0 to 1 default is 0.85",'themestudio')
          ),
      		array(
	            "type" => "dropdown",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Portfolio single loading style","themestudio"),
	            "param_name" => "portfolio_single_loading",
	            'value' => array(
					__( 'Load AJAX', 'themestudio' ) => 'ajax',
					__( 'Redirect', 'themestudio' ) => 'redirect'
				),
		    ),
      		array(
	            "type" => "dropdown",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Show/hide portfolio filter","themestudio"),
	            "param_name" => "portfolio_filter_switch",
	            'value' => array(
					__( 'Show filter', 'themestudio' ) => 'show-filter',
					__( 'Hide filter', 'themestudio' ) => 'hide-filter'
				),
		    ),
		    array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Number portfolio per page ",'themestudio'),
              "param_name" => "posts_per_page",
              "value" => "",
              "description" => __("Number portfolio per page ",'themestudio')
          ),
		  array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Custom class",'themestudio'),
              "param_name" => "el_class",
              "value" => "",
              "description" => __("Add custom class for this shortcode block",'themestudio')
          ),
		    $add_css_style,

	      )
	   ));

//******************************************************************************************************/
// Text Dropcap
//******************************************************************************************************/
vc_map( array(
	      "name" => __("Text dropcap",'themestudio'),
	      "base" => "text_dropcap",
	      "class" => "",
	      "category" => __('ARIVA Blocks','themestudio'),
	      "params" => array(
      		 	array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __("First Text",'themestudio'),
					"param_name" => "first_text",
					"value" => "",
					"description" => __("First text dropcap",'themestudio')
		          ),
	      		 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __("Content Text",'themestudio'),
					"param_name" => "content",
					"value" => "",
					"description" => __("Add content text drop cap",'themestudio')
		        ),
	      		array(
		            "type" => "colorpicker",
			        "holder" => "div",
		            "class" => "",
		            "heading" => __("Background color first text dropcap","themestudio"),
		            "param_name" => "background_color_fisttext",
		            "value" => '#f0f0f0', //Default Red color
		            "description" => __("Background color first text dropcap","themestudio")
		        ),
	      )
	   ));
//******************************************************************************************************/
// Testimonial
//******************************************************************************************************/
vc_map( array(
	      "name" => __("Testimonial",'themestudio'),
	      "base" => "themestudio_testimonial_shortcode",
	      "class" => "",
	      "category" => __('ARIVA Blocks','themestudio'),
	      "params" => array(
	      	array(
				   'type' => 'textfield',
				   'heading' => __( 'Number testimonial', 'themestudio' ),
				   'param_name' => 'posts_per_page',
				   'value' => '5',
				   'description' => __( 'Number of testimonial', 'themestudio' )
			  ),
  		 	array(
			   'type' => 'textfield',
			   'heading' => __( 'Extra class name', 'themestudio' ),
			   'param_name' => 'el_class',
			   'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'themestudio' )
			  ),
			array(
				'type' => 'colorpicker',
				'heading' => __( 'Color text', 'themestudio' ),
				'param_name' => 'color_text',
				'value' => '#ffffff',
				'description' => __( 'Select color for text.', 'themestudio' )
			),
			array(
				'type' => 'colorpicker',
				'heading' => __( 'Background color for icon client', 'themestudio' ),
				'param_name' => 'background_icon',
				'value' => '#ffffff',
				'description' => __( 'Select background color for icon client.', 'themestudio' )
			),			        
	      )
	   	));
//******************************************************************************************************/
// Skill Bars
//******************************************************************************************************/

vc_map( array(
   "name" => __("Skill Bar", 'themestudio'),
   "base" => "themestudio-skillbar",
   // "weight" => 16,
   "description" => "Display your skills with style",
   "icon" => "icon-progress-bar",
   "class" => "skillbar_extended",
   "category" => __("ARIVA Blocks", 'themestudio'),
   "params" => array(   

      array(
         "type" => "exploded_textarea",
         "class" => "",
         "admin_label" => true,
         "heading" => __("Graphic values", 'themestudio'),
         "param_name" => "values",
         "value" => "90|Development",
         "description" => __("Input graph values here. Divide values with linebreaks (Enter). Example: 90|Development.", 'themestudio')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "admin_label" => true,
         "heading" => __("Units", 'themestudio'),
         "param_name" => "units",
         "value" => "%",
         "description" => __("Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.", 'themestudio')
      ),
 	array(
        "type" => "colorpicker",
        "holder" => "div",
        "class" => "",
        "heading" => __("Skill bar background color","themestudio"),
        "param_name" => "skillbar_background_color",
        "value" => '#505050', //Default Red color
        "description" => __("Choose color for skill bar background","themestudio")
        ), 
 	array(
        "type" => "colorpicker",
        "holder" => "div",
        "class" => "",
        "heading" => __("Percent bar background color","themestudio"),
        "param_name" => "percentbar_background_color",
        "value" => '#5bc5df', //Default Red color
        "description" => __("Choose color for percent bar","themestudio")
        ),
 	array(
        "type" => "colorpicker",
        "holder" => "div",
        "class" => "",
        "heading" => __("Skill bar text color","themestudio"),
        "param_name" => "skill_bar_text_color",
        "value" => '#fff', //Default Red color
        "description" => __("Choose color for percent text","themestudio")
        ),          
 	$add_css_style,
   	)
) );

//******************************************************************************************************/
// Client-worked
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Client worked', 'themestudio' ),
	 'base' => 'client_worked',
	 "class" => "",
	 "category" => __('ARIVA Blocks','themestudio'),
	 'params' => array(			  
			  array(
			   'type' => 'attach_images',
			   'heading' => __( 'Images', 'themestudio' ),
			   'param_name' => 'images',
			   'value' => '',
			   'description' => __( 'Select images from media library.', 'themestudio' )
			  ),
			  array(
			   'type' => 'textfield',
			   'heading' => __( 'Image size', 'themestudio' ),
			   'param_name' => 'img_size',
			   'value' =>'client-work',
			   'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'themestudio' )
			  ),
			  array(
			   'type' => 'dropdown',
			   'heading' => __( 'On click', 'themestudio' ),
			   'param_name' => 'onclick',
			   'value' => array(
			    __( 'Open prettyPhoto', 'themestudio' ) => 'link_image',
			    __( 'Do nothing', 'themestudio' ) => 'link_no',
			    __( 'Open custom link', 'themestudio' ) => 'custom_link'
			   ),
			   'description' => __( 'What to do when slide is clicked?', 'themestudio' )
			  ),
			  array(
			   'type' => 'exploded_textarea',
			   'heading' => __( 'Custom links', 'themestudio' ),
			   'param_name' => 'custom_links',
			   'description' => __( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'themestudio' ),
			   'dependency' => array(
			    'element' => 'onclick',
			    'value' => array( 'custom_link' )
			   )
			  ),
			  array(
			   'type' => 'textfield',
			   'heading' => __( 'Extra class name', 'themestudio' ),
			   'param_name' => 'el_class',
			   'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'themestudio' )
			  )
	 )
	) );
//******************************************************************************************************/
// Pricing Table
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Pricing Table', 'themestudio' ),
	 'base' => 'themestudio_pricing_shortcode',
	 "class" => "",
	 "category" => __('ARIVA Blocks','themestudio'),
	 'params' => array(	 		
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Title pricing', 'themestudio' ),
				   'param_name' => 'title_pricing',
				   'value' => 'Basic',
				   'description' => __( 'The title pricing table', 'themestudio' )
			  ),
			  $add_css_basic,	  
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Pricing', 'themestudio' ),
				   'param_name' => 'price',
				   'value' =>'$39.99',
				   'description' => __( 'Enter price.', 'themestudio' )
			  ),
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Unit', 'themestudio' ),
				   'param_name' => 'unit',
				   'value' =>__('monthly (based on 1 yr)','themestudio'),
				   'description' => __( 'Enter Unit.Example:monthly (based on 1 yr),year', 'themestudio' )
			  ),
			   array(
				   'type' => 'dropdown',
				   'heading' => __( 'Active', 'themestudio' ),
				   'param_name' => 'active',
				   'value' => array(
				    __( 'No Active', 'themestudio' ) => 'no_active',
				    __( 'Active', 'themestudio' ) => 'active',				  
				   ),
				   'description' =>""
			  ),
			  array(
	              "type" => "textarea_html",
	              "holder" => "div",
	              "class" => "",
	              "heading" => __("Content",'themestudio'),
	              "param_name" => "content",
	              "value" => '',
	              "description" => __(" Pricing Table content",'themestudio')
	          ), 
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Text Button', 'themestudio' ),
				   'param_name' => 'text_button',
				   'value' =>__('SIGN UP','themestudio'),
				   'description' => ""
				   ),
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Link Button', 'themestudio' ),
				   'param_name' => 'link_button',
				   'value' =>'',
				   'description' => ""
				   ),			 
			  array(
			        "type" => "colorpicker",
			        "holder" => "div",
			        "class" => "",
			        "heading" => __("Color Active","themestudio"),
			        "param_name" => "title_color",
			        "value" => '#5ed9e7', 
			        'dependency' => array(
					    'element' => 'active',
					    'value' => array( 'active' )
				   	),
			        "description" => __("Choose color When Active","themestudio")
			        ), 
			  
	 )
	) );
	$setting = array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "In container", 'themestudio' ),
				"param_name" => "container_class",
				"value" => array(
					__( "No container", 'themestudio' ) => "",
					__( "Inside container div", 'themestudio' ) => "container",
				),
				"description" => __( "With container class.", 'themestudio' ),
			);
			vc_add_param( 'vc_row', $setting );
	$setting = array(
				   'type' => 'textfield',
				   'heading' => __( 'Custom section id', 'themestudio' ),
				   'param_name' => 'section_custom_id',
				   'value' =>'',
				   'description' => ""
				   );
			vc_add_param( 'vc_row', $setting );
//******************************************************************************************************/
// Service
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Box Service', 'themestudio' ),
	 'base' => 'themestudio_service_shortcode',
	 "class" => "",
	 "category" => __('ARIVA Blocks','themestudio'),
	 'params' => array(	 		
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Number service', 'themestudio' ),
				   'param_name' => 'posts_per_page',
				   'value' => '5',
				   'description' => __( 'Number of service', 'themestudio' )
			  ), 		
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Add class', 'themestudio' ),
				   'param_name' => 'css_class',
				   'value' => '',
				   'description' => __( 'Add class for Block element', 'themestudio' )
			  ),
			   array(
					'type' => 'dropdown',
					'heading' => __( 'Border box service', 'themestudio' ),
					'param_name' => 'has_boder',
					'value' => array(
						__( 'No', 'themestudio' ) => 'no',
						__( 'Yes', 'themestudio' ) => 'yes'
					),
					'description' => __( 'Choose bordoer for box service if needed.', 'themestudio' )
					)		  	 
	 )
	) );
//******************************************************************************************************/
// Feature
//******************************************************************************************************/
	$post_choices = array();
		// $post_choices[] = '';
		$taxonomy = 'feature_cats';
		$feature_cat = get_terms($taxonomy);
		
		foreach ( $feature_cat as $post ) :			
			$post_choices[$post->name] = $post->term_id;
			$post_id_default = $post->term_id;

		endforeach;

		wp_reset_query();

	vc_map( array(
	 'name' => __( 'Feature Table', 'themestudio' ),
	 'base' => 'themestudio_feature_shortcode',
	 "class" => "",
	 "category" => __('ARIVA Blocks','themestudio'),
	 'params' => array(	 		
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Extra class name', 'themestudio' ),
				   'param_name' => 'css_class',
				   'value' => '',
				   'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'themestudio' )
			  ),
			  array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Category",'themestudio'),
					"param_name" => "category_feature",
					"value" => $post_choices,							 								 
					"description" => "",					
		      ),
		      array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Display postion",'themestudio'),
					"param_name" => "postion_feature",
					'value' => array(
					__( 'Postion left', 'themestudio' ) => 'position-left',
					__( 'Postion Right', 'themestudio' ) => 'position-right',				  
					),
					'description' =>""					
		      ),

		 )
	) );
//******************************************************************************************************/
// Our Blog
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Our Blog', 'themestudio' ),
	 'base' => 'themestudio_our_blog_shortcode',
	 "class" => "",
	 "category" => __('ARIVA Blocks','themestudio'),
	 'params' => array(	 		
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Add class', 'themestudio' ),
				   'param_name' => 'css_class',
				   'value' => '',
				   'description' => __( 'Add class for Block element', 'themestudio' )
			  ), 
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Number post', 'themestudio' ),
				   'param_name' => 'number_post',
				   'value' => '3',
				   'description' => __( 'Number post display in our_blog shortcode ', 'themestudio' )
			  ),
			  			  
	 )
	) );

//******************************************************************************************************/
// Map
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'MAP', 'themestudio' ),
	 'base' => 'themestudio_map_shortcode',
	 "class" => "",
	 "category" => __('ARIVA Blocks','themestudio'),
	 'params' => array(	 		
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Add class', 'themestudio' ),
				   'param_name' => 'css_class',
				   'value' => '',
				   'description' => __( 'Add class for Block element', 'themestudio' )
			  ), 
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Title map', 'themestudio' ),
				   'param_name' => 'title_map_title',
				   'value' => 'Themestudio',
				   'description' => __( 'Title for map info', 'themestudio' )
			  ),			  	
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Address', 'themestudio' ),
				   'param_name' => 'address',
				   'value' => 'Ngõ 176 Z115, Tân Thịnh, tp. Thái Nguyên, Thái Nguyên, Việt Nam',
				   'description' => __( 'Address for map info', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Latitude', 'themestudio' ),
				   'param_name' => 'lat',
				   'value' => '21.582668',
				   'description' => __( 'get lat long coordinates from an address <a href="http://www.latlong.net/convert-address-to-lat-long.html">click here</a>', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Longitude', 'themestudio' ),
				   'param_name' => 'long',
				   'value' => '105.807298',
				   'description' => __( 'get lat long coordinates from an address <a href="http://www.latlong.net/convert-address-to-lat-long.html">click here</a>', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Phone', 'themestudio' ),
				   'param_name' => 'title_map_phone',
				   'value' => '+84 (0) 1753 456789',
				   'description' => __( 'Phone for map info', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Email', 'themestudio' ),
				   'param_name' => 'title_map_email',
				   'value' => 'themestudio@gmail.com',
				   'description' => __( 'Phone for map info', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Website', 'themestudio' ),
				   'param_name' => 'title_map_website',
				   'value' => 'themestudio.net',
				   'description' => __( 'Website for map info', 'themestudio' )
			  ),
			  			  
	 )
	) );
//******************************************************************************************************/
// Parallax slider images
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Home header styles', 'themestudio' ),
	 'base' => 'themestudio_slider_parallax',
	 "class" => "",
	 "category" => __('ARIVA Blocks','themestudio'),
	 'params' => array(	 		
			array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Choose style",'themestudio'),
					"param_name" => "style_parallax",
					'value' => array(
					__( 'Image slide', 'themestudio' ) => 'image',
					__( 'Video slide', 'themestudio' ) => 'video',				  
					__( 'Animated image', 'themestudio' ) => 'animated',				  
					),
					'description' =>""					
		      ),			
			array(
				   'type' => 'attach_images',
				   'heading' => __( 'Images parallax', 'themestudio' ),
				   'param_name' => 'images',
				   'value' => '',
				   'description' => __( 'Select images from media library.', 'themestudio' ),
				   'dependency' => array(
						'element' => 'style_parallax',
						'value' => 'image'
						)
			  ),
			array(
		            "type" => "attach_image",
		            "holder" => "div",
		            "class" => "",
		            "heading" => __("Background falback","themestudio"),
		            "param_name" => "images_data",
		            "value" => '',
		            'description' => __( 'Select image falback upload from media library.', 'themestudio' ),
		            'dependency' => array(
						'element' => 'style_parallax',
						'value' => 'video'
						)
        		),
        	array(
		            "type" => "attach_image",
		            "holder" => "div",
		            "class" => "",
		            "heading" => __("Background Animated","themestudio"),
		            "param_name" => "images_animation",
		            "value" => '',
		            'description' => __( 'Select image falback upload from media library.', 'themestudio' ),
		            'dependency' => array(
						'element' => 'style_parallax',
						'value' => 'animated'
						)
        		),				
			array(
				   'type' => 'textfield',
				   'holder' => 'div',
		           'class' => '',
				   'heading' => __( 'Video url', 'themestudio' ),
				   'param_name' => 'video_url',
				   'value' => 'http://www.youtube.com/watch?v=-VL_G4SNaGM',
				   'description' => __( 'Add video url for parallax', 'themestudio' ),
				   'dependency' => array(
						'element' => 'style_parallax',
						'value' => 'video'
						)
			  ),			
			array(
			   'type' => 'textfield',
			   'heading' => __( 'Intro Text', 'themestudio' ),
			   'param_name' => 'intro_text',
			   'value' => 'the goods you need now !',
			   'description' => __( 'Add intro text for Block element', 'themestudio' )
			  ),			
			array(
			   'type' => 'textfield',
			   'heading' => __( 'Next section', 'themestudio' ),
			   'param_name' => 'next_section',
			   'value' => '#history',
			   'description' => __( 'Add section for Block element', 'themestudio' )
			  ),
			array(
		            "type" => "attach_image",
		            "holder" => "div",
		            "class" => "",
		            "heading" => __("Logo","themestudio"),
		            "param_name" => "images_logo",
		            "value" => '',
		            "description" => __("Upload logo ","themestudio")
        		),
        	array(
		            "type" => "attach_image",
		            "holder" => "div",
		            "class" => "",
		            "heading" => __("Background pattern","themestudio"),
		            "param_name" => "pattern_background",
		            "value" => '',
		            "description" => __("Upload Background pattern ","themestudio")
        		),				 
			array(
		              "type" => "textarea_html",
		              "holder" => "div",
		              "class" => "",
		              "heading" => __("Content",'themestudio'),
		              "param_name" => "content",
		              "value" => '<ul>
									<li>Welcome to <strong>Ariva</strong></li>
									<li>We Love to <strong> Design</strong></li>
									<li>We Are <strong>Themestudio</strong></li>
								</ul>',
		              "description" => __(" Add content",'themestudio')
	          ),
			array(
	              "type" => "textarea",
	              "holder" => "div",
	              "class" => "",
	              "heading" => __("List categories",'themestudio'),
	              "param_name" => "list_categories",
	              "value" => 'Branding
	              				Development
	              				Product
	              				Advertising',
	              "description" => __(" Add content",'themestudio')
	          ),
			array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Animation text parallax",'themestudio'),
					"param_name" => "animation_parallax",
					'value' => array(
					__( 'Slide', 'themestudio' ) => 'slide',
					__( 'Fade', 'themestudio' ) => 'fade',				  
					),
					'description' =>""					
		      ),
			 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Direction text parallax",'themestudio'),
					"param_name" => "direction_parallax",
					'value' => array(
					__( 'Vertical', 'themestudio' ) => 'vertical',
					__( 'Horizontal', 'themestudio' ) => 'horizontal',				  
					),
					'description' =>""					
		      ),
	)));
	}
}
?>