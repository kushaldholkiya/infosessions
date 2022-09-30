<?php

/* Slideshow Shortcode */
add_shortcode('eventmana_slideshow', 'eventmana_slideshow');
function eventmana_slideshow($atts, $content = null) {

    $atts = shortcode_atts(
    array(
      'slug_group'  => '',
      'orderby'	=> "ID",
      "order"	=> "DESC",
      "count"	=> "2",
      'auto_slider' => 'true',
      'duration'    => '3000',
      'navigation'  => 'true',
      'loop'        => 'true',
      'class'       => '',
    ), $atts);

    

    $args = array(
    	'post_type'=>'slideshow', 
    	'slidegroup'=>$atts['slug_group'], 
    	'orderby'=> $atts['orderby'], 
    	'order'=> $atts['order'], 
    	'posts_per_page' => $atts['count']
    );

    $slideshow = new WP_QUery($args);

    if(count($slideshow->posts) <= 1){
      $atts['loop'] = 'false';
      $atts['navigation'] = 'false';
    }

    $html = '';
    if(count($slideshow->posts) > 0){
	    $html .='<div id="main" class="'.$atts['class'].'">
	                <section class="page-section no-padding background-img-slider">
	                    <div class="container"> 

	                        <div id="main-slider" class="main-slider owl-carousel owl-theme" data-auto_slider="'.$atts['auto_slider'].'" data-duration="'.$atts['duration'].'" data-navigation="'.$atts['navigation'].'" data-loop="'.$atts['loop'].'">';

		                        if($slideshow->have_posts()):
							      	while($slideshow->have_posts()): $slideshow->the_post();

							      		$post_id = get_the_id();

								          $template = get_post_meta($post_id, "eventmana_met_slideshow_tem", true);

								          if($template == 'countdown'){
								          	$slideshow_tem1_image = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_image', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_image', true):''; 
								          	$slideshow_tem1_time = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_time', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_time', true):'';
								          	$slideshow_tem1_name = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_name', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_name', true):'';
								          	$slideshow_tem1_countdown_shortcode = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_countdown_shortcode', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_countdown_shortcode', true):'';
								          	$slideshow_tem1_button = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_button', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_button', true):'';

								          		$html .='<div class="item page text-center slide5">
						                                    <div class="caption">
						                                        <div class="container">
						                                            <div class="div-table">
						                                                <div class="div-cell">';
						                                                	if($slideshow_tem1_image){
						                                                    	$html .= '<p class="text-center avatar"><img src="'.$slideshow_tem1_image.'" style="width: auto;" alt="alt"/></p>';
						                                                	}
						                                                	if($slideshow_tem1_time){
						                                                    	$html .= '<h2 data-animation="fadeInDown" data-animation-delay="100"><span>'.$slideshow_tem1_time.'</span></h2>';
						                                                	}
						                                                	if($slideshow_tem1_name){
						                                                    	$html .= '<h3 class="caption-subtitle" data-animation="fadeInUp" data-animation-delay="300">'.$slideshow_tem1_name.'</h3>';
						                                                	}
						                                                	if($slideshow_tem1_countdown_shortcode){
						                                                		$html .= do_shortcode($slideshow_tem1_countdown_shortcode);	
						                                                	}
						                                                    if($slideshow_tem1_button){
						                                                    	$html .= '<p class="caption-text">'.$slideshow_tem1_button.'</p>';
						                                                    }
						                                                    
						                                                $html .= '</div>
						                                            </div>
						                                        </div>
						                                    </div>
						                                </div>';

								          }else if($template == 'find_event'){

								          		$slideshow_tem2_name = get_post_meta($post_id, 'eventmana_met_slideshow_tem2_name', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem2_name', true):''; 
								          		$slideshow_tem2_time = get_post_meta($post_id, 'eventmana_met_slideshow_tem2_time', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem2_time', true):''; 
								          		$slideshow_tem2_searchform = get_post_meta($post_id, 'eventmana_met_slideshow_tem2_searchform', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem2_searchform', true):''; 
								          		$slideshow_tem2_button = get_post_meta($post_id, 'eventmana_met_slideshow_tem2_button', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem2_button', true):''; 

								          		$html .= '
									          			<div class="item page text-center slide4">
						                                    <div class="caption">
						                                        <div class="container">
						                                            <div class="div-table">
						                                                <div class="div-cell">';

						                                                	if($slideshow_tem2_name){
						                                                		$html .= $slideshow_tem2_name;	
						                                                	}
						                                                    if($slideshow_tem2_time){
						                                                    	$html .= $slideshow_tem2_time;
						                                                    }
						                                                    if($slideshow_tem2_searchform){
						                                                    	$html .= '<div class="row">
									                                                        <div class="col-md-8 col-md-offset-2">
									                                                            '.do_shortcode($slideshow_tem2_searchform).'
									                                                        </div>
									                                                    </div>';
						                                                    }
						                                                    if($slideshow_tem2_button){
						                                                    	$html .= '<p class="caption-text">'.$slideshow_tem2_button.'</p>';
						                                                    }

						                                                $html .= '</div>
						                                            </div>
						                                        </div>
						                                    </div>
						                                </div>
								          		';
								          }else if($template == 'simple'){

								          		$slideshow_tem3_image = get_post_meta($post_id, 'eventmana_met_slideshow_tem3_image', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem3_image', true):''; 
								          		$slideshow_tem3_name = get_post_meta($post_id, 'eventmana_met_slideshow_tem3_name', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem3_name', true):''; 
								          		$slideshow_tem3_time = get_post_meta($post_id, 'eventmana_met_slideshow_tem3_time', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem3_time', true):''; 
								          		$slideshow_tem3_button = get_post_meta($post_id, 'eventmana_met_slideshow_tem3_button', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem3_button', true):''; 

							          			$html .='
							          				<div class="item text-center slide6">
					                                    <div class="caption">
					                                        <div class="container">
					                                            <div class="div-table">
					                                                <div class="div-cell">

					                                                    <div class="div-table slider-content">';
					                                                    	if($slideshow_tem3_image){
					                                                    		$html .='<div class="div-cell event-image">
								                                                            <img src="'.$slideshow_tem3_image.'" alt="event"/>
								                                                        </div>'	;
					                                                    	}

					                                                        $html .= '<div class="div-cell">';
					                                                        	if($slideshow_tem3_name){
					                                                        		$html .= '<h3 class="caption-subtitle animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="300">'.$slideshow_tem3_name.'</h3>';	
					                                                        	}
					                                                            if($slideshow_tem3_time){
					                                                            	$html .= '<h2 class="caption-title animated fadeInDown visible" data-animation="fadeInDown" data-animation-delay="100">'.$slideshow_tem3_time.'</h2>';
					                                                            }
					                                                            if($slideshow_tem3_button){
					                                                            	$html .= '<p class="caption-text">'.$slideshow_tem3_button.'</p>';
					                                                            }

					                                                        $html .= '</div>
					                                                    </div>

					                                                </div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
								          		';
								          }

							    	endwhile;
							    endif;
	                            wp_reset_postdata();
	                        $html .= '</div>

	                    </div>
	                </section>
	            </div>';

    }
    return $html;
}
/* /Slideshow Shortcode */


/* Slideshow multi background */
add_shortcode('eventmana_slideshow_multi_bg', 'eventmana_slideshow_multi_bg');
function eventmana_slideshow_multi_bg($atts, $content = null) {

    $atts = shortcode_atts(
    array(
      'slug_group'  => '',
      'orderby'	=> "ID",
      "order"	=> "DESC",
      "count"	=> "2",
      'auto_slider' => 'true',
      'duration'    => '3000',
      'navigation'  => 'true',
      'loop'        => 'true',
      'height_desk'	=> '768px',
      'height_ipad'	=> '768px',
      'height_mobile'	=> '768px',
      'class'       => '',
    ), $atts);

    

    $args = array(
    	'post_type'=>'slideshow', 
    	'slidegroup'=>$atts['slug_group'], 
    	'orderby'=> $atts['orderby'], 
    	'order'=> $atts['order'], 
    	'posts_per_page' => $atts['count']
    );

    $slideshow = new WP_QUery($args);

    if(count($slideshow->posts) <= 1){
      $atts['loop'] = 'false';
      $atts['navigation'] = 'false';
    }

    $html = '';
    if(count($slideshow->posts) > 0){
	    $html .='<div id="main" class="slideshow_multi_bg '.$atts['class'].'">
	                <section class="page-section no-padding background-img-slider">
	                    <div class="container"> 

	                        <div id="main-slider" class="main-slider main-slider-multi-bg owl-carousel owl-theme" data-height_desk="'.$atts['height_desk'].'" data-height_ipad="'.$atts['height_ipad'].'" data-height_mobile="'.$atts['height_mobile'].'" data-auto_slider="'.$atts['auto_slider'].'" data-duration="'.$atts['duration'].'" data-navigation="'.$atts['navigation'].'" data-loop="'.$atts['loop'].'">';

		                        if($slideshow->have_posts()):
							      	while($slideshow->have_posts()): $slideshow->the_post();

							      		$post_id = get_the_id();

								          $template = get_post_meta($post_id, "eventmana_met_slideshow_tem", true);
								          $bg_feature = get_the_post_thumbnail_url($post_id, 'full');

								          if($template == 'countdown'){
								          	$slideshow_tem1_image = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_image', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_image', true):''; 
								          	$slideshow_tem1_time = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_time', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_time', true):'';
								          	$slideshow_tem1_name = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_name', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_name', true):'';
								          	$slideshow_tem1_countdown_shortcode = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_countdown_shortcode', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_countdown_shortcode', true):'';
								          	$slideshow_tem1_button = get_post_meta($post_id, 'eventmana_met_slideshow_tem1_button', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem1_button', true):'';
								          	
								          	
								          		$html .='<div class="item page text-center slide5" style="background: url('.$bg_feature.')">
								          					<div class="bg_mask"></div>
						                                    <div class="caption">
						                                        <div class="container">
						                                            <div class="div-table">
						                                                <div class="div-cell">';
						                                                	if($slideshow_tem1_image){
						                                                    	$html .= '<p class="text-center avatar"><img src="'.$slideshow_tem1_image.'" style="width: auto;" alt="alt"/></p>';
						                                                	}
						                                                	if($slideshow_tem1_time){
						                                                    	$html .= '<h2 data-animation="fadeInDown" data-animation-delay="100"><span>'.$slideshow_tem1_time.'</span></h2>';
						                                                	}
						                                                	if($slideshow_tem1_name){
						                                                    	$html .= '<h3 class="caption-subtitle" data-animation="fadeInUp" data-animation-delay="300">'.$slideshow_tem1_name.'</h3>';
						                                                	}
						                                                	if($slideshow_tem1_countdown_shortcode){
						                                                		$html .= do_shortcode($slideshow_tem1_countdown_shortcode);	
						                                                	}
						                                                    if($slideshow_tem1_button){
						                                                    	$html .= '<p class="caption-text">'.$slideshow_tem1_button.'</p>';
						                                                    }
						                                                    
						                                                $html .= '</div>
						                                            </div>
						                                        </div>
						                                    </div>
						                                </div>';

								          }else if($template == 'find_event'){

								          		$slideshow_tem2_name = get_post_meta($post_id, 'eventmana_met_slideshow_tem2_name', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem2_name', true):''; 
								          		$slideshow_tem2_time = get_post_meta($post_id, 'eventmana_met_slideshow_tem2_time', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem2_time', true):''; 
								          		$slideshow_tem2_searchform = get_post_meta($post_id, 'eventmana_met_slideshow_tem2_searchform', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem2_searchform', true):''; 
								          		$slideshow_tem2_button = get_post_meta($post_id, 'eventmana_met_slideshow_tem2_button', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem2_button', true):''; 

								          		$html .= '
									          			<div class="item page text-center slide4" style="background: url('.$bg_feature.')">
						                                    <div class="bg_mask"></div>
						                                    <div class="caption">
						                                        <div class="container">
						                                            <div class="div-table">
						                                                <div class="div-cell">';

						                                                	if($slideshow_tem2_name){
						                                                		$html .= $slideshow_tem2_name;	
						                                                	}
						                                                    if($slideshow_tem2_time){
						                                                    	$html .= $slideshow_tem2_time;
						                                                    }
						                                                    if($slideshow_tem2_searchform){
						                                                    	$html .= '<div class="row">
									                                                        <div class="col-md-8 col-md-offset-2">
									                                                            '.do_shortcode($slideshow_tem2_searchform).'
									                                                        </div>
									                                                    </div>';
						                                                    }
						                                                    if($slideshow_tem2_button){
						                                                    	$html .= '<p class="caption-text">'.$slideshow_tem2_button.'</p>';
						                                                    }

						                                                $html .= '</div>
						                                            </div>
						                                        </div>
						                                    </div>
						                                </div>
								          		';
								          }else if($template == 'simple'){

								          		$slideshow_tem3_image = get_post_meta($post_id, 'eventmana_met_slideshow_tem3_image', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem3_image', true):''; 
								          		$slideshow_tem3_name = get_post_meta($post_id, 'eventmana_met_slideshow_tem3_name', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem3_name', true):''; 
								          		$slideshow_tem3_time = get_post_meta($post_id, 'eventmana_met_slideshow_tem3_time', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem3_time', true):''; 
								          		$slideshow_tem3_button = get_post_meta($post_id, 'eventmana_met_slideshow_tem3_button', true)?get_post_meta($post_id, 'eventmana_met_slideshow_tem3_button', true):''; 

							          			$html .='
							          				<div class="item text-center slide6" style="background: url('.$bg_feature.')">
					                                    <div class="bg_mask"></div>
					                                    <div class="caption">
					                                        <div class="container">
					                                            <div class="div-table">
					                                                <div class="div-cell">

					                                                    <div class="div-table slider-content">';
					                                                    	if($slideshow_tem3_image){
					                                                    		$html .='<div class="div-cell event-image">
								                                                            <img src="'.$slideshow_tem3_image.'" alt="event"/>
								                                                        </div>'	;
					                                                    	}

					                                                        $html .= '<div class="div-cell">';
					                                                        	if($slideshow_tem3_name){
					                                                        		$html .= '<h3 class="caption-subtitle animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="300">'.$slideshow_tem3_name.'</h3>';	
					                                                        	}
					                                                            if($slideshow_tem3_time){
					                                                            	$html .= '<h2 class="caption-title animated fadeInDown visible" data-animation="fadeInDown" data-animation-delay="100">'.$slideshow_tem3_time.'</h2>';
					                                                            }
					                                                            if($slideshow_tem3_button){
					                                                            	$html .= '<p class="caption-text">'.$slideshow_tem3_button.'</p>';
					                                                            }

					                                                        $html .= '</div>
					                                                    </div>

					                                                </div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
								          		';
								          }

							    	endwhile;
							    endif;
	                            wp_reset_postdata();
	                        $html .= '</div>

	                    </div>
	                </section>
	            </div>';

    }
    return $html;
}

/* Coutdown shortcode */
add_shortcode('eventmana_countdown', 'eventmana_countdown');
function eventmana_countdown($atts, $content = null) {

    $atts = shortcode_atts(
    array(
      'end_day' 	=> '',
      'end_month' 	=> '',
      'end_year' 	=> '',
      'end_hour' 	=> '',
      'end_minutes' 	=> '',
      'display_format'=> 'dHMS',
      'timezone'	=> '0',
      'years'		=> "years",
      "months"		=> "months",
      "weeks"		=> "weeks",
      'days' 		=> 'days',
      'hours'    	=> 'hours',
      'minutes'  	=> 'minutes',
      'seconds'		=> 'seconds',
      'year'		=> "year",
      "month"		=> "month",
      "week"		=> "week",
      'day' 		=> 'day',
      'hour'    	=> 'hour',
      'minute'  	=> 'minute',
      'second'		=> 'second',
      'id'			=> '',
      'class'       => '',
    ), $atts);

    $html = '';



	$end_day = $atts['end_day'];
	$end_month = $atts['end_month']-1;
	$end_year = $atts['end_year'];
	$end_hour = $atts['end_hour'];
	$end_minutes = $atts['end_minutes'];

	$display_format = $atts['display_format'];
	$timezone = $atts['timezone'];

    $years = $atts['years'];
    $months = $atts['months'];
    $weeks = $atts['weeks'];
    $days = $atts['days'];
    $hours = $atts['hours'];
    $minutes = $atts['minutes'];
    $seconds = $atts['seconds'];
    $year = $atts['year'];
    $month = $atts['month'];
    $week = $atts['week'];
    $day = $atts['day'];
    $hour = $atts['hour'];
    $minute = $atts['minute'];
    $second = $atts['second'];

	//if($end_day && $end_month && $end_year){
		$html .= '
		<div class="countdown-wrapper '.$atts['class'].'">
		<div id="'.$atts['id'].'" class="defaultCountdown clearfix " 
		             data-years='.$years.' data-months='.$months.' data-weeks="'.$weeks.'" data-days="'.$days.'" data-hours="'.$hours.'" data-minutes="'.$minutes.'" data-seconds="'.$seconds.'" 
		             data-year='.$year.' data-month='.$month.' data-week="'.$week.'" data-day="'.$day.'" data-hour="'.$hour.'" data-minute="'.$minute.'" data-second="'.$second.'" 
		             data-end_date_y = "'.$end_year.'" data-end_date_m="'.$end_month.'" data-end_date_d="'.$end_day.'" data-end_date_h="'.$end_hour.'" data-end_date_i="'.$end_minutes.'" 
		             data-timezone = "'.$timezone.'" data-display_format="'.$display_format.'"
		  ></div></div>
		';
  	//}
  	return $html;
}    
/* /Coutdown shortcode */


/* Heading shortcode */
add_shortcode('eventmana_heading', 'eventmana_heading');
function eventmana_heading($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'icon'	=> '',
    	'icon_bg'	=> '',
    	'icon_color' => '',
    	'title'	=> '',
    	'desc'	=> '',
    	'display_slash' => 'true',
      	'class'       => '',
    ), $atts);

    $html = '';


    $html .='
    	<h1 class="section-title '.$atts['class'].'">';
    		if($atts['icon']){
    			$html .= '<span data-animation="flipInY" data-animation-delay="300" class="icon-inner">
    						<span class="fa-stack">
						        <i class="fa rhex fa-stack-2x" style="background-color:'.$atts['icon_bg'].'"></i>
						        <i class="fa '.$atts['icon'].' fa-stack-1x" style="color:'.$atts['icon_color'].'"></i>
				        	</span>
				          </span>';
    		}
	        
    		
    			$html .= '<span data-animation="fadeInRight" data-animation-delay="500" class="title-inner">';

				        	if($atts['title']){
				        		$html .= '<span class="title"> '.$atts['title'].' </span>';
				      		}
    		
    						$html .= '<small>';
	        
		    					$html .= ($atts['display_slash'] == 'true')? ' / ':'';

		    					$html .= ($atts['desc']) ? $atts['desc']:'';
		    				$html .= '</small>
	        		</span>
	    </h1>
    ';
  	return $html;
}    

add_shortcode('eventmana_eventfilter', 'eventmana_eventfilter');
function eventmana_eventfilter($atts, $content = null) {
    global $theme_option;
    $atts = shortcode_atts(
    array(
	    'array_slug'    => '',
	    'show_past_event' => 'yes',
	    'count'         => '10',
	    'order_by'      => 'ID',
	    'order'         =>'DESC',
	    'alltext'       => 'All',
	    'ticketdetail'	=> 'Tickets & Details',
	    'icon_time'			=> 'fa-file-text-o',
	    'icon'			=> 'fa-star',
	    'tab_active'	=> "",
	    'style'			=> "style1",
	    "class"			=> ""		
    ), $atts);

    $args = array('type' => 'post','taxonomy' => 'eventgroup');
    $categories = get_categories( $args );


    $unique_portfolio = rand();

    $array_slug = explode(',', trim($atts['array_slug']));
    

    $tab_active = '';
    if(trim($atts['tab_active']) == ''){
    	$tab_active = 'current';
    }
    $html = '';

    /* Navigation filter */
	$html .='<div class="clear clearfix overflowed">
                <div class="section-title pull-left" style="width: auto;">
                    <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa '.$atts['icon'].' fa-stack-1x"></i></span></span>
                </div>
                <ul id="filtrable-events" class="filtrable clearfix" data-tab_active ="'.$atts['tab_active'].'">
                    <li class="all '.$tab_active.'"><a href="#" data-filter="*">'.$atts['alltext'].'</a></li>';
                    for($i=0; $i<count($array_slug); $i++){
				      foreach ($categories as $key => $cat) {

				        if($array_slug[$i] == $cat->slug){
				        	$tab_active = ($cat->slug == $atts['tab_active']) ? 'current':'';
				          $html .= '<li class="'.$cat->slug.' '.$tab_active.'"><a href="#" data-filter=".'.$cat->slug.'">'.$cat->name.'</a></li>';
				        }
				      }
				    };
                $html .='</ul>
            </div>';

    /* Show item */
    $style_ver = ($atts['style'] == 'style1') ? 'vertical' : '';
    $html .= '<div class="row thumbnails events '.$style_ver.' isotope isotope-items">';

	    //foreach ($array_slug as $key => $slug) {

    	$past_event = '';
    	if($atts['show_past_event'] == 'no'){
    		$past_event = "'meta_query' => array(
				      			'key' => 'eventmana_met_event_end_date',
				                'value' => time(),
				                'compare' => '>=',
					      )";
    	}


	    	if( ($atts['order_by'] == 'eventmana_met_event_date') || ($atts['order_by'] == 'eventmana_met_event_end_date') ){

	    			if($atts['show_past_event'] == 'no'){
	    				$args_portfolio = array(
					      'post_type' => 'event',
					      'posts_per_page' => $atts['count'],
					      'orderby'	=> 'meta_value_num',
					      'meta_key' => $atts['order_by'],
					      'meta_query' => array(
					      		'key' => 'eventmana_met_event_end_date',
				                'value' => time(),
				                'compare' => '>=',
					      ),
					      'order'	=> $atts['order'],
					      'tax_query' => array(
					        array(
					          'taxonomy' => 'eventgroup',
					          'field'    => 'slug',
					          'terms'	=> $array_slug
					        ),        
					      )

					    );
	    			}else{
	    				$args_portfolio = array(
					      'post_type' => 'event',
					      'posts_per_page' => $atts['count'],
					      'orderby'	=> 'meta_value_num',
					      'meta_key' => $atts['order_by'],
					      'order'	=> $atts['order'],
					      'tax_query' => array(
					        array(
					          'taxonomy' => 'eventgroup',
					          'field'    => 'slug',
					          'terms'	=> $array_slug
					        ),        
					      )

					    );
	    			}
			    	

			    }else{
			    	if($atts['show_past_event'] == 'no'){
			    		$args_portfolio = array(
					      'post_type' => 'event',
					      'posts_per_page' => $atts['count'],
					      'orderby'=> $atts['order_by'],
					      'order'=> $atts['order'],
					      'meta_key' => 'eventmana_met_event_end_date',
					      'meta_query' => array(
				      			'key' => 'eventmana_met_event_end_date',
				                'value' => time(),
				                'compare' => '>=',
					      ),
					      'tax_query' => array(
					        array(
					          'taxonomy' => 'eventgroup',
					          'field'    => 'slug',
					          'terms'	=> $array_slug
					        ),        
					      )
					    );
			    	}else{
			    		$args_portfolio = array(
					      'post_type' => 'event',
					      'posts_per_page' => $atts['count'],
					      'orderby'=> $atts['order_by'],
					      'order'=> $atts['order'],
					      'meta_key' => 'eventmana_met_event_end_date',
					      'tax_query' => array(
					        array(
					          'taxonomy' => 'eventgroup',
					          'field'    => 'slug',
					          'terms'	=> $array_slug
					        ),        
					      )
					    );
			    	}
			    	
			    }

			    
			    $event = new WP_Query( $args_portfolio );
			    


	            	if ( $event->have_posts() ) : while ( $event->have_posts() ) : $event->the_post();
	            		
	            		$post_id = get_the_id();

	                    $terms  = get_the_terms($post_id,'eventgroup');
	                    if ( $terms && ! is_wp_error( $terms ) ) : 
	                        $cat_slug = '';
	                        foreach ( $terms as $term ) {
	                          $cat_slug.= ' '.$term->slug ;
	                        }
	                    endif;
	                    // global $post;

	                    $port_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large');
	                    $event_thumbnail_horizontal = get_post_meta($post_id, "eventmana_met_event_thumbnail_horizontal", true);


	                    if($atts['style'] == 'style1'){
	                    	$html .='<div class="col-md-6 col-sm-6 isotope-item '.$cat_slug.'">
				                    <div class="thumbnail no-border no-padding">
				                        <div class="row">
				                            <div class="col-md-4">
				                                <div class="media_img">
				                                    <img src="'.$port_thumbnail[0].'" alt="'.get_the_title().'"/>
				                                </div>
				                            </div>
				                            <div class="col-md-8">
				                                <div class="caption">
				                                    <h3 class="caption-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
				                                    <p class="caption-category"><i class="fa '.$atts['icon_time'].'"></i> '.get_post_meta($post_id, "eventmana_met_event_time", true).'</p>
				                                    <p class="caption-price">'.get_post_meta($post_id, "eventmana_met_event_price", true).'</p>
				                                    <p class="caption-text">'.get_post_meta($post_id, "eventmana_met_event_intro", true).'</p>
				                                    <p class="caption-more"><a href="'.get_permalink().'" class="btn btn-theme">'.$atts['ticketdetail'].'</a></p>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                </div>';
			            }else{
			            	$html .='
			            			<div class="col-md-3 col-sm-6 isotope-item '.$cat_slug.'">
		                                <div class="thumbnail no-border no-padding">
		                                    <div class="media_img">
		                                        <img src="'.$event_thumbnail_horizontal.'" alt="'.get_the_title().'"/>
		                                    </div>
		                                    <div class="caption">
		                                        <h3 class="caption-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
				                                    <p class="caption-category"><i class="fa '.$atts['icon_time'].'"></i> '.get_post_meta($post_id, "eventmana_met_event_time", true).'</p>
				                                    <p class="caption-price">'.get_post_meta($post_id, "eventmana_met_event_price", true).'</p>
				                                    <p class="caption-text">'.get_post_meta($post_id, "eventmana_met_event_intro", true).'</p>
				                                    <p class="caption-more"><a href="'.get_permalink().'" class="btn btn-theme">'.$atts['ticketdetail'].'</a></p>
		                                    </div>
		                                </div>
		                            </div>
			            	';
			            }

		            endwhile; endif;
		            
	    
	    wp_reset_postdata();

    $html .= '</div>';
            


            
   
  return $html;
} 
/* /EventFilter shortcode */

/* Heading shortcode */
add_shortcode('eventmana_button', 'eventmana_button');
function eventmana_button($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'label'	=> '',
    	'link'	=> '#',
    	'target' => '_blank',
    	'icon'	=> '',
      	'class'       => '',
    ), $atts);

    $html = '';


    $html .='
    	<div class="text-center margin-top '.$atts['class'].'">
            <a data-animation="fadeInUp" data-animation-delay="100" href="'.$atts['link'].'" target="'.$atts['target'].'" class="btn btn-theme btn-theme-grey-dark btn-theme-md"><i class="fa '.$atts['icon'].'"></i> '.$atts['label'].'</a>
        </div>
    ';
  	return $html;
}    
/* /Heading shortcode */


/* Feature shortcode */
add_shortcode('eventmana_feature', 'eventmana_feature');
function eventmana_feature($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'icon'	=> '',
    	'title'	=> '',
    	'desc'	=> '',
    	'label_button' => '',
    	'button_link'	=> '#',
    	'target' => '_blank',
      	'class'       => '',
    ), $atts);

    $html = '';


    $html .='
    	<div class=" thumbnails info-thumbs clear '.$atts['class'].'">
	        <div data-animation="fadeInUp" data-animation-delay="100">
	            <div class="thumbnail no-border no-padding text-center">
	                <div class="rehex">
	                    <div class="rehex-deg">
	                        <div class="rehex-deg">
	                            <div class="rehex-inner">
	                                <div class="caption-wrapper div-table">
	                                    <div class="caption-inner div-cell">
	                                        <p class="caption-buttons"><a href="'.$atts['button_link'].'" target="'.$atts['target'].'" class="btn caption-link"><i class="fa '.$atts['icon'].'"></i></a></p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="caption">
	                    <h3 class="caption-title">'.$atts['title'].'</h3>
	                    <p class="caption-text">'.$atts['desc'].'</p>
	                    <p class="caption-more"><a href="'.$atts['button_link'].'" target="'.$atts['target'].'" class="btn btn-theme">'.$atts['label_button'].'</a></p>
	                </div>
	            </div>
	        </div>
	    </div>    
    ';
  	return $html;
}    
/* /Heading shortcode */



/* Hotel shortcode */
add_shortcode('eventmana_hotel', 'eventmana_hotel');
function eventmana_hotel($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'item_slide'	=> '4',
    	'duration'	=> '3000',
    	'autoplay'	=> 'true',
    	'navigation' => 'true',
    	'loop'		=> 'true',
      	'class'       => '',
    ), $atts);

    $html = '';

    $html .='
    	<div class=" thumbnails hotels '.$atts['class'].'">
            <div class="carousel-slider">
                <div class="owl-carousel slide-4" data-item_slide="'.$atts['item_slide'].'" data-duration="'.$atts['duration'].'" data-autoplay="'.$atts['autoplay'].'" data-navigation="'.$atts['navigation'].'" data-loop="'.$atts['loop'].'">'
                .do_shortcode($content).'
                </div>
            </div>
        </div>
    ';
  	return $html;
}    
/* /Hotel shortcode */


/* Hotel shortcode */
add_shortcode('eventmana_hotel_item', 'eventmana_hotel_item');
function eventmana_hotel_item($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'image'	=> '',
    	'title'	=> '',
    	'rate'	=> '5',
    	'desc' => '',
    	'label_detail_button' => '',
    	'link_detail_button' => '#',
    	'target_detail_button' => '_blank',
    	'label_detail_book' => '',
    	'link_detail_book' => '#',
    	'target_detail_book' => '_blank',
      	'class'       => '',
    ), $atts);

    $html = '';
    $image_info = '';

    if($atts['image']) $image_info = wp_get_attachment_image_src($atts['image'], 'full');

    $html .='
    	<div>
		    <div class="thumbnail no-border no-padding '.$atts['class'].'">
		        <div class="media">';
		        	if($image_info[0]){
		        		$html .= '<img src="'.$image_info[0].'" alt="'.$atts['title'].'">';	
		        	}else{
		        		$html .= '<img src="'.$atts['image'].'" alt="'.$atts['title'].'">';	
		        	}
		            
		            $html .= '<div class="caption hovered">
		                <div class="caption-wrapper div-table">
		                    <div class="caption-inner div-cell">
		                        <p class="caption-buttons"><a href="'.$atts['link_detail_button'].'" target="'.$atts['target_detail_button'].'" class="btn btn-theme caption-link"><i class="fa fa-file-text"></i> '.$atts['label_detail_button'].'</a></p>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="caption">
		            <h3 class="caption-title"><a href="'.$atts['link_detail_button'].'" target="'.$atts['target_detail_button'].'">'.$atts['title'].'</a></h3>
		            <div class="caption-rating rating">';
		            for($i = 0; $i < $atts['rate']; $i++){
		            	$html .='<span class="star"></span>';
		            }
		            $html .= '</div>
		            <p class="caption-text">'.$atts['desc'].'</p>
		            <p class="caption-more"><a href="'.$atts['link_detail_book'].'" target="'.$atts['target_detail_book'].'" class="btn btn-theme">'.$atts['label_detail_book'].'</a></p>
		        </div>
		    </div>
		</div>
    ';
  	return $html;
}    
/* /Hotel shortcode */


