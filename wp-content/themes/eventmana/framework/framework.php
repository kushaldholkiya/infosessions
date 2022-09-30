<?php 
	require_once (OVA_THEME_URL.'/framework/customizer/customizer.php');
	/**
	* Define eventmana class for theme
	*/
	class eventmana_ovatheme{

		/*
		* Construct class
		*/
		public function __construct(){
			add_action('after_setup_theme', array($this, 'eventmana_theme_support'), 10);
			add_filter( 'oembed_result', array($this, 'eventmana_framework_fix_oembeb'), 10 );
			add_filter('paginate_links', array($this, 'eventmana_fix_pagination_error'),10);
			add_action('init', array($this, 'eventmana_vc_add_param'));
		}

		
		/* Add theme support */
		public function eventmana_theme_support(){

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		        wp_enqueue_script( 'comment-reply' );

		    if ( ! isset( $content_width ) ) $content_width = 900;

		    add_theme_support('title-tag');

		    // Adds RSS feed links to <head> for posts and comments.
		    add_theme_support( 'automatic-feed-links' );

		    // Switches default core markup for search form, comment form, and comments    
		    // to output valid HTML5.
		    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

		    /*
		     * This theme supports all available post formats by default.
		     * See http://codex.wordpress.org/Post_Formats
		     */
		     add_theme_support( 'post-formats', array( 'image', 'gallery', 'audio', 'video') );
		    

		    add_theme_support( 'post-thumbnails' );

		    add_theme_support( 'custom-header' );
		    add_theme_support( 'custom-background');
		    add_theme_support( 'woocommerce');
		    
		}

		public function eventmana_framework_fix_oembeb( $url ){
		    $array = array (
		        'webkitallowfullscreen'     => '',
		        'mozallowfullscreen'        => '',
		        'frameborder="0"'           => '',
		        '</iframe>)'        => '</iframe>'
		    );
		    $url = strtr( $url, $array );

		    if ( strpos( $url, "<embed src=" ) !== false ){
		        return str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $url);
		    }
		    elseif ( strpos ( $url, 'feature=oembed' ) !== false ){
		        return str_replace( 'feature=oembed', 'feature=oembed&amp;wmode=opaque', $url );
		    }
		    else{
		        return $url;
		    }
		}

		// Fix pagination
		public function eventmana_fix_pagination_error($link) {
			return str_replace('#038;', '&', $link);
		}


		public static function eventmana_pagination_theme() {
		   
		    if( is_singular() )
		        return;
		 
		    global $wp_query;
		 
		    /** Stop execution if there's only 1 page */
		    if( $wp_query->max_num_pages <= 1 )
		        return;
		 
		    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		    $max   = intval( $wp_query->max_num_pages );
		 
		    /** Add current page to the array */
		    if ( $paged >= 1 )
		        $links[] = $paged;
		 
		    /** Add the pages around the current page to the array */
		    if ( $paged >= 3 ) {
		        $links[] = $paged - 1;
		        $links[] = $paged - 2;
		    }
		 
		    if ( ( $paged + 2 ) <= $max ) {
		        $links[] = $paged + 2;
		        $links[] = $paged + 1;
		    }
		 
		    echo '<div class="blog_pagination"><ul class="pagination">' . "\n";
		 
		    /** Previous Post Link */
		    if ( get_previous_posts_link() )
		        printf( '<li class="prev page-numbers">%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-chevron-left"></i>') );
		 
		    /** Link to first page, plus ellipses if necessary */
		    if ( ! in_array( 1, $links ) ) {
		        $class = 1 == $paged ? ' class="active"' : '';
		 
		        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
		 
		        if ( ! in_array( 2, $links ) )
		            echo '<li>...</li>';
		    }
		 
		    /** Link to current page, plus 2 pages in either direction if necessary */
		    sort( $links );
		    foreach ( (array) $links as $link ) {
		        $class = $paged == $link ? ' class="active"' : '';
		        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		    }
		 
		    /** Link to last page, plus ellipses if necessary */
		    if ( ! in_array( $max, $links ) ) {
		        if ( ! in_array( $max - 1, $links ) )
		            echo '<li>...</li>' . "\n";
		 
		        $class = $paged == $max ? ' class="active"' : '';
		        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		    }
		 
		    /** Next Post Link */
		    if ( get_next_posts_link() )
		        printf( '<li class="next page-numbers">%s</li>' . "\n", get_next_posts_link('<i class="fa fa-chevron-right"></i>') );
		 
		    echo '</ul></div>' . "\n";
		 
		}


		

		/* Visual Composer */

		public function eventmana_vc_add_param(){
			/* Visual Composer */
			if(function_exists('vc_add_param')){

			  $attributes = array(
			    
			    array("type" => "dropdown",
			        "heading" => esc_html__('User Container to wrap content', 'eventmana'),
			        "param_name" => "ova_container",
			        "value" => array(
			                esc_html__('Yes', 'eventmana') => '1',      
			                esc_html__('No', 'eventmana') => '0',                                              
			        )
			    ),
			    array("type" => "colorpicker",
			        "heading" => esc_html__('Background pattern color ', 'eventmana'),
			        "param_name" => 'ova_bg_pattern',
			        "default"	=> ''
			    ),
			    array("type" => "colorpicker",
			        "heading" => esc_html__('Text Color of Row', 'eventmana'),
			        "param_name" => 'ova_textcolor',
			        "default"	=> '#333'
			    ),

			  );

			  

			  vc_add_params( 'vc_row', $attributes );
			  
			}
		}



	} // end class
	

