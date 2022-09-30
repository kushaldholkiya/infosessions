<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

// if ( file_exists( OVA_THEME_URL.'/framework/metabox/init.php' ) ) {
// 	require_once (OVA_THEME_URL.'/framework/metabox/init.php');
// } 

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function eventmana_met_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function eventmana_met_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function eventmana_met_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}





add_action( 'cmb2_init', 'eventmana_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function eventmana_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'eventmana_met_';

    /**
     * Initiate Layout Settings the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'page_heading_settings',
        'title'         => esc_html__( 'Show Page Heading', 'eventmana' ),
        'object_types'  => array( 'page'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

        // Main Layout
        $cmb->add_field( array(
            'name'       => esc_html__( 'Show title of page', 'eventmana' ),
            'desc'       => esc_html__( 'Allow display title of page', 'eventmana' ),
            'id'         => $prefix . 'page_heading',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => array(
                'show' => esc_html__( 'Show', 'eventmana' ),
                'hide'   => esc_html__('Hide', 'eventmana' )
            ),
            
        ) );

    /**
     * POST SETTINGS
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'post_video',
        'title'         => esc_html__( 'Post Settings', 'eventmana' ),
        'object_types'  => array( 'post'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

        // Main Layout
        $cmb->add_field( array(
            'name'       => esc_html__( 'Link audio or video', 'eventmana' ),
            'desc'       => esc_html__( 'Insert link audio or video use for video/audio post-format', 'eventmana' ),
            'id'         => $prefix . 'embed_media',
            'type'             => 'oembed',
        ) );

        

        $cmb->add_field( array(
            'name'       => esc_html__( 'Gallery image', 'eventmana' ),
            'desc'       => esc_html__( 'image in gallery of post format', 'eventmana' ),
            'id'         => $prefix . 'file_list',
            'type'             => 'file_list',
        ) );

        
        $cmb->add_field( array(
            'name'       => esc_html__( 'Display Comment', 'eventmana' ),
            'id'         => $prefix . 'show_comment',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => array(
                'yes' => esc_html__( 'Yes', 'eventmana' ),
                'no'   => esc_html__('No', 'eventmana' ),
            ),
            
        ) );


    /**
     * Initiate Layout Settings the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'slideshow_settings',
        'title'         => esc_html__( 'Slideshow Settings', 'eventmana' ),
        'object_types'  => array( 'slideshow'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );
        // Select type template
        $cmb->add_field( array(
            'name'       => esc_html__( 'slideshow_tem', 'eventmana' ),
            'desc'       => esc_html__( 'Select type template', 'eventmana' ),
            'id'         => $prefix . 'slideshow_tem',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => array(
                'countdown' => esc_html__( 'Template 1: Count down', 'eventmana' ),
                'find_event'   => esc_html__('Template 2: Find event', 'eventmana' ),
                'simple'   => esc_html__('Tempalte 3: Simple', 'eventmana' ),
            ),
            
        ) );


        $cmb = new_cmb2_box( array(
            'id'            => 'slideshow_settings_tem1',
            'title'         => esc_html__( 'Template 1 Settings', 'eventmana' ),
            'object_types'  => array( 'slideshow'), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            
        ) );    
                $cmb->add_field( array(
                    'name'       => esc_html__( 'Image', 'eventmana' ),
                    'id'         => $prefix . 'slideshow_tem1_image',
                    'type'             => 'file'
                ) );

                $cmb->add_field( array(
                    'name'       => esc_html__( 'Time', 'eventmana' ),
                    'desc'       => esc_html__( 'Insert time', 'eventmana' ),
                    'id'         => $prefix . 'slideshow_tem1_time',
                    'type'             => 'textarea_code'
                    
                ) );
                $cmb->add_field( array(
                    'name'       => esc_html__( 'Name', 'eventmana' ),
                    'desc'       => esc_html__( 'Insert Name', 'eventmana' ),
                    'id'         => $prefix . 'slideshow_tem1_name',
                    'type'             => 'textarea_code'
                    
                ) );
                $cmb->add_field( array(
                    'name'       => esc_html__( 'Countdown shortcode', 'eventmana' ),
                    'desc'       => esc_html__( '', 'eventmana' ),
                    'id'         => $prefix . 'slideshow_tem1_countdown_shortcode',
                    'type'             => 'textarea_code'
                    
                ) );
                $cmb->add_field( array(
                    'name'       => esc_html__( 'Buttons', 'eventmana' ),
                    'desc'       => esc_html__( 'Insert code Button', 'eventmana' ),
                    'id'         => $prefix . 'slideshow_tem1_button',
                    'type'             => 'textarea_code'
                    
                ) );
                

        $cmb = new_cmb2_box( array(
            'id'            => 'slideshow_settings_tem2',
            'title'         => esc_html__( 'Template 2 Settings', 'eventmana' ),
            'object_types'  => array( 'slideshow'), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            
        ) );     

            $cmb->add_field( array(
                'name'       => esc_html__( 'Name', 'eventmana' ),
                'desc'       => esc_html__( 'Insert Name', 'eventmana' ),
                'id'         => $prefix . 'slideshow_tem2_name',
                'type'             => 'textarea_code'
                
            ) );

            $cmb->add_field( array(
                'name'       => esc_html__( 'Time', 'eventmana' ),
                'desc'       => esc_html__( 'Insert time', 'eventmana' ),
                'id'         => $prefix . 'slideshow_tem2_time',
                'type'             => 'textarea_code'
                
            ) );
            
            $cmb->add_field( array(
                'name'       => esc_html__( 'Search form shortcode', 'eventmana' ),
                'desc'       => esc_html__( 'Insert time', 'eventmana' ),
                'id'         => $prefix . 'slideshow_tem2_searchform',
                'type'             => 'textarea_code'
                
            ) );
            
            $cmb->add_field( array(
                'name'       => esc_html__( 'Buttons', 'eventmana' ),
                'desc'       => esc_html__( 'Insert  Button', 'eventmana' ),
                'id'         => $prefix . 'slideshow_tem2_button',
                'type'             => 'textarea_code'
                
            ) );



        $cmb = new_cmb2_box( array(
            'id'            => 'slideshow_settings_tem3',
            'title'         => esc_html__( 'Template 3 Settings', 'eventmana' ),
            'object_types'  => array( 'slideshow'), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            
        ) );     

            $cmb->add_field( array(
                'name'       => esc_html__( 'Image', 'eventmana' ),
                'id'         => $prefix . 'slideshow_tem3_image',
                'type'             => 'file'
            ) );



            $cmb->add_field( array(
                'name'       => esc_html__( 'Name', 'eventmana' ),
                'desc'       => esc_html__( 'Insert time', 'eventmana' ),
                'id'         => $prefix . 'slideshow_tem3_name',
                'type'             => 'text'
                
            ) );

            $cmb->add_field( array(
                'name'       => esc_html__( 'Time', 'eventmana' ),
                'desc'       => esc_html__( 'Insert time', 'eventmana' ),
                'id'         => $prefix . 'slideshow_tem3_time',
                'type'             => 'text'
                
            ) );
            
            $cmb->add_field( array(
                'name'       => esc_html__( 'Buttons', 'eventmana' ),
                'desc'       => esc_html__( 'Insert  Button', 'eventmana' ),
                'id'         => $prefix . 'slideshow_tem3_button',
                'type'             => 'textarea_code'
                
            ) );    


    /**
     * Event Settings
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'event_settings',
        'title'         => esc_html__( 'Event Settings for filter event, event-list page, event-grid page', 'eventmana' ),
        'object_types'  => array( 'event'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

        $cmb->add_field( array(
            'name'       => esc_html__( 'Thumbnail horizontal', 'eventmana' ),
            'id'         => $prefix . 'event_thumbnail_horizontal',
            'type'             => 'file',
            
        ) );

       
        $cmb->add_field( array(
            'name'       => esc_html__( 'Text to describe for time of event', 'eventmana' ),
            'id'         => $prefix . 'event_time',
            'type'             => 'text',
            
        ) );

        $cmb->add_field( array(
            'name'       => esc_html__( 'Event start date.', 'eventmana' ),
            'id'         => $prefix.'event_date',
            'type'             => 'text_datetime_timestamp',
            // 'date_format'   => 'Y-m-d'
        ) );

        $cmb->add_field( array(
            'name'       => esc_html__( 'Event end date.', 'eventmana' ),
            'id'         => $prefix.'event_end_date',
            'type'             => 'text_datetime_timestamp',
            // 'date_format'   => 'Y-m-d'
        ) );


        $cmb->add_field( array(
            'name'       => esc_html__( 'Text to describe for price of event', 'eventmana' ),
            'id'         => $prefix . 'event_price',
            'type'             => 'text',
            
        ));

        $cmb->add_field( array(
            'name'       => esc_html__( 'Time Icon', 'eventmana' ),
            'id'         => $prefix . 'event_time_icon',
            'type'             => 'text',
            "description" => esc_html__('Insert font-awesome: http://fontawesome.io/cheatsheet/', 'eventmana'),
            'default'   => 'fa-file-text-o'
            
        ));

        $cmb->add_field( array(
            'name'       => esc_html__( 'Ticket & Detail event Text', 'eventmana' ),
            'id'         => $prefix . 'event_ticket_detail',
            'type'             => 'text',
            'default'   => 'Ticket & Detail'
            
        ));


        $cmb->add_field( array(
            'name'       => esc_html__( 'Intro', 'eventmana' ),
            'id'         => $prefix . 'event_intro',
            'type'             => 'textarea_code',
            
        ));


        $cmb = new_cmb2_box( array(
            'id'            => 'event_settings_map',
            'title'         => esc_html__( 'Event Settings for map widget', 'eventmana' ),
            'object_types'  => array( 'event'), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            
        ) );

            $cmb->add_field( array(
                'name'       => esc_html__( 'Insert text Go to location', 'eventmana' ),
                'id'         => $prefix . 'event_gotolocation',
                'type'             => 'text',
                
            ));

            $cmb->add_field( array(
                'name'       => esc_html__( 'Link for Go to location', 'eventmana' ),
                'id'         => $prefix . 'event_link_gotolocation',
                'type'             => 'text',
                
            ));

            $cmb->add_field( array(
                'name'       => esc_html__( 'Location', 'eventmana' ),
                'id'         => $prefix . 'event_location',
                'type'             => 'textarea_code',
                
            ));
            $cmb->add_field( array(
                'name'       => esc_html__( 'Location latitude', 'eventmana' ),
                'id'         => $prefix . 'event_latitude',
                'description' => esc_html__('Open https://www.google.com/maps => Enter localtion => You will find latitude and longitude like @13.7278129,100.5330761', 'eventmana'),
                'type'             => 'text',
                
            ));
            $cmb->add_field( array(
                'name'       => esc_html__( 'Location longitude', 'eventmana' ),
                'id'         => $prefix . 'event_longitude',
                'description' => esc_html__('Open https://www.google.com/maps => Enter localtion => You will find latitude and longitude like @13.7278129,100.5330761', 'eventmana'),
                'type'             => 'text',
                
            ));

        
        $cmb = new_cmb2_box( array(
            'id'            => 'event_settings_where',
            'title'         => esc_html__( 'Event Settings for When & Where widget', 'eventmana' ),
            'object_types'  => array( 'event'), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            
        ) );

            $cmb->add_field( array(
                'name'       => esc_html__( 'Title for widget', 'eventmana' ),
                'id'         => $prefix . 'event_title_when',
                'type'             => 'text',
            ));

            $cmb->add_field( array(
                'name'       => esc_html__( 'When & Where', 'eventmana' ),
                'id'         => $prefix . 'event_when_where',
                'type'             => 'textarea_code',
            ));



        $cmb = new_cmb2_box( array(
            'id'            => 'event_settings_organizer',
            'title'         => esc_html__( 'Event Settings for Organizer widget', 'eventmana' ),
            'object_types'  => array( 'event'), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            
        ) );    
            $cmb->add_field( array(
                'name'       => esc_html__( 'Title for widget', 'eventmana' ),
                'id'         => $prefix . 'event_title_organizer',
                'type'             => 'text',
            ));

            $cmb->add_field( array(
                'name'       => esc_html__( 'Organizer', 'eventmana' ),
                'id'         => $prefix . 'event_organizer',
                'type'             => 'textarea_code',
            ));
    
    

        /* Schedule */
        $cmb = new_cmb2_box( array(
            'id'            => 'schedule_fields',
            'title'         => esc_html__( 'Schedule Field', 'eventmana' ),
            'object_types'  => array( 'schedule'), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            
        ) );

                $cmb->add_field(array(
                    'name' => esc_html__('Time Text', 'eventmana'),
                    'desc' => esc_html__('You can insert time here: 08:00 - 08:45', 'eventmana'),
                    'id'   => $prefix . 'schedule_timetext',
                    'type' => 'text',
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Author', 'eventmana'),
                    'desc' => esc_html__('Author will speak: John Doe', 'eventmana'),
                    'id'   => $prefix . 'schedule_author',
                    'type' => 'text',
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Author Job', 'eventmana'),
                    'desc' => esc_html__('Job of author: CEO at Crown.io', 'eventmana'),
                    'id'   => $prefix . 'schedule_author_job',
                    'type' => 'text',
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Link thumbnail of speaker', 'eventmana'),
                    'desc' => esc_html__('Insert link for speaker', 'eventmana'),
                    'id'   => $prefix . 'schedule_link_speaker',
                    'type' => 'text',
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Info of speakers', 'eventmana'),
                    'desc' => esc_html__('Insert info of speakers', 'eventmana'),
                    'id'   => $prefix . 'schedule_speaker',
                    'type' => 'text',
                ));

                $cmb->add_field(array(
                    'name' => esc_html__('Mail Adress', 'eventmana'),
                    'desc' => esc_html__('Mail Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_mail_address',
                    'type' => 'text',               
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Facebook Adress', 'eventmana'),
                    'desc' => esc_html__('Facebook Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_facebook_address',
                    'type' => 'text',               
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Twitter Adress', 'eventmana'),
                    'desc' => esc_html__('Twitter Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_twitter_address',
                    'type' => 'text',               
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Linkedin Adress', 'eventmana'),
                    'desc' => esc_html__('Linkedin Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_linkedin_address',
                    'type' => 'text',               
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Pinterest Adress', 'eventmana'),
                    'desc' => esc_html__('Pinterest Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_pinterest_address',
                    'type' => 'text'                
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Google Plus Adress', 'eventmana'),
                    'desc' => esc_html__('Google Plus Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_googleplus_address',
                    'type' => 'text'                
                ));          
                $cmb->add_field(array(
                    'name' => esc_html__('Tumblr Adress', 'eventmana'),
                    'desc' => esc_html__('Tumblr Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_tumblr_address',
                    'type' => 'text'                
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Instagram Adress', 'eventmana'),
                    'desc' => esc_html__('Instagram Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_instagram_address',
                    'type' => 'text'                
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('VK Adress', 'eventmana'),
                    'desc' => esc_html__('VK Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_vk_address',
                    'type' => 'text'                
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Flickr Adress', 'eventmana'),
                    'desc' => esc_html__('Flickr Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_flickr_address',
                    'type' => 'text'                
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('MySpace Adress', 'eventmana'),
                    'desc' => esc_html__('MySpace Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_mySpace_address',
                    'type' => 'text'                
                ));
                $cmb->add_field(array(
                    'name' => esc_html__('Youtube Adress', 'eventmana'),
                    'desc' => esc_html__('Youtube Adress', 'eventmana'),
                    'id'   => $prefix . 'schedule_youtube_address',
                    'type' => 'text'                
                ));
              
    


    $cmb = new_cmb2_box( array(
        'id'            => 'event_category_settings',
        'title'         => esc_html__( 'Event Category Settings', 'eventmana' ),
        'object_types'  => array( 'page'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

        $cmb->add_field( array(
            'name'       => esc_html__( 'Insert Slug of event category', 'eventmana' ),
            'id'         => $prefix . 'event_category',
            "description"   => esc_html__('Events >> Group >> choose slug of category', 'eventmana'),
            'type'             => 'text',
            
        ) );

    

    /**
     * Layout Settings
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'layout_settings',
        'title'         => esc_html__( 'General Settings', 'eventmana' ),
        'object_types'  => array( 'page', 'post', 'event'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

        $cmb->add_field( array(
            'name'       => esc_html__( 'Display breadcrumbs', 'eventmana' ),
            'id'         => $prefix . 'dis_breadcrumbs',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => array(
                'yes' => esc_html__( 'Yes', 'eventmana' ),
                'no'   => esc_html__('No', 'eventmana' )
            ),
            'default'   => 'yes'
            
        ) );

        $cmb->add_field( array(
            'name'       => esc_html__( 'background for breadcrumbs', 'eventmana' ),
            'id'         => $prefix.'background_breadcums',
            'type'             => 'file',

        ) );


        $cmb->add_field( array(
            'name'       => esc_html__( 'Select Footer', 'eventmana' ),
            'id'         => $prefix . 'style_footer',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => array(
                'tem1' => esc_html__( 'Social Footer', 'eventmana' ),
                'tem2'   => esc_html__('Menu Footer', 'eventmana' )
            ),
            'default'   => 'tem2'
            
        ) );

        $cmb->add_field( array(
            'name'       => esc_html__( 'Main Layout', 'eventmana' ),
            'desc'       => esc_html__( 'This value will override value in theme customizer', 'eventmana' ),
            'id'         => $prefix . 'main_layout',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => array(
                'right_sidebar' => esc_html__( 'Right Sidebar', 'eventmana' ),
                'left_sidebar'   => esc_html__('Left Sidebar', 'eventmana' ),
                'fullwidth'   => esc_html__('No Sidebar', 'eventmana' ),
            ),
            
        ) );


        $cmb->add_field( array(
            'name'       => esc_html__( 'Width of site', 'eventmana' ),
            'desc'       => esc_html__( 'This value will override value in theme customizer', 'eventmana' ),
            'id'         => $prefix . 'version_layout',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => array(
                'global'    => esc_html__('Global in customizer', 'eventmana'),
                'wide' => esc_html__( 'Wide', 'eventmana' ),
                'boxed'   => esc_html__('Boxed', 'eventmana' ),
            ),
            
        ) );

        // Seo keywords
        $cmb->add_field( array(
            'name'       => esc_html__( 'SEO Keywords', 'eventmana' ),
            'desc'       => esc_html__( 'SEO keywords (optional). This value will override value in global seo keyword of theme customizer.', 'eventmana' ),
            'id'         => $prefix . 'seo_key',
            'type'       => 'text',
            
        ) );

        // Seo description
        $cmb->add_field( array(
            'name'       => esc_html__( 'SEO Description', 'eventmana' ),
            'desc'       => esc_html__( 'SEO description (optional). This value will override value in global seo description of theme customizer.', 'eventmana' ),
            'id'         => $prefix . 'seo_desc',
            'type'       => 'textarea',
        ) );






    
    

    

}