/* Testimonial shortcode */
add_shortcode('eventmana_testimonial', 'eventmana_testimonial');
function eventmana_testimonial($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'duration'	=> '3000',
    	'autoplay'	=> 'true',
    	'dots' => 'true',
    	'loop'		=> 'true',
    	'style'		=> 'style1',
      	'class'       => '',
    ), $atts);

    $html = '';
    $style = ($atts['style'] == 'style1') ? '':'testimonials-alt';
    $html .='
    	<div  class="owl-carousel testimonials '.$style.' '.$atts['class'].'" data-animation="fadeInUp" data-animation-delay="100"  data-duration="'.$atts['duration'].'" data-autoplay="'.$atts['autoplay'].'" data-dots="'.$atts['dots'].'" data-loop="'.$atts['loop'].'">
    	'.do_shortcode($content).'
    	</div>
    ';
  	return $html;
}    
/* /Testimonial shortcode */


/* Testimonial shortcode */
add_shortcode('eventmana_testimonial_item', 'eventmana_testimonial_item');
function eventmana_testimonial_item($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'image'	=> '',
    	'description'	=> '',
    	'author'	=> '',
    	'subtitle'	=> '',
    	'style'		=> 'style1',
      	'class'       => '',
    ), $atts);

    $html = '';
    $image_info = '';
    $link_img = '';

    if($atts['image']) $image_info = wp_get_attachment_image_src($atts['image'], 'full');
    if($image_info[0]){
    	$link_img = $image_info[0];
    }else{
    	$link_img = $atts['image'];
    }

    if($atts['style'] == 'style1'){
    	$html .='
	    	<div class="media testimonial '.$atts['class'].'">
	            <div class="media-object pull-right">
	                <div class="rehex testimonial-avatar">
	                    <div class="rehex-deg">
	                        <div class="rehex-deg">
	                            <div class="rehex-inner">
	                                <img class="img-responsive" src="'.$link_img.'" alt="'.$atts['author'].'"/>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="media-body">
	                <p>'.$atts['description'].'</p>
	                <h4 class="media-heading">'.$atts['author'].'</h4>
	            </div>
	        </div>
	    ';
    }else{
    	$html .='
    		<div class="media testimonial">
                <div class="media-object">
                    <div class="testimonial-avatar">
                    	<img class="img-responsive img-circle" src="'.$link_img.'" alt="'.$atts['author'].'"/>
                    </div>
                </div>
                <div class="media-body">
                    <p>'.$atts['description'].'</p>
                    <h4 class="media-heading">'.$atts['author'].'</h4>
                    <h6 class="media-subheading">'.$atts['subtitle'].'</h6>
                </div>
            </div>
    	';
    }
    
  	return $html;
}    
/* /Testimonial shortcode */


