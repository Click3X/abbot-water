<?php
/**
 * @package ThemeStudio_Shortcodes
 * @version 1.0
 */
if(!class_exists('themestudio_shortcodes')):
	class themestudio_shortcodes {

	}
endif;


class themestudio_shortcodes_fe extends themestudio_shortcodes {
	private $counter_class = 0;
//******************************************************************************************************/
// Globals Function
//******************************************************************************************************/
 	public function getExtraClass( $el_class ) {
			$output = '';
			if ( $el_class != '' ) {
				$output = " " . str_replace( ".", "", $el_class );
			}
			return $output;
		}

	public function getCSSAnimation( $css_animation,$data_wow_delay,$data_wow_duration) {
			$output = '';
			if ( $css_animation != '' ) {
				wp_enqueue_script( 'waypoints' );
				$output .= 'wow  ' . $css_animation.'"';
				$output .= 'data-wow-duration="'.$data_wow_duration.'"';
				$output .= 'data-wow-delay="'.$data_wow_delay.'"';
			}
			return $output;
		}
	public function ts_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
	return $css_class;
	}

	//*******************************************************Begin Shortcode****************************************************************//

//******************************************************************************************************/
// Section/ block title
//******************************************************************************************************/
	 static  function themestudio_title( $atts , $content = null) {
    	$html = $css ='';

		 extract( shortcode_atts(
		  array(
		   'el_class'=>'',
		   'css'=>'',
		   //custom
		   'title'=>'',
		   'align'=>'',
		   'text_align'=>'',
		   'title_color'=>'',
		   'underline_color'=>'',
		  ), $atts ));
			$extra_class = new themestudio_shortcodes_fe();
		    $el_class1 = $extra_class->getExtraClass($el_class);

			$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

			$html .='<div class="section-title '.$css_class1.'" style="text-align:'.$text_align.'">
				<h3 style="color:'.$title_color.'" class="'.$align.' bold text-uppercase">'.$title.'</h3><div style="background:'.$underline_color.'" class="hr '.$align.'"></div>';
			$html .= apply_filters('the_content', $content);
			$html .='</div>';
		 return $html;
		 }
//******************************************************************************************************/
// fun_fact
//******************************************************************************************************/
		static  function fun_fact( $atts , $content = null) {
    	$html = $el_class = $css_animation = '';

		 extract( shortcode_atts(
		  array(
		   // alway
		   'el_class' => '',
		   'css' => '',
		   'onclick'=>'',
		   'css_animation'=>'',
		   'data_wow_duration'=>'',
		   'data_wow_delay' =>'',
		   //custom
		   'title_funfact' =>'',
		   'number_funfact' =>'',
		  ), $atts ));

			$html .='<div class="ts-funfact">
						<span class="funfact-number" data-number="'.$number_funfact.'">'.$number_funfact.'</span>
						<h5 class="text-uppercase">'.$title_funfact.'</h5>
					</div>	';
		 return $html;
		 }

