<?php

function load_attribute() {

	$product_id     = $_POST['data'];
	
	$option_str = '<option value="empty">Choose attribute</option>';

	$attributes = get_post_meta( $product_id , '_product_attributes' );

	$array_keys = array_keys($attributes[0]);

	foreach($array_keys as $key => $value){
		$option_str .= '<option class="'.$value.'" value="'.$value.'">'.$value.'</option>';
	}

	echo $option_str;
	return true;
 
}
if ( is_admin() ) {
	add_action( 'wp_ajax_load_attribute', 'load_attribute' );
	add_action( 'wp_ajax_nopriv_load_attribute', 'load_attribute' );
}