/* Create sponsors */
add_shortcode('sponsors', 'sponsors_shortcode');
function sponsors_shortcode($atts, $content = null) {
$atts = shortcode_atts(
    array(
      'auto'      => 'true',
      'show_nav'  => 'true',
      'itemslide' => '5',
      'loop'      => 'true',
      'autoplaytimeout' => '3000',
      'animation' => 'fadeInUp',
      'animation_delay' => '300',
      'class'     => '',
    ), $atts);
    

    $html = '
      <div class="partners-carousel '.$atts['class'].'"  data-animation="'.$atts['animation'].'" data-animation-delay="'.$atts['animation_delay'].'">
          <div class="owl-carousel" data-auto="'.$atts['auto'].'" data-show_nav="'.$atts['show_nav'].'" data-loop="'.$atts['loop'].'" data-itemslide="'.$atts['itemslide'].'" data-autoplaytimeout="'.$atts['autoplaytimeout'].'">'.do_shortcode($content).'</div>
      </div>
    ';

    return $html;
    
}

add_shortcode('item_sponsors', 'item_sponsors_shortcode');
function item_sponsors_shortcode($atts, $content = null) {
$atts = shortcode_atts(
    array(
      'thumbnail' => '',
      'link'  => '',
      'alt'   => '',
    ), $atts);
    $html = '';
    $thumbnail = '';

    if(wp_get_attachment_image_src($atts['thumbnail'], 'full')){
        $obj_thumbnail = wp_get_attachment_image_src($atts['thumbnail'], 'full');
        $thumbnail = $obj_thumbnail['0'];
    }else if($atts['thumbnail']!= ''){
        $thumbnail = $atts['thumbnail'];
    }
    

    $html .='<div><a href="'.$atts['link'].'" target="_blank"><img src="'.$thumbnail.'" alt="'.$atts['alt'].'"/></a></div>';

    return $html;
}
/* /Create item sponsor */