//******************************************************************************************************/
// team_member
//******************************************************************************************************/
    static  function ts_team_member( $atts , $content = null) {
    	$html = $el_class = $css_animation = '';

		 extract( shortcode_atts(
		  array(
		   // alway
		   'el_class' => '',
		   'css' => '',
		   'onclick'=>'',
		   'css_animation'=>'',
		   'data_wow_duration'=>'',
		   'data_wow_delay' =>'',
		   //custom
		   'css_member'=>'',
		   'bg_member'=>'',
		   'image_size'=>'team-member',
		   'fa_tiwtter'=>'',
		   'fa_behance'=>'',
		   'fa_dribble'=>'',
		   'fa_facebook'=>'',
		   'fa_google'=>'',
		   'name_member' =>'',
		   'member_postion' =>'',
		  ), $atts ));

		 $img_id = preg_replace( '/[^\d]/', '', $bg_member );
		 $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $image_size ) );
		 if(isset($bg_member) && is_numeric($bg_member))
		 {
		 	$bg_member = wp_get_attachment_image_src($bg_member,'full');
			$bg_member = $bg_member[0];
		 }
			$html .='<div class="ts-item-member '.$css_member.'">
							<div class="member-avatar">
								<figure>'.$img['thumbnail'].'</figure>
							</div>
							<div class="over-member">
								<div class="member-detail">
									<span class="member-name">'.$name_member.'</span>
									<span class="memver-position">'.$member_postion.'</span>
									<span class="member-icon"><img alt="" src="'.get_template_directory_uri().'/assets/images/icon-team.png"></span>';
			$html .=apply_filters('the_content',$content);
			$html .='<ul class="member-social">';
						if($fa_facebook!=''){
			$html .='	<li><a target="_blank" title="'.$name_member.'" href="'.esc_url($fa_facebook).'"><i class="fa fa-facebook"></i></a></li>';
							}
						if($fa_tiwtter!=''){
			$html .='	<li><a target="_blank" title="'.$name_member.'" href="'.esc_url($fa_tiwtter).'"><i class="fa fa-twitter"></i></a></li>';
							}
						if($fa_google!=''){
			$html .='	<li><a target="_blank" title="'.$name_member.'" href="'.esc_url($fa_google).'"><i class="fa fa-google-plus"></i></a></li>';
							}
						if($fa_behance!=''){
			$html .='	<li><a target="_blank" title="'.$name_member.'" href="'.esc_url($fa_behance).'"><i class="fa fa-behance"></i></a></li>';
							}
						if($fa_dribble!=''){
			$html .='	<li><a target="_blank" title="'.$name_member.'" href="'.esc_url($fa_dribble).'"><i class="fa fa-dribbble"></i></a></li>';
							}
			$html .='</ul>
					</div>
				</div>
			</div>

            ';

		 return $html;
		 }

//******************************************************************************************************/
// box_Contact
//******************************************************************************************************/
		static  function box_contact( $atts , $content = null) {
    	$html = $el_class = $css_animation = '';

		 extract( shortcode_atts(
		  array(
		   'el_class' => '',
		   'css' => '',
		   'onclick'=>'',
		   'css_animation'=>'',
		   'data_wow_duration'=>'',
		   'data_wow_delay' =>'',
		   //custom
		   'css_awesome'=>'',
		   'line_under_icon' =>'',
		  ), $atts ));

		    $extra_class = new themestudio_shortcodes_fe();
		    $el_class1 = $extra_class->getExtraClass($el_class);

			$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

			if($onclick=='yes'){
			$css_class = $extra_class->getCSSAnimation($css_animation,$data_wow_delay,$data_wow_duration);
			}else { $css_class='';}

			$html .='<div class="ts-contact-info text-center '.$css_class1.'">
						<i class="fa '.$css_awesome.'"></i>
						<span>'.strip_tags(apply_filters('the_content', $content)).'</span>
					</div>';
		 return $html;
		 }

