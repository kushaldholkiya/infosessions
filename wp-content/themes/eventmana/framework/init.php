<?php
	if(defined('OVA_THEME_URL') 	== false) 	define('OVA_THEME_URL', get_template_directory());
	if(defined('OVA_THEME_URI') 	== false) 	define('OVA_THEME_URI', get_template_directory_uri());

	// Load the theme of translated strings
	load_theme_textdomain('eventmana', OVA_THEME_URL . '/languages');

	require_once (OVA_THEME_URL.'/framework/framework.php');
	require_once (OVA_THEME_URL.'/extend/add_js_css.php');
	require_once (OVA_THEME_URL.'/extend/metabox.php');
	require_once (OVA_THEME_URL.'/content/define_blocks_content.php');
	require_once (OVA_THEME_URL).'/extend/register_menu.php';
	require_once (OVA_THEME_URL).'/extend/register_widget.php';
	require_once (OVA_THEME_URL).'/extend/breadcrumbs.php';
	// require_once (OVA_THEME_URL).'/extend/ajax_load_attribute.php';
	require_once (OVA_THEME_URL) . '/extend/plugins/active_plugin.php';


	function eventmana_get_current_id(){
		global $post;
	    $current_page_id = '';
	    // Get The Page ID You Need
	    //wp_reset_postdata();
	    if(class_exists("woocommerce")) {
	        if( is_shop() ){ ///|| is_product_category() || is_product_tag()) {
	            $current_page_id  =  get_option ( 'woocommerce_shop_page_id' );
	        }elseif(is_cart()) {
	            $current_page_id  =  get_option ( 'woocommerce_cart_page_id' );
	        }elseif(is_checkout()){
	            $current_page_id  =  get_option ( 'woocommerce_checkout_page_id' );
	        }elseif(is_account_page()){
	            $current_page_id  =  get_option ( 'woocommerce_myaccount_page_id' );
	        }elseif(is_view_order_page()){
	            $current_page_id  = get_option ( 'woocommerce_view_order_page_id' );
	        }
	    }
	    if($current_page_id=='') {
	        if ( is_home () && is_front_page () ) {
	            $current_page_id = '';
	        } elseif ( is_home () ) {
	            $current_page_id = get_option ( 'page_for_posts' );
	        } elseif ( is_search () || is_category () || is_tag () || is_tax () || is_archive() ) {
	            $current_page_id = '';
	        } elseif ( !is_404 () ) {
	           $current_page_id = $post->ID;
	        } 
	    }

	    return $current_page_id;
	}



	

	// Create instance for ovatheme class
	$eventmana_ovatheme = new eventmana_ovatheme();
	$eventmana_customizer = new eventmana_customizer();