/* Create Speaker Shortcode */
add_shortcode('eventmana_speaker', 'eventmana_speaker');
function eventmana_speaker($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'item_slide'=> '4',
    	'duration'	=> '3000',
    	'autoplay'	=> 'true',
    	'navigation' => 'true',
    	'loop'		=> 'true',
      	'class'       => '',
    ), $atts);

    $html = '';

    $html .='
     <div class="thumbnails clear '.$atts['class'].'">
        <div class="carousel-slider">
            <div class="owl-carousel speaker" data-animation="fadeInUp" data-animation-delay="100" data-item_slide="'.$atts['item_slide'].'" data-duration="'.$atts['duration'].'" data-autoplay="'.$atts['autoplay'].'" data-navigation="'.$atts['navigation'].'" data-loop="'.$atts['loop'].'">
            '.do_shortcode($content).'
            </div>
        </div>
    </div>
    ';
  	return $html;
} 
/* /Create Speaker Shortcode */

/* Create Speaker Shortcode */
add_shortcode('eventmana_speaker_item', 'eventmana_speaker_item');
function eventmana_speaker_item($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'image'	=> '',
    	'name'	=> '',
    	'job'	=> '',
    	'desc'	=> '',
    	'link'	=> '',
    	'target'	=> '_blank',
    	'social'	=> '',
      	'class'       => '',
    ), $atts);

    $html = '';

    // if($atts['image']) $image_info = wp_get_attachment_image_src($atts['image'], 'full');

    if(wp_get_attachment_image_src($atts['image'], 'full')){
        $obj_thumbnail = wp_get_attachment_image_src($atts['image'], 'full');
        $thumbnail = $obj_thumbnail['0'];
    }else if($atts['thumbnail']!= ''){
        $thumbnail = $atts['image'];
    }



    $html .='
    	<div class="'.$atts['class'].'">
            <div class="thumbnail no-border no-padding text-center">';
                if ($atts['image']){
	                $html .= '<div class="rehex speaker-avatar">
	                    <div class="rehex-deg">
	                        <div class="rehex-deg">
	                            <div class="rehex-inner">
	                                <div class="media_old">
	                                    <img src="'.$thumbnail.'" alt="'.$atts['name'].'">
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>';
            	}
                $html .= '<div class="caption before-media">';
                    $html .= ( $atts['link'] != '' ) ? '<h3 class="caption-title"><a href="'.$atts['link'].'" target="'.$atts['target'].'" class="btn caption-link">'.$atts['name'].'</a></h3>' : '<h3 class="caption-title">'.$atts['name'].'</h3>';
                    $html .= '<p class="caption-category">'.$atts['job'].'</p>';
                $html .= '</div>
                <div class="caption">
                    <p>'.$atts['desc'].'</p>
                    '.$atts['social'].'
                </div>
            </div>
        </div>
    ';
  	return $html;
} 
/* /Create Speaker Shortcode */