//******************************************************************************************************/
// Portfolio
//******************************************************************************************************/
static function ts_portfolio($atts, $content = null) {

		extract(shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		   	'onclick'=>'',
		   	'css_animation'=>'',
		   	'data_wow_duration'=>'',
		   	'data_wow_delay' =>'',
		   	// Custom
			"posts_per_page" => "12",
			"portfolio_single_loading" => "",
			"portfolio_filter_switch" => "",
			"portfolio_item_width" => "",
			"portfolio_item_height" => "",
			"portfolio_hover_opacity" => "",
		), $atts));

		$extra_class = new themestudio_shortcodes_fe();
	    $el_class1 = $extra_class->getExtraClass($el_class);

		$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

		if($onclick=='yes'){
		$css_class = $extra_class->getCSSAnimation($css_animation,$data_wow_delay,$data_wow_duration);
		}else { $css_class='';}


		global $post;
		$output = '';
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $posts_per_page,
		);

		$block_query = new WP_Query( $args );

			if ($portfolio_filter_switch == 'show-filter') {

				ob_start();
					get_template_part( 'content-parts/portfolio', 'filter' );
					$result = ob_get_contents();
				ob_end_clean();
				$output .= $result;

			}

			$output .= '<div id="grid-portfolio" class="cbp-l-grid-fullScreen"><ul>';
				if ( $block_query->have_posts() ) :

					while ( $block_query->have_posts() ) : $block_query->the_post();
						setup_postdata( $post );
						$portfolio_hover_color = get_post_meta( $post->ID, "themestudio_portfolio_hover_color", true );
					    $p_rgba = hex2rgb($portfolio_hover_color);
					    $portfolio_hover_style = 'style="background-color:rgba('.$p_rgba[0].', '.$p_rgba[1].', '.$p_rgba[2].', '.$portfolio_hover_opacity.')"';
							$output .= '
							<li class="cbp-item '. themestudio_isotope_terms().'" style="width:'. $portfolio_item_width.'px ;height: '. $portfolio_item_height.'px">
							    <a href="'. get_permalink( $post->ID ) .'" class="cbp-caption cbp-singlePage">
							        <div class="cbp-caption-defaultWrap">
							            '. get_the_post_thumbnail($post->ID, 'portfolio-grid-4-full').'
							        </div>
							        <div class="cbp-caption-activeWrap" '. $portfolio_hover_style .'>
							            <div class="cbp-l-caption-alignLeft">
							                <div class="cbp-l-caption-body">
							                    <div class="cbp-l-caption-title">'. get_the_title( $post->ID ).'</div>
							                    <div class="cbp-l-caption-cats">'. strip_tags(get_the_term_list($post->ID,'portfolio_cats', '',', ' ), '').'</div>
							                </div>
							            </div>
							        </div>
							    </a>
							</li>';

					endwhile;
				endif;
				wp_reset_query();

			$output .='</ul></div>';
		return $output;
}
//******************************************************************************************************/
// Text Dropcap
//******************************************************************************************************/
static  function text_dropcap( $atts , $content = null) {
	// Attributes
	extract( shortcode_atts(
		array(
			'first_text' => '',
			'background_color_fisttext' => '',
		), $atts )
	);
	 $html = '<p><span class="firstLetter" style="background-color:'.$background_color_fisttext.'">'.$first_text.'</span>'.apply_filters('the_content', $content).'</p>';
	 return $html;
	 }
//******************************************************************************************************/
// Button Welcome
//******************************************************************************************************/
static  function ts_button_welcom( $atts , $content = null) {
	// Attributes
	extract( shortcode_atts(
		array(
			'link_button' => '',
			'text_button' => '',
			'postion_button' => '',
		), $atts )
	);
	 $html = '<a class="ts-button '.$postion_button.'" href="'.esc_url($link_button).'">'.$text_button.'</a>';
	 return $html;
	 }
//******************************************************************************************************/
// Client Worker
//******************************************************************************************************/
	 static  function client_worked( $atts , $content = null) {
    	 extract( shortcode_atts(
			array(
				'onclick' => 'link_image',
				'custom_links' => '',
				'img_size' => 'client-work',
				'images' => '',
				'el_class' => '',
				), $atts )
		);

    	if ( $images == '' ) $images = '-1,-2,-3';
			if ( $onclick == 'custom_link' ) {
				$custom_links = explode( ',', $custom_links );
			}
		$images = explode( ',', $images );
		$i = - 1;
    	$html  = '';
		$html .= '<div class="ts-client-slide">';
			foreach ( $images as $attach_id ):
				$i ++;
				if ( $attach_id > 0 ) {
					$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ) );
				} else {
					$post_thumbnail = array();
					$post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
					$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
				}
				$thumbnail = $post_thumbnail['thumbnail'];

				$html.= '<div class="item-client">';
				if ( $onclick == 'link_image' ){
					$p_img_large = $post_thumbnail['p_img_large'];
					$html.= '<a href="'.esc_url($p_img_large[0]).'" ><figure>'.$thumbnail.'</figure></a>';
				}
				elseif ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ){
					$html.= '<a href="'.esc_url($custom_links[$i]).' target="_blank"><figure>'.$thumbnail.'</figure></a>';
				}
				else{
					$html.= $thumbnail ;
				}
				$html.= '</div>';
			endforeach;
		$html .= '</div>';
		 return $html;
		 }

