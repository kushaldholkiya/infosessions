<?php
/**
 
* Plugin Name: eventmana
 
* Plugin URI: ovatheme.com
 
* Description: A plugin to create custom post type, metabox,  shortcode...
 
* Version:  1.1
 
* Author: Ovatheme
 
* Author URI: ovatheme.com
 
* License:  GPL2
 
*/

if(defined('TEXT_DOMAIN') == false) define('TEXT_DOMAIN', 'eventmana');


include dirname( __FILE__ ) . '/custom-post-type/post-type.php';

include dirname( __FILE__ ) . '/shortcode/shortcode.php';
include dirname( __FILE__ ) . '/shortcode/vc-shortcode.php';



return true;