/* Create latestblog */
add_shortcode('eventmana_latestblog', 'eventmana_latestblog');
function eventmana_latestblog($atts, $content = null) {
$atts = shortcode_atts(
    array(
      'count' => '3',
      'showdate'  => 'true',
      'showcomment' => 'true',
      'showdescription' => 'true',
      'showreadmore'  => 'true',
      'readmore_text' => 'read more',
      'item_slide'=> '4',
		'duration'	=> '3000',
		'autoplay'	=> 'true',
		'navigation' => 'true',
		'loop'		=> 'true',
    ), $atts);

  $args = array('post_type' => 'post', 'posts_per_page' => $atts['count']);
      
  $blog = new WP_Query($args);


   
ob_start(); ?>

<div class="post-row" data-animation="fadeInUp" data-animation-delay="100">
    <div class="carousel-slider">
        <div class="owl-carousel latestblog" data-item_slide="<?php esc_attr_e($atts['item_slide']); ?>" data-duration=" <?php esc_attr_e($atts['duration']); ?>" data-autoplay="<?php esc_attr_e($atts['autoplay']); ?>" data-navigation="<?php esc_attr_e($atts['navigation']);?>" data-loop="<?php esc_attr_e($atts['loop']);?>">

            <?php while($blog->have_posts()) : $blog->the_post(); ?>
            <div>
                <article class="post-wrap" >
			        <div class="post-media">
		                <?php $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id()); ?>
		                <?php if($thumbnail_url){ ?>                    
		                    <img  src="<?php  echo $thumbnail_url; ?>" alt="" class="img-responsive">
		                <?php } ?>
			        </div>

			        <div class="post-header">
			            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h2>
			            <div class="post-meta">
			                <?php if($atts['showdate'] == 'true'){ ?>
			                <span class="post-date">
			                    <?php _e('Posted on', 'eventmana'); ?>
			                    
			                    <span class="day"> <?php the_time( get_option( 'date_format' ));?></span>
			                    
			                </span>
			                <?php } ?>
			                <?php if($atts['showcomment'] == 'true'){ ?>
			                  <span class="pull-right">
			                      <i class="fa fa-comment"></i>                       
			                          <?php comments_popup_link(__(' 0', 'eventmana'), __(' 1', 'eventmana'), ' %'.__('', 'eventmana')); ?>                      
			                  </span>
			                <?php } ?>
			            </div>
			        </div>
			        <?php if($atts['showdescription'] == 'true'){ ?>
			          <div class="post-body">
			              <div class="post-excerpt">
			                  <?php the_excerpt(); /* Category */ ?>                  
			              </div>
			          </div>
			        <?php } ?>
			       
			        <?php if($atts['showreadmore'] == 'true'){ ?>
			          <div class="post-footer">
			              <span class="post-readmore">
			                  <a href="<?php the_permalink(); ?>" class="btn btn-theme btn-theme-transparent"><?php  esc_html_e($atts['readmore_text']); ?></a>
			              </span>
			          </div>
			        <?php } ?>
			       
			    </article>
            </div>
           <?php endwhile; ?>

        </div>
    </div>
</div>


<?php
   wp_reset_postdata();
    return ob_get_clean();
}
/* /Create latest blog */


/* Create location */
add_shortcode('eventmana_location', 'eventmana_location');
function eventmana_location($atts, $content = null) {
$atts = shortcode_atts(
    array(
      'defineid'  => 'map-canvas',
      'latitude'  => '40.9807648',
      'longitude' => '28.9866516',
      'zoom'      => '12',
      'heading' => '',
      'fontclass'=>'',
      'button_name'   => '',
      'button_font_class' => '',
      'button_link' => '',
      'marker_title' => '',
      'style_icon'  => 'rhex',
      'target_link' => '_blank',
      'class'  => '',
    ), $atts);
    $html = '';
    $html .= '
      <div class="container full-width gmap-background">
        <div class="container '.$atts['class'].'">
            <div class="on-gmap color">
                <h1 class="section-title">
                    <span data-animation="flipInY" data-animation-delay="100" class="icon-inner"><span class="fa-stack"><i class="fa '.$atts['style_icon'].' fa-stack-2x"></i><i class="fa '.$atts['fontclass'].' fa-stack-1x"></i></span></span>
                    <span data-animation="fadeInRight" data-animation-delay="100" class="title-inner">'.$atts['heading'].'</span>
                </h1><p>'.do_shortcode( $content ).'</p>
                <a href="'.$atts['button_link'].'" target="'.$atts['target_link'].'" class="btn btn-theme"
                   data-animation="flipInY" data-animation-delay="300">'.$atts['button_name'].' <i class="fa '.$atts['button_font_class'].'"></i></a>
            </div>
        </div>
        
        <div class="google-map" data-zoom="'.$atts['zoom'].'" data-latitude="'.$atts['latitude'].'" data-longitude="'.$atts['longitude'].'" data-defineid="'.$atts['defineid'].'" data-marker_title="'.$atts['marker_title'].'">
            <div id="'.trim($atts['defineid']).'"></div>
        </div>
      </div>
    ';

    return $html;

}
/* /Create location */

/* Gallery */
add_shortcode('eventmana_gallery', 'eventmana_gallery');
function eventmana_gallery($atts, $content = null) {
$atts = shortcode_atts(
    array(
      'icon' => '',
      'filter' => 'Photos:photos,Videos:videos,Gallery:gallery',
      'all_text' => '',
      'class'  => '',
    ), $atts);

    $html = '';

    $html .= '
    	<div class="container">
		    <div class="section-title pull-left" style="width: auto;">
		        <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa '.$atts['icon'].' fa-stack-1x"></i></span></span>
		    </div>

		    <ul id="filtrable-gallery" class="filtrable clearfix">
		    	<li class="all current"><a href="#" data-filter="*">'.$atts['all_text'].'</a></li>';

			    $filter = explode(',', $atts['filter']);
			    
			    for($i=0; $i < count($filter); $i++){
			    	$filter_val = explode(':', $filter[$i]); 
			    	
			    	$html .= '<li class="'.$filter_val[1].'"><a href="#" data-filter=".'.$filter_val[1].'">'.$filter_val[0].'</a></li>';
			    } 

		    $html .= '</ul>
	    </div>
	    <div class="clear clearfix overflowed"></div>

		<section class=" no-padding-top light '.$atts['class'].'">
			<div class="container full-width">
			    <div class="row thumbnails no-padding gallery isotope isotope-items">
			    
			        '.do_shortcode($content).'
			    </div>
			    

			</div>
		</section>      
    ';

    return $html;

}


/* /Gallery */