//******************************************************************************************************/
/*	Pricing Table
//******************************************************************************************************/

static function themestudio_pricing_shortcode( $atts, $content = null ) {
		$output	='';
		extract( shortcode_atts( array(
			'css_basic'=>'',
			'title_pricing'=>'',
			'price' => '',
			'unit' => '',
			'text_button' => '',
			'link_button' => '',
			'active_color' => '',
			'active' => '',
	    ), $atts ) );
		$output .='';
		$output .='<div class="ts-pricing-table '.$active.'">
								<div class="icon '.$css_basic.'" style="background:'.$active_color.';"></div>
								<h3>'.$title_pricing.'</h3>
								<div class="price-unit">
									<span class="price">'.$price.'</span>
									<span class="unit">'.$unit.'</span>
								</div>';
		$output .= apply_filters('the_content',$content);
		$output .='<a class="ts-button" href="'.esc_url($link_button).'" style="background:'.$active_color.';border-color:'.$active_color.';">'.$text_button.'</a>
					</div>';

		return $output;
}
//******************************************************************************************************/
/*	Skillbar Shortcode
//******************************************************************************************************/

static function themestudio_skillbar_shortcode( $atts, $content = null ) {
	$output = $el_class ='';

	extract( shortcode_atts( array(
		'css' => '',
		'values' => '',
		'units' => '%',
		'skillbar_background_color' => '',
		'percentbar_background_color' => '',
		'skill_bar_text_color' => '',
    ), $atts ) );

 	$extra_class = new themestudio_shortcodes_fe();
    $el_class1 = $extra_class->getExtraClass($el_class);
	$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column ' . $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );
    
    $array_values = explode(",", $values);
	$output .= '<div class=" '.$css_class1.'">';
		foreach($array_values as $skill_value) {
			$data = explode("|", $skill_value);

			$output .= '<div class="skillbar clearfix " data-percent="'.$data['0'] . $units.'">
							<div class="skillbar-title"><span style="color: '.$skill_bar_text_color.';">'.$data['1'].'</span></div>
								<div class="skill-bar-bg" style="background: '.$skillbar_background_color.';">
								<div class="skillbar-bar" style="background: '.$percentbar_background_color.';">
									<div class="skill-bar-percent" style="color: '.$skill_bar_text_color.';">'.$data['0'].$units .'</div>
								</div>
							</div>
						</div>';
	}
	$output .='</div>';


	return $output;
}
//******************************************************************************************************/
// testimonial
//******************************************************************************************************/
static  function themestudio_testimonial_shortcode( $atts , $content = null) {
		$output='';
    	 extract( shortcode_atts(
			array(
			   'el_class'=>'',
			   'posts_per_page'=>'',
			   'color_text'=>'',
			   'background_icon'=>''

				), $atts )
		);

    	 global $post, $list_id;

		// General args
		if ($list_id) {
			$post_list_id = explode( ',', $list_id);
		} else {
			$post_list_id = array();
		}
		$args = array(
			'post_type' => 'testimonial',
			'posts_per_page' =>  $posts_per_page,

		);

		// Do the query
		$ts_testimonial =  query_posts( $args );


		$output .= '';
		$output .= '<div class="ts-testimonial-slide '.$el_class.'" style="color:'.$color_text.'">';

						foreach ($ts_testimonial as $post ) {
							$testimonials_name = get_post_meta( $post->ID, 'themestudio_testimonials_name', true );
							$testimonials_position = get_post_meta( $post->ID, 'themestudio_testimonials_position', true );
							$output .= '
											<div class="ts-testimonial-item"><p>';
											if($post->post_excerpt){
					                  			$output .= wp_trim_words(apply_filters('the_excerpt', $post->post_excerpt), 60, '');
					                  		} else {
					                  			$output .= wp_trim_words(apply_filters('the_content', $post->post_content), 60, '');
					                  		}
										$output .= '</p><div class="infor-client">
													<span class="icon-client" style="background:'.$background_icon.'"><img alt="" src="'.get_template_directory_uri().'/assets/images/icon-testimonial.png"></span>';
										$output .= '<span class="client-name">'.$testimonials_name.'</span>';
										$output .= '<span class="client-position">'.$testimonials_position.'</span>';
										$output .= '</div>
									  </div>';
						}
						wp_reset_query();
						wp_reset_postdata();

		$output .= '</div>';
		 return $output;
		 }
