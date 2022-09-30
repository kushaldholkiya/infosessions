<?php 
		require_once (OVA_THEME_URL.'/extend/customizer/validate_customizer.php');
		require_once (OVA_THEME_URL.'/framework/customizer/google_font.php');

		

		
	class eventmana_customizer{

		public function __construct(){
			
			add_action('customize_register', array($this, 'ova_theme_customizer'));
			
		}

		// Create the options for theme
		public function ova_theme_customizer(){

			global $wp_customize;

			//$wp_customize->remove_section('title_tagline');
			$wp_customize->remove_section('colors');
			$wp_customize->remove_section('header_image');
			$wp_customize->remove_section('background_image');
			$wp_customize->remove_section('static_front_page');

			$this->ova_create_customizer();
			
		}

		public function ova_create_customizer(){
			
			global $wp_customize;
			
			/* Define customizer file with langauge */
			$customizer_name = 'define_customizer'.'_'.get_locale().'.xml'; /* For example define_customizer_en_US.xml */

			/* Get customizer file */
			if(file_exists(OVA_THEME_URL.'/extend/customizer/'.$customizer_name)){
				$path_customize = OVA_THEME_URL.'/extend/customizer/'.$customizer_name;
			} else if(file_exists(OVA_THEME_URL.'/extend/customizer/define_customizer.xml')){
				$path_customize = OVA_THEME_URL.'/extend/customizer/define_customizer.xml';
			} else if(file_exists(OVA_THEME_URL.'/framework/customizer/define_customizer.xml')){
				$path_customize = OVA_THEME_URL.'/framework/customizer/define_customizer.xml';
			}

			
			$xml = simplexml_load_file($path_customize);

			foreach($xml as $key=>$value){

				// Get section
				$section = $value->attributes();
				
				// Create section
				$this->ova_create_section( (string)$section->id, (string)$section->title, (string)$section->priority );
				

				// Get all setting in a section
				foreach($value->setting as $key1=>$value1){

					$setting = $value1->attributes();

					// Create setting
					$setting_default = $setting->default;
					if($setting->type == "image"){
						$setting_default = OVA_THEME_URI.'/'.$setting->default;
					}
					$sanitize_js_callback = '';
					if($setting->sanitize_js_callback != ''){
						$sanitize_js_callback = $setting->sanitize_js_callback;
					}

					$this->ova_create_setting( (string)$setting->id, (string)$setting_default, (string)$sanitize_js_callback );

					// Create control
					$choices = array();
					if($value1->choice){
						foreach ($value1->choice as $key2=> $value2) {
							$choices[(string)$value2['value']] = (string)$value2;
						}
					}
					$this->ova_create_control( (string)$setting->id, (string)$setting->label, (string)$setting->description, (string)$section->id, (string)$setting->type, $choices);

				} // endforeach $value

			} // enforeach $xml


		}

		// Create setting
		public function ova_create_setting($setting_id, $setting_default, $sanitize_js_callback){
			global $wp_customize;
			if($sanitize_js_callback){
					$wp_customize->add_setting($setting_id,array(
					'default'	=> $setting_default,
					'transport'	=> 'refresh',
					'sanitize_callback' => array($this, 'sanitize_callback'),
					'sanitize_js_callback' => $sanitize_js_callback
				));
			}else{
				$wp_customize->add_setting($setting_id,array(
					'default'	=> $setting_default,
					'transport'	=> 'refresh',
					'sanitize_callback' => array($this, 'sanitize_callback'),
				));
			}
			
			
		}

		// Create section
		public function ova_create_section($section_id, $section_title, $section_priority){
			global $wp_customize;
			// Add section 
			$wp_customize->add_section($section_id, array(
					'title'	=> $section_title,
					'priority'	=> $section_priority,

				));
		}

		

		// Create control: text
		public function ova_create_control($setting_id, $setting_label, $description, $section_id, $setting_type, $choices){
			global $wp_customize;
			// Add control
			if($setting_type == 'text' || $setting_type == 'checkbox' || $setting_type == 'dropdown-pages' || $setting_type == 'textarea'){
				$wp_customize->add_control($setting_id, array(
					'label'	=> $setting_label,
					'section'	=> $section_id,
					'settings'	=> $setting_id,
					'description'	 => $description,
					'type'		=> $setting_type,
				));
			} else if($setting_type == 'image'){
				$wp_customize->add_control(
			       new WP_Customize_Image_Control(
			           $wp_customize,
			           $setting_id,
			           array(
			               'label'      => $setting_label,
			               'section'	=> $section_id,
			               'description'	 => $description,
						   'settings'	=> $setting_id
			           )
			       )
			   );
			} else if($setting_type == 'radio' || $setting_type == 'select'){
				$wp_customize->add_control(
				    new WP_Customize_Control(
				        $wp_customize,
				        $setting_id,
				        array(
				            'label'          => $setting_label,
				            'section'        => $section_id,
				            'settings'       => $setting_id,
				            'type'           => $setting_type,
				            'description'	 => $description,
				            'choices'        => $choices
				        )
				    )
				);
			} else if($setting_type == 'color'){
				$wp_customize->add_control( 
					new WP_Customize_Color_Control( 
					$wp_customize, 
					$setting_id, 
					array(
						'label'          => $setting_label,
			            'section'        => $section_id,
			            'description'	 => $description,
			            'settings'       => $setting_id,
					) ) 
				);
			} else if($setting_type == 'media'){
				$wp_customize->add_control( 
					new WP_Customize_Upload_Control( 
					$wp_customize, 
					$setting_id, 
					array(
						'label'          => $setting_label,
			            'section'        => $section_id,
			            'description'	 => $description,
			            'settings'       => $setting_id,
					) ) 
				);
			} else if($setting_type == 'googlefont'){
				$wp_customize->add_control( 
					new Google_Font_Dropdown_Custom_Control( 
					$wp_customize, 
					$setting_id, 
					array(
						'label'          => $setting_label,
			            'section'        => $section_id,
			            'description'	 => $description,
			            'settings'       => $setting_id,
					) ) 
				);
			} // end if 
			
			
		} // end function

		
		/* sanitize_callback */
		public function sanitize_callback($value){
			return $value;
		}


	} // end class

 