/* Gallery item */
add_shortcode('eventmana_gallery_item', 'eventmana_gallery_item');
function eventmana_gallery_item($atts, $content = null) {
$atts = shortcode_atts(
    array(
      'thumbnail' => '',
      'alt'	=> '',
      'lightbox_image'	=> '',
      'title'	=> '',
      'cat'	=> '',
      'filter'	=> '',
      'class'  => '',
    ), $atts);
    $html = '';
    // $image_lightbox[] = '';
    // if($atts['thumbnail']) $image_info = wp_get_attachment_image_src($atts['thumbnail'], 'full');
    // if($atts['lightbox_image']) $image_lightbox = wp_get_attachment_image_src($atts['lightbox_image'], 'full');
    $lightbox_image = '';

    if(wp_get_attachment_image_src($atts['thumbnail'], 'full')){
        $obj_thumbnail = wp_get_attachment_image_src($atts['thumbnail'], 'full');
        $thumbnail = $obj_thumbnail['0'];
    }else if($atts['thumbnail']!= ''){
        $thumbnail = $atts['thumbnail'];
    }

    if(wp_get_attachment_image_src($atts['lightbox_image'], 'full')){
        $obj_lightbox_image = wp_get_attachment_image_src($atts['lightbox_image'], 'full');
        $lightbox_image = $obj_lightbox_image['0'];
    }else if($atts['lightbox_image']!= ''){
        $lightbox_image = $atts['lightbox_image'];
    }



    $html .= '
      <div class="col-md-3 col-sm-6 isotope-item '.$atts['filter'].' ">
            <div class="thumbnail no-border no-padding">
                <div class="media">
                    <img src="'.$thumbnail.'" alt="'.$atts['alt'].'" >
                    <div class="caption hovered">
                        <div class="caption-wrapper div-table">
                            <div class="caption-inner div-cell">
                                <p class="caption-buttons">
                                    
                                    <a href="'.$lightbox_image.'" rel="prettyPhoto" title="'.$atts['title'].'" class="btn caption-link"><i class="fa fa-plus"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="caption hovered back">
                        <div class="caption-wrapper div-table">
                            <div class="caption-inner div-cell">
                                <h3 class="caption-title">'.$atts['title'].'</h3>
                                <p class="caption-category">'.$atts['cat'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';

    return $html;

}
/* /Gallery item */


/* Button */
/* Create button */
add_shortcode('eventmana_button2', 'eventmana_button2');
function eventmana_button2($atts, $content = null) {
    global $theme_option;
    $atts = shortcode_atts(
    array(      
      'title' => '',
      'link'  => '',      
      'target'  => 'blank',
      'showicon'  => 'left',
      'fontawesome'=>'',
      'margin'     => '' ,
      'class' => '',
    ), $atts);
    $html = '';

    $title = $atts['title'];
    $link = $atts['link'];    
    $scrollto = '';
    $target = '';

    if($atts['target'] == 'blank'){
      $target = "target='_blank'";
    }elseif($atts['target'] == 'inline'){
      $target = "";
    }else if($atts['target'] == 'scrollto'){
      $target = "";
      $scrollto = 'scroll-to';
    }    
    
    
    if($atts['showicon'] == 'left'){
      $html .= '<a href="'.$atts['link'].'" '.$target.' style="margin: '.$atts['margin'].'" class="btn btn-theme animated flipInY visible  '.$scrollto .$atts['class'].'" data-animation="flipInY" data-animation-delay="200"><i class="fa '.$atts["fontawesome"].'"></i> '.$title.'</a>';
    }if($atts['showicon'] == 'right'){
      $html .= '<a href="'.$atts['link'].'" '.$target.' style="margin: '.$atts['margin'].'" class="btn btn-theme animated flipInY visible  '.$scrollto .$atts['class'].'" data-animation="flipInY" data-animation-delay="200">'.$title.' <i class="fa '.$atts["fontawesome"].'"></i></a>';
    }if($atts['showicon'] == 'none'){
      $html .= '<a href="'.$atts['link'].'" '.$target.' style="margin: '.$atts['margin'].'" class="btn btn-theme animated flipInY visible  '.$scrollto .$atts['class'].'" data-animation="flipInY" data-animation-delay="200">'.$title.'</a>';
    }
    

    return $html;

}
/* /Create button  */

/* Create buttonpopup */
add_shortcode('eventmana_buttonpopup', 'eventmana_buttonpopup');
function eventmana_buttonpopup($atts, $content = null) {
    global $theme_option;
    $atts = shortcode_atts(
    array(      
      'title' => '',
      'imagepath'  => '',
      'videopath'  => '',
      'margin'     => '' ,
      'class' => '',
    ), $atts);
    $html = '';
    $path = '';
    if($atts['imagepath']){
        $path = $atts['imagepath'];
    }elseif($atts['videopath']){
        $path = $atts['videopath'];
    }
    $html .= '<a href="'.$path.'" style="margin: '.$atts['margin'].'" data-gal="prettyPhoto" class="btn btn-theme animated flipInY visible  ' .$atts['class'].'" data-animation="flipInY" data-animation-delay="200">'.$atts['title'].'</a>';

    return $html;
}
/* /Create buttonpopup */
/* Button */


/* imgcarousel shortcode */
add_shortcode('eventmana_imgcarousel', 'eventmana_imgcarousel');
function eventmana_imgcarousel($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'duration'	=> '3000',
    	'autoplay'	=> 'true',
    	'navigation' => 'true',
    	'loop'		=> 'true',
      	'class'       => '',
    ), $atts);

    $html = '';

    $html .='<div class="owl-carousel '.$atts['class'].'" style="display:block;">
    			<div class="img-carousel" data-duration="'.$atts['duration'].'" data-autoplay="'.$atts['autoplay'].'" data-navigation="'.$atts['navigation'].'" data-loop="'.$atts['loop'].'">
			    	'.do_shortcode($content).'
				</div>
			</div>';
  	return $html;
}
/* /imgcarousel shortcode */


/* /imgcarousel item shortcode */
add_shortcode('eventmana_imgcarousel_item', 'eventmana_imgcarousel_item');
function eventmana_imgcarousel_item($atts, $content = null) {

    $atts = shortcode_atts(
    array(
    	'image'	=> '',
    	'alt'	=> '',
      	'class' => '',
    ), $atts);

    $html = '';

    

    if(wp_get_attachment_image_src($atts['image'], 'full')){
        $obj_thumbnail = wp_get_attachment_image_src($atts['image'], 'full');
        $thumbnail = $obj_thumbnail['0'];
    }else if($atts['image']!= ''){
        $thumbnail = $atts['image'];
    }


    $html .='
    	<div class="item"><img class="img-responsive" src="'.$thumbnail.'" alt="'.$atts['alt'].'"/></div>
    ';
  	return $html;
}
/* /imgcarousel item shortcode */