//******************************************************************************************************/
// Service
//******************************************************************************************************/
static  function themestudio_service_shortcode( $atts , $content = null) {
		$output='';
    	 extract( shortcode_atts(
			array(
				'css_class'=>'',
				'posts_per_page'=>'',
				'has_boder'=>''
				), $atts )
		);

    	 global $post;

		// General args
		$args = array(
			'post_type' => 'service',
			'posts_per_page' =>  $posts_per_page,

		);

		$ts_service =  query_posts( $args );

		// Do the query

		$output .= '<div class="ts-service-slide '.$css_class.'">';
						foreach ($ts_service as $post ) {
							$service_icon = get_post_meta( $post->ID, 'themestudio_service_select_icon', true );
							$output .= '<div class="item-service-slide" ';
							if ($has_boder=='yes'){								
								$output .= 'style="border:1px solid #e8e8e8"';
							}						
							$output .= '>';
													
							$output .= '<div class="icon '.$service_icon.'"></div>
											<hr>
											<h3>'.apply_filters( 'the_title', $post->post_title).'</h3>
											<div class="content-service">';
							$output .= apply_filters('the_content', $post->post_content);
								$output .= '</div>
										</div>';
						}
		wp_reset_query();
		$output .= '</div>';
		 return $output;
		 }
//******************************************************************************************************/
// Feature
//******************************************************************************************************/
static  function themestudio_feature_shortcode( $atts , $content = null) {
    	 $output='';
    	 extract( shortcode_atts(
			array(
				'css_class'=>'',
				'category_feature'=>'',
				'postion_feature'=>'',
				), $atts )
		);
    	 global $post;
		$taxonomy = 'feature_cats';
		$term = get_term( $category_feature, $taxonomy );
	// General args
		$args = array(
			'post_type' => 'feature',
			'operator' => 'IN',
		    'showposts' => -1,
		    'tax_query' => array(
		        array(
		            'taxonomy' => 'feature_cats',
		            'terms' => $category_feature,
		            'field' => 'term_id',
		        )
		    ),
		);


		// Do the query
		$ts_feature = query_posts( $args );

		$output .= '<div class="ts-feature-slide '.$postion_feature.'">';
		foreach ($ts_feature as $post ) {
			$feature_image = get_post_meta( $post->ID, 'themestudio_feature_image', true );
			$format = get_post_meta( $post->ID, 'themestudio_feature_type', true );

		$output .= '<div class="item-feature">
							<div class="row">';
								ob_start();
								get_template_part('feature-formats/feature',$format);
							     $result = ob_get_contents();
							    ob_end_clean();
							    $output .= $result;
									$output .='<div class="col-sm-6 col-xs-12 feature-content">
									<div class="section-title text-left">
										<h3>'.$term->name.'</h3>
										<hr>
									</div>
									<h2>'.apply_filters('the_title', $post->post_title).'</h2>';
								$output .=	'<div class="feature-desc">';
											if($post->post_excerpt){
					                  			$output .= apply_filters('the_content',$post->post_excerpt);
					                  		} else {
					                  			$output .= apply_filters('the_content',$post->post_content);
					                  		}
								$output .= '</div>
								</div>
							</div>
						</div>';
					}
					wp_reset_query();
		$output .= '</div>';
		 return $output;
		 }