/* Schedule */
add_shortcode('eventmana_schedule', 'eventmana_schedule');
function eventmana_schedule($atts, $content = null) {
    global $theme_option;
    $atts = shortcode_atts(
    array(
	    'array_slug'	=> '',
	    'schedule_order_by' => 'ID',
	    'schedule_order'	=> 'DESC',
	    'schedule_count'	=> '100',
	    'schedule_display_thumbnail'	=> '1',
	    'schedule_display_time'	=> '1',
		'schedule_display_author'	=> '1',
		'schedule_display_author_job'	=> '1',
		'schedule_display_speaker'	=> '1',
		'schedule_display_desc'	=> '1',
		'schedule_display_social'	=> '1',
		'schedule_icon_time' => '',
		'schedule_icon_microphone'	=> '',
		'speakers_text'	=> '',
		'class'       => ''
    ), $atts);

    $filter_orderby = $atts['schedule_order_by'];
    $filter_order = $atts['schedule_order'];
    $schedule_count_each_tab = $atts['schedule_count'];
    $schedule_display_thumbnail = $atts['schedule_display_thumbnail'];
    $schedule_display_time = $atts['schedule_display_time'];    
    
    $schedule_display_author = $atts['schedule_display_author'];
    $schedule_display_author_job = $atts['schedule_display_author_job'];  
    $schedule_display_speaker = $atts['schedule_display_speaker'];  
    $schedule_display_desc = $atts['schedule_display_desc'];
	$schedule_display_social = $atts['schedule_display_social'];

    $schedule_icon_time = $atts['schedule_icon_time'];
    $schedule_icon_microphone = $atts['schedule_icon_microphone'];


    $html = '';

    $html .= '<div class="schedule-wrapper schedule-alt clear '.$atts['class'].'" data-animation="fadeIn" data-animation-delay="200">';

    /* Display navigation tab lv1 */
    $html .= '<div class="schedule-tabs lv1">
                        <ul id="tabs-lv1"  class="nav nav-justified">';
    $array_slug_new = explode(',', $atts['array_slug']);
    foreach ($array_slug_new as $key => $value) {
   		$category_lv1 = get_term_by('slug', $value, 'categories');

   		$class_active_lv1 = '';
   		if($key == 0) { $class_active_lv1 = 'class="active"'; };
   		$html .= '<li '.$class_active_lv1.'><a href="#tab-'.$category_lv1->slug.'" data-toggle="tab">'.$category_lv1->description.'</a></li>';
    }
   
   	$html .= '</ul></div>'; 
   	/* /Display navigation tab lv1 */

   	$html .= '<div class="tab-content lv1">';
   	/* Display content for tab lv1 */
   		
   			foreach ($array_slug_new as $key1 => $value1) {
   				$class_active_lv2 = '';
   				if($key1 == 0) { $class_active_lv2 = 'in active'; };

          $category_lv1 = get_term_by('slug', $value1, 'categories');
          $array_term_childrens = get_term_children( $category_lv1->term_id, 'categories' );

   				   $html .= '<div id="tab-'.trim($value1).'" class="tab-pane fade '.$class_active_lv2.'">';
                      $html .= '<div class="schedule-tabs lv2">
                                  <ul id="tabs-lv2'.$key1.'"  class="nav nav-justified">';
   					/* Display navigation tab lv2 */ 
   						foreach ($array_term_childrens as $key2=> $value2) {
   								$category_lv2 = get_term_by('term_id', $value2, 'categories');

                  $class_active_lv2_ac = '';
                if($key2 == 0) { $class_active_lv2_ac = 'class="active"'; };
	                                $html .= '<li '.$class_active_lv2_ac.'><a href="#tab-lv2-'.$category_lv2->slug.'" data-toggle="tab">'.$category_lv2->name.'</a></li>';
   						}

              $html .= '</ul></div>';

                /* Display content for tab lv1 and lv2 */
                $html .= '<div class="tab-content lv2">';

                  foreach ($array_term_childrens as $key3=> $value3) {        
                      $term_lv2 = get_term_by('term_id', $value3, 'categories');
                        $args = array('post_type' => 'schedule', 'categories'=>$term_lv2->slug, 'orderby'=> $filter_orderby, 'order'=> $filter_order, 'posts_per_page'=> $schedule_count_each_tab);
                        $schedule = new WP_QUery($args);

                        $class_term_lv2 = '';
                        if($key3 == 0) { $class_term_lv2 = 'in active'; };

                        $html .= '<div id="tab-lv2-'.$term_lv2->slug.'" class="tab-pane fade '.$class_term_lv2.'">
                                    <div class="timeline">';
                                      
                                      if($schedule->have_posts()):
                                        while($schedule->have_posts()): $schedule->the_post();

                                    		$post_id = get_the_id();

                                          $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());
                                          $schedule_timetext = get_post_meta($post_id, "eventmana_met_schedule_timetext", true);
                                          $schedule_author = get_post_meta($post_id, "eventmana_met_schedule_author", true);
                                          $schedule_author_job = get_post_meta($post_id, "eventmana_met_schedule_author_job", true);
                                          $schedule_speaker = get_post_meta($post_id, "eventmana_met_schedule_speaker", true);
                                          $schedule_link_speaker = get_post_meta($post_id, "eventmana_met_schedule_link_speaker", true);
                                          $schedule_mail_address = get_post_meta($post_id, "eventmana_met_schedule_mail_address", true);
                                          $schedule_facebook_address = get_post_meta($post_id, "eventmana_met_schedule_facebook_address", true);
                                          $schedule_twitter_address = get_post_meta($post_id, "eventmana_met_schedule_twitter_address", true);
                                          $schedule_linkedin_address = get_post_meta($post_id, "eventmana_met_schedule_linkedin_address", true);
                                          $schedule_pinterest_address = get_post_meta($post_id, "eventmana_met_schedule_pinterest_address", true);
                                          $schedule_googleplus_address = get_post_meta($post_id, "eventmana_met_schedule_googleplus_address", true);
                                          $schedule_tumblr_address = get_post_meta($post_id, "eventmana_met_schedule_tumblr_address", true);
                                          $schedule_instagram_address = get_post_meta($post_id, "eventmana_met_schedule_instagram_address", true);
                                          $schedule_vk_address = get_post_meta($post_id, "eventmana_met_schedule_vk_address", true);
                                          $schedule_flickr_address = get_post_meta($post_id, "eventmana_met_schedule_flickr_address", true);
                                          $schedule_mySpace_address = get_post_meta($post_id, "eventmana_met_schedule_mySpace_address", true);
                                          $schedule_youtube_address = get_post_meta($post_id, "eventmana_met_schedule_youtube_address", true);

                                            $html .= '
                                              <article class="post-wrap" data-animation="fadeInUp" data-animation-delay="300">
                                                  <div class="media">';
                                                      if($schedule_display_thumbnail && $thumbnail_url){

                                                        $html .= '<div class="post-media pull-left">';
                                                            if($schedule_link_speaker){
                                                              $html .= '<a href="'.$schedule_link_speaker.'">';
                                                            }
                                                                $html .= '<img src="'.$thumbnail_url.'" alt="'.$schedule_author.'" class="media-object" />';

                                                                if($schedule_display_author){
                                                                	$html .= '<span class="about"><strong>'.$schedule_author.'</strong></span>';	
                                                                }
                                                            			
                                                                if($schedule_display_author_job){
                                                                	$html .= '<span class="about">'.$schedule_author_job.'</span>';
                                                                }
                                                                

                                                            if($schedule_link_speaker){
                                                              $html .= '</a>';
                                                            }
                                                        $html .= '</div>';
                                                        
                                                      }
                                                      
                                                      $html .= '<div class="media-body">
                                                          <div class="post-header">
                                                              <div class="post-meta">';
                                                                  if($schedule_display_time){
                                                                    $html .= '<span class="post-date"><i class="fa '.$schedule_icon_time.'"></i> '.$schedule_timetext.'</span>';
                                                                  }
                                                                  
                                                              $html .= '</div>
                                                              <h2 class="post-title"><a href="'.get_permalink().'">'.get_the_title( ).'</a></h2>
                                                          </div>';
                                                          if($schedule_display_desc){
                                                            $html .='
                                                            <div class="post-body">
                                                                <div class="post-excerpt">
                                                                    '.get_the_excerpt('').'
                                                                </div>
                                                            </div>';
                                                          }
                                                          $html .='
                                                          <div class="post-footer">
                                                              <span class="post-readmore">';

                                                                  if($schedule_display_speaker && $schedule_speaker){
                                                                    $html .= '<i class="fa '.$schedule_icon_microphone.'"></i> <strong>'.$atts['speakers_text'].'&nbsp;</strong>'.$schedule_speaker.'&nbsp;&nbsp;';
                                                                  }

                                                                  if($schedule_display_social){
                                                              		  if($schedule_mail_address){
	                                                                      $html .= '<a target="_blank" href="mailto:'.$schedule_mail_address.'" ><i class="fa fa-envelope">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_facebook_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_facebook_address.'" ><i class="fa fa-facebook">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_twitter_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_twitter_address.'" ><i class="fa fa-twitter">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_linkedin_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_linkedin_address.'" ><i class="fa fa-linkedin">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_pinterest_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_pinterest_address.'" ><i class="fa fa-pinterest">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_googleplus_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_googleplus_address.'" ><i class="fa fa-google-plus">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_tumblr_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_tumblr_address.'" ><i class="fa fa-tumblr">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_instagram_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_instagram_address.'" ><i class="fa fa-instagram">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_vk_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_vk_address.'" ><i class="fa fa-vk">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_flickr_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_flickr_address.'" ><i class="fa fa-flickr">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_mySpace_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_mySpace_address.'" ><i class="fa fa-users">&nbsp;</i></a>';
	                                                                  }
	                                                                  if($schedule_youtube_address){
	                                                                      $html .= '<a target="_blank" href="'.$schedule_youtube_address.'" ><i class="fa fa-youtube">&nbsp;</i></a>';
	                                                                  }	
                                                                  }
                                                                  

                                                              $html .= '</span>
                                                          </div>
                                                      </div>                                                      
                                                  </div>
                                              </article>';
                                        endwhile;
                                      endif;
                                       wp_reset_postdata();
                        $html .= '</div></div>';
                  }
                $html .= '</div>';
                /* /Display content for tab lv1 and lv2 */
              
   					/* /Display navigation tab lv2 */					
   				$html .= '</div>'; 
   			}
   		
   	/* /Display content for tab lv1 */
   	$html .= '</div>';




    
    $html .= "</div>";
    
    return $html;
}
/* /Create Schedule Shortcode */


/* Create pricing */
add_shortcode('eventmana_pricing', 'eventmana_pricing');
function eventmana_pricing($atts, $content = null) {
$atts = shortcode_atts(
    array(
      	'name' => '',
		'pricing_style' => 'ca',
		'value'   => '',
		'currency' => '',
		'feature' => 'nofeature',
		'name_button'  => '',
		'link_button' =>'',
		'extra_link' => 'true',
      	'product_id' => 'all',
		'attribute_id' => '',
		'variation_id' => '',
		'variation_name' => '',

      'class'     => '',
    ), $atts);
    $html = '';
    $html .= '
      <div class="price-table '.$atts['class'].' '.$atts['feature'].'" data-animation="fadeInUp" data-animation-delay="100">
          <div class="price-table-header">
              <div class="price-label">
                  <h2 class="price-label-title">'.$atts['name'].'</h2>
              </div>
              <div class="price-value">';

               if($atts['pricing_style'] == 'ac'){
                  $html .= '<span class="price-number">'.$atts['value'].'</span><span class="price-unit">'.$atts['currency'].'</span><span class="price-per"></span>';
               }else{
                  $html .= '<span class="price-unit">'.$atts['currency'].'</span><span class="price-number">'.$atts['value'].'</span><span class="price-per"></span>';
               }
                  

              $html .= '</div>
          </div>
          <div class="price-table-rows"><p>'.do_shortcode( $content ).'</p>';

          	

            if($atts['extra_link'] == 'true'){
            	$link = get_site_url('').'/?add-to-cart='.$atts['product_id'].'&variation_id='.$atts['variation_id'].'&attribute_pa_'.$atts['attribute_id'].'='.$atts['variation_name'].'';
	
	    		$html .= '<div class="price-table-row-bottom">
			              <a class="btn btn-theme " href="'.$link.'">'.$atts['name_button'].'</a>
			          </div>';
            }else{
            	
            	$html .= '<div class="price-table-row-bottom">
	                  <a class="btn btn-theme scroll-to" href="'.$atts['link_button'].'">'.$atts['name_button'].'</a>
	              </div>';
            	
              
            }



          $html .= '</div>
      </div>
    ';

    return $html;

} 
/* /Create pricing */



/* Create faq */
add_shortcode('eventmana_faq', 'eventmana_faq');
function eventmana_faq($atts, $content = null) {

	$atts = shortcode_atts(
	    array(
	    	'id'	=> '',
	      'class'     => '',
    ), $atts);

    $html = '';

    $html .= '
      	<div class=" faq-alt '.$atts['class'].'">
            <div class="panel-group" id="'.$atts['id'].'" role="tablist" aria-multiselectable="true">
            	'.do_shortcode($content).'
            </div>
    	</div>
    ';

    return $html;

}
/* /Create faq */


/* Create faq item */
add_shortcode('eventmana_faq_item', 'eventmana_faq_item');
function eventmana_faq_item($atts, $content = null) {

	$atts = shortcode_atts(
	    array(
	    	'id_parent'	=> '',
	    	'title'	=> '',
	    	'desc'	=> '',
	    	'id'	=> '',
	    	'open'	=> 'in',
	    	'class'	=> '',
    ), $atts);

    $html = '';
    $collapse = ($atts['open'] != 'in') ? 'collapsed':'';
    $html .= '
      	<div class="panel panel-default">
            <div class="panel-heading" role="tab" id="'.$atts['id'].'_a'.'">
                <h4 class="panel-title">
                    <a class="'.$collapse.'" data-toggle="collapse" data-parent="#'.$atts['id_parent'].'" href="#'.$atts['id'].'" aria-expanded="true" aria-controls="'.$atts['id'].'">
                        '.$atts['title'].'
                    </a>
                </h4>
            </div>
            <div id="'.$atts['id'].'" class="panel-collapse collapse '.$atts['open'].'" role="tabpanel" aria-labelledby="'.$atts['id'].'_a'.'">
                <div class="panel-body">
                    '.$atts['desc'].'
                </div>
            </div>
        </div>
    ';

    return $html;

}
/* /Create faq item */


/* Create event slider */
add_shortcode('eventmana_event_slider', 'eventmana_event_slider');
function eventmana_event_slider($atts, $content = null) {

	$atts = shortcode_atts(
	    array(
	    	'order_by' => 'ID',
	    	'order'	=> 'DESC',
	    	'count'	=> '5', 
	    	'label_button'	=> 'Tickets & details',
	    	'class'	=> '',
    ), $atts);

    $html = '';
    $html .= '
      	<div class="thumbnails events '.$atts['class'].'">
            <div class="carousel-slider">
                <div class="owl-carousel slide-3">';

                	$terms = get_the_terms( get_the_ID(), 'eventgroup' );
                	$current_id = get_the_ID()?get_the_ID():'0';
					$args = array(
						'post_type' => 'event', 
						'eventgroup'=>$terms[0]->slug,
						'post__not_in' => array($current_id), 
						'orderby'=> $atts['order_by'], 
						'order'=> $atts['order'], 
						'posts_per_page'=> $atts['count'] 
					);
                    $events = new WP_QUery($args);
                   
                    if($events->have_posts()):
                		while($events->have_posts()): $events->the_post();
                		$post_id = get_the_id();
                		$event_thumbnail_horizontal = get_post_meta($post_id, "eventmana_met_event_thumbnail_horizontal", true);
                	$html .='
		                    <div class="isotope-item festival">
		                        <div class="thumbnail no-border no-padding">
		                            <div class="media">
		                                <img src="'.$event_thumbnail_horizontal.'" alt="'.get_the_title().'">
		                                <div class="caption hovered"></div>
		                            </div>
		                            <div class="caption">
		                                <h3 class="caption-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
		                                <p class="caption-category">'.get_post_meta($post_id, "eventmana_met_event_time", true).'</p>
		                                <p class="caption-price">'.get_post_meta($post_id, "eventmana_met_event_price", true).'</p>
		                                <p class="caption-text">'.get_the_excerpt('').'</p>
		                                <p class="caption-more"><a href="'.get_permalink().'" class="btn btn-theme">'.$atts['label_button'].'</a></p>
		                            </div>
		                        </div>
		                    </div>';
		                endwhile;
		            endif;        
                    wp_reset_postdata();
                $html .= '</div>
            </div>
        </div>
    ';

    return $html;

}
/* /Create event slider */

/* iframe eventbrite */
add_shortcode('eventmana_iframe_eventbrite', 'eventmana_iframe_eventbrite');
function eventmana_iframe_eventbrite($atts, $content = null) {

	$atts = shortcode_atts(
	    array(
	    	'id' => '',
	    	'class'	=> '',
    ), $atts);

    $html = '';

    $html .= '
      	<div class="iframe_eventbrite '.$atts['class'].'">
      		<iframe src="//eventbrite.com/tickets-external?eid='.$atts['id'].'&amp;ref=etckt" height="314" width="100%" frameborder="0" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe>
      	</div>
    ';

    return $html;

}
/* /iframe eventbrite */

/* eventmana_formsearch_1 */
add_shortcode('eventmana_formsearch_1', 'eventmana_formsearch_1');
function eventmana_formsearch_1($atts, $content = null) {

	$atts = shortcode_atts(
	    array(
	    	'page_result' => '',
	    	'place_holder' => '',
	    	'all_cat' => '',
	    	'class'	=> '',

    ), $atts);

	$args = array(
	    'type'                     => 'event',
	    'child_of'                 => 0,
	    'parent'                   => '',
	    'orderby'                  => 'name',
	    'order'                    => 'ASC',
	    'hide_empty'               => 1,
	    'hierarchical'             => 1,
	    'exclude'                  => '',
	    'include'                  => '',
	    'number'                   => '',
	    'taxonomy'                 => 'eventgroup',
	    'pad_counts'               => false 

	  ); 
    $cat = get_categories($args);

    $html = '';

    if( strpos($atts['page_result'], '?') ){
	      $post = 'post';
	  }else{
	      $post = 'get';
	  }

	$html .='<form method="'.$post.'" action="'.$atts['page_result'].'" class="location-search '.$atts['class'].'">
	            <div class="form-group">
	                <div class="input-group">
	                    <input type="text" name="event_name" class="form-control text" placeholder="'.$atts['place_holder'].'"/>
	                    <select name="event_cat" class="selectpicker">
	                    	<option value="">'.$atts['all_cat'].'&nbsp;</option>';
                        	
		                      foreach ($cat as $key => $value) {
		                       
		                        $html .= '<option value="'.$value->slug.'">'.$value->name.'</option>';
		                      }

	                    $html .='</select>
	                    <input type="hidden" name="search_event" value="search_event" />
	                    <button class="form-control button-search"><i class="fa fa-search"></i></button>
	                </div>
	            </div>
	        </form>';
    return $html;
}	        
/* eventmana_formsearch_1 */

/* eventmana_formsearch_2 */
add_shortcode('eventmana_formsearch_2', 'eventmana_formsearch_2');
function eventmana_formsearch_2($atts, $content = null) {

	$atts = shortcode_atts(
	    array(
	    	'page_result' => '',
	    	'place_holder' => '',
	    	'all_cat' => '',
	    	'label_button' => '',
	    	'class'	=> '',

    ), $atts);

	$html ='';

	$args = array(
    'type'                     => 'event',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => 1,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'taxonomy'                 => 'eventgroup',
    'pad_counts'               => false 

  ); 
  $cat = get_categories($args);

  if( strpos($atts['page_result'], '?') ){
      $post = 'post';
  }else{
      $post = 'get';
  }

	$html .= '<form id="registration-form" name="registration-form" class="event-form pull-right" action="'.$atts['page_result'].'" method="'.$post.'">
	            <div class="row">
	               		<div class="col-sm-12 form-alert"></div>

		                <div class="col-sm-6 col-md-4">
		                	<div class="form-group">
			                	<input type="text" name="event_name" value="" placeholder="'.$atts['place_holder'].'" class="form-control">
			                </div>                              
		                </div>

		                <div class="col-sm-6 col-md-4">
		                    <div class="form-group selectpicker-wrapper">                                       
			                  <select name="event_cat" class="selectpicker">
		                    	<option value="">'.$atts['all_cat'].'&nbsp;</option>';
	                        	
			                      foreach ($cat as $key => $value) {
			                       
			                        $html .= '<option value="'.$value->slug.'">'.$value->name.'</option>';
			                      }

		                    $html .='</select>
			              </div>
	                	</div>

		                <div class="col-md-4 overflowed">
		                    <div class="form-group">
		                    	<input type="hidden" name="search_event" value="search_event" />
		                        <button class="btn btn-theme submit-button" type="submit"> '.$atts['label_button'].' <i class="fa fa-arrow-circle-right"></i></button>
		                    </div>
		                </div>
	            </div>
	        </form>';
	  return $html;
}       

/* /eventmana_minicart */
add_shortcode('eventmana_minicart', 'eventmana_minicart');
function eventmana_minicart($atts, $content = null) {

	$atts = shortcode_atts(
	    array(
	    	'id' => '',
	    	'class'	=> '',
    ), $atts);

    $html = '';
    	if( class_exists('Woocommerce') ){
    		woocommerce_mini_cart();	
    	}
    	
    $html .= '
      	
    ';

    return $html;

}
/* eventmana_minicart */



/* /get variation */
add_shortcode('eventmana_addtocart', 'eventmana_addtocart');
function eventmana_addtocart($atts, $content = null) {

	$atts = shortcode_atts(
	    array(
	    	'product_id' => 'all',
	    	'attribute_id' => '',
	    	'variation_id' => '',
	    	'variation_name' => '',
	    	'button_text' => '',
	    	'class'	=> '',
    ), $atts);

	$link = get_site_url('').'/?add-to-cart='.$atts['product_id'].'&variation_id='.$atts['variation_id'].'&attribute_pa_'.$atts['attribute_id'].'='.$atts['variation_name'].'';
	
    $html = '<div class="price-table-row-bottom1 '.$atts['class'].'">
	              <a class="btn btn-theme " href="'.$link.'">'.$atts['button_text'].'</a>
	          </div>';

    return $html;

}
/* eventmana_minicart */

?>