//******************************************************************************************************/
// Our Blog
//******************************************************************************************************/
static  function themestudio_our_blog_shortcode( $atts , $content = null) {
    	 $output=$post_format_class='';
    	 global $post, $ts_ariva;

    	 extract( shortcode_atts(
			array(
				'css_class'=>'',
				'number_post'=>'3',
				), $atts )
		);
		$args = array(
				'posts_per_page' => $number_post,
				'post_type'=>'post'	 );
		$our_blog = get_posts( $args);

		$output .= '<div class="ts-lastest-from-blog">';
		$dem =1;
		foreach ( $our_blog as $post ) {
  					setup_postdata( $post );
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


		$output .= '	<div class="item-post ';
							if($dem%2==0){
								if ( has_post_thumbnail() ) {
									$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
									$output .='bg-even" style="background-image:url('.esc_url($feat_image).');">';
								}else{
									$output .='bg-even">';
								}
							}else{
								if ( has_post_thumbnail() ) {
									$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
									$output .='bg-odd" style="background-image:url('.esc_url($feat_image).');">';
								}else{
									$output .='bg-odd">';
								}
							}
		$output .= '	<div class="overlay"></div>';
		$output .= '		<article>
								<a class="icon-post" href="'.esc_url( get_permalink($post->ID)).'"><i class="fa '.esc_attr($post_format_class).'"></i></a>
								<h3><a href="'.esc_url( get_permalink($post->ID)).'">'.apply_filters('the_title',$post->post_title).'</a></h3>';
								ob_start();
								get_template_part('content-parts/ourblog', 'metas');
							     $result = ob_get_contents();
							    ob_end_clean();
							    $output .= $result;

		$output .= '		</article>
						</div>';
						$dem++;
						}
					wp_reset_postdata();
		$output .='</div>';
		 return $output;
}
//******************************************************************************************************/
/*	MAP
//******************************************************************************************************/

static function themestudio_map_shortcode( $atts, $content = null ) {
		$output	='';
		extract( shortcode_atts( array(
			'css_basic'=>'',
			'address' => '',
			'lat'=>'21.582668',
			'long'=>'105.807298',
			'title_map_title'=>'',
			'title_map_phone'=>'',
			'title_map_email'=>'',
			'title_map_website'=>'',
	    ), $atts ) );

	    global $ts_ariva;
	    $colormap = $ts_ariva['ts-accent-color'];

		// $prepAddr = str_replace(' ','+',$address);		
		// $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?&address='.$prepAddr.'&sensor=false');
		// $output_ge= json_decode($geocode);
		 // $lat = $output_ge->results[0]->geometry->location->lat;
		 // $long = $output_ge->results[0]->geometry->location->lng;			


		$output .='';
		$output .=' <div class="map-contact">
				 	<div id="map-canvas"></div>
					</div>
				<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript">
					   function initialize() {
						    var styles = [
						      {
						        stylers: [
						          { hue: "'.$colormap.'" }
						        ]
						      },{
						        featureType: "road",
						        elementType: "geometry",
						        stylers: [
						          { lightness: 100 },
						          { visibility: "simplified" }
						        ]
						      },{
						        featureType: "road",
						        elementType: "labels",
						        stylers: [
						          { visibility: "off" }
						        ]
						      }
						    ];


						     var styledMap = new google.maps.StyledMapType(styles,
						    {name: "Styled Map"});

						    var mapCanvas = document.getElementById("map-canvas");
						    var mapOptions = {
						        center: new google.maps.LatLng('.$lat.', '.$long.'),
						        zoom: 15,
						        mapTypeControlOptions: {
						          mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
						        },
						        scrollwheel: false,
							    navigationControl: false,
							    mapTypeControl: false,
							    scaleControl: false,
							    // draggable: false,

						      }
						    var map = new google.maps.Map(mapCanvas, mapOptions);
						    map.mapTypes.set("map_style", styledMap);
						    map.setMapTypeId("map_style");


						    	var locations = [
									[\''.$title_map_title.'\', \''.$address.'\', \''.$title_map_phone.'\', \''.$title_map_email.'\', \''.$title_map_website.'\','.$lat.', '.$long.']
									        ];
											var i;
											var description;
											var telephone;
											var email;
											var web;
											var marker;
											var link;
									        for (i = 0; i < locations.length; i++) {
												if (locations[i][1] ==\'undefined\'){ description =\'\';} else { description = locations[i][1];}
												if (locations[i][2] ==\'undefined\'){ telephone =\'\';} else { telephone = locations[i][2];}
												if (locations[i][3] ==\'undefined\'){ email =\'\';} else { email = locations[i][3];}
												if (locations[i][4] ==\'undefined\'){ web =\'\';} else { web = locations[i][4];}
									            marker = new google.maps.Marker({

									                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
									                map: map,
									                title: locations[i][0],
									                desc: description,
									                tel: telephone,
									                email: email,
									                web: web
									            });
									            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web);
									        }


							  	function bindInfoWindow(marker, map, title, desc, telephone, email, web) {
								    if (web.substring(0, 7) != "http://") {
								    link = "http://" + web;
								    } else {
								    link = web;
								    }
								    // iw.open(map,marker);
								      google.maps.event.addListener(marker, "click", function() {
								             var html= "<div style=\'color:#000;background-color:#fff;padding:5px;width:200px;\'><h4>"+title+"</h4><p>"+desc+"</p><i class=\'fa fa-phone\'></i> "+telephone+"<br/><i class=\'fa fa-envelope\'></i><a href=\'mailto:"+email+"\' >  "+email+"</a><br/><i class=\'fa fa-globe\'></i><a target=\'_blank\' href=\'"+link+"\'\' >  "+web+"</a></div>";
								             var iw = new google.maps.InfoWindow({content:html});
								            iw.open(map,marker);
								      });
								}
						    }
						    google.maps.event.addDomListener(window, "load", initialize);

				</script>';

		return $output;
}
//******************************************************************************************************/
/*	Parallax slider version 
//******************************************************************************************************/
static function themestudio_slider_parallax( $atts, $content = null ) {	
		$output	='';		
		extract( shortcode_atts(
			array(								
				'images' => '',
				'images_logo' => '',				
				'images_url' => '',
				'images_data' => '',
				'images_animation' => '',
				'video_url' => '',
				'intro_text' => '',
				'next_section' => '',				
				'list_categories' => '',
				'animation_parallax'=>'',
				'direction_parallax'=>'',
				'style_parallax'=>'',
				'pattern_background'=>'',
				), $atts )
		);


		    	if ( $images == '' ) $images = '-1,-2,-3';
					
					$images = explode( ',', $images );
					$i = - 1;

		if(isset($images_logo) && is_numeric($images_logo))
				 {
				 	$images_logo = wp_get_attachment_image_src($images_logo,'full');
					$images_logo = $images_logo[0];
				 }
		if(isset($images_data) && is_numeric($images_data))
				 {
				 	$images_data = wp_get_attachment_image_src($images_data,'full');
					$images_data = $images_data[0];
				 }
		if(isset($images_animation) && is_numeric($images_animation))
				 {
				 	$images_animation = wp_get_attachment_image_src($images_animation,'full');
					$images_animation = $images_animation[0];
				 }
		if(isset($pattern_background) && is_numeric($pattern_background))
				 {
				 	$pattern_background = wp_get_attachment_image_src($pattern_background,'full');
					$pattern_background = $pattern_background[0];
				 }		 		 
		
		if($style_parallax =='video'){
			$output	.='<div id="slides" class="home parallax">';
			$output	.='<div id="fixed_video">
							<!-- Video -->
								<div id="P2" class="player video-container"
									data-property="{videoURL:\''.esc_url($video_url).'\',containment:\'#fixed_video\',autoPlay:true, showControls:false, mute:true, startAt:0, opacity:1}"
									data-background="'.esc_url($images_data).'">
								</div>
							<!-- End Video -->
						</div>';
		}elseif($style_parallax =='animated'){
			$output	.='<div id="slides" style="background-image:url(\''.esc_url($images_animation).'\');" class="home-animated parallax pattern-black">';
		}else{
			$output	.='<div id="slides" class="home parallax">';
			$output	.='<div class="slides-container relative">';	
				  foreach ( $images as $attach_id ){ 					
					if(isset($attach_id) && is_numeric($attach_id))
						 {
						 	$attach_id = wp_get_attachment_image_src($attach_id,'full');
							$images_url = $attach_id[0];
						 }	
			$output	.='<div style="background-image: url(\''.esc_url($images_url).'\');" class="pattern-black ff-slider-paralax"></div>';				 					
			
					} 					  
			$output	.='</div>
					  <!-- Slider Controls -->
					  <nav class="slides-navigation">
					    <a href="#" class="next"></a>
					    <a href="#" class="prev"></a>
					  </nav>';
		} 	
		if($pattern_background !=''){			
			$output	.='<div class="ts-pattern-black" style="background-image:url(\''.$pattern_background.'\');"></div>';				  
		}	
		$output	.='<div class="home-details-tb absolute">				   
				   <div class="relative home-details-inner">
				    <div class="logo-slide"><img src="'.esc_url($images_logo).'" alt="Logo" /></div>
				    <div class="hometexts">';
		$output	.= apply_filters('the_content',strip_tags($content,'<ul><li><strong>'));
		$output	.=' </div>
				    <h1 class="fixed-text uppercase bold condensed">'.$intro_text.'</h1>
				    <ul class="home-categories">';
				    $items   = preg_split( '/\t\r\n|\r|\n/', $list_categories );				    
				    for ($i=0; $i < count($items); $i++) { 
		$output	.=' <li>'.strip_tags($items[$i]).'</li>';
				    }
		$output	.='</ul>				    
				    </div><!-- End Home Texts -->
				  </div>
					  	<div class="home-arrow scroll">
					     <a href="'.$next_section.'">
					     <span class="icon icon-basic-magic-mouse"></span></a>
					    </div>
				 </div>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
					      \'use strict\';
					      $(\'.hometexts\').flexslider({
					        animation: "'.$animation_parallax.'",
					        selector: "ul li",
					        controlNav: false,
					        directionNav: false ,
					        slideshowSpeed: 4000,  
					        direction: "'.$direction_parallax.'"
					      });
					 });
				</script>';
					
		return $output ;
	}
//*********************************************End Shortcode****************************************************************************//

}
	/*My shortcodes */
add_shortcode( 'themestudio_title', array('themestudio_shortcodes_fe','themestudio_title') );
add_shortcode( 'fun_fact', array('themestudio_shortcodes_fe','fun_fact') );
add_shortcode( 'box_contact', array('themestudio_shortcodes_fe','box_contact') );
add_shortcode( 'ts_portfolio', array('themestudio_shortcodes_fe','ts_portfolio') );
add_shortcode( 'text_dropcap', array('themestudio_shortcodes_fe','text_dropcap') );
add_shortcode( 'themestudio_testimonial_shortcode', array('themestudio_shortcodes_fe','themestudio_testimonial_shortcode') );
add_shortcode( 'client_worked', array('themestudio_shortcodes_fe','client_worked') );
add_shortcode( 'ts_button_welcom', array('themestudio_shortcodes_fe','ts_button_welcom') );
add_shortcode( 'ts_team_member', array('themestudio_shortcodes_fe','ts_team_member') );
add_shortcode( 'themestudio_pricing_shortcode', array('themestudio_shortcodes_fe','themestudio_pricing_shortcode'));
add_shortcode( 'themestudio_service_shortcode', array('themestudio_shortcodes_fe','themestudio_service_shortcode'));
add_shortcode( 'themestudio_feature_shortcode', array('themestudio_shortcodes_fe','themestudio_feature_shortcode'));
add_shortcode( 'themestudio-skillbar', array('themestudio_shortcodes_fe','themestudio_skillbar_shortcode') );
add_shortcode( 'themestudio_our_blog_shortcode', array('themestudio_shortcodes_fe','themestudio_our_blog_shortcode'));
add_shortcode( 'themestudio_map_shortcode', array('themestudio_shortcodes_fe','themestudio_map_shortcode'));
add_shortcode( 'themestudio_slider_parallax', array('themestudio_shortcodes_fe','themestudio_slider_parallax'));