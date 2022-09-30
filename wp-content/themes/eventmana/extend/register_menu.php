<?php	
function eventmana_register_menus() {
  register_nav_menus( array(
    'primary'   => esc_html__( 'Primary Menu', 'eventmana' ),
    'footer'   => esc_html__( 'Footer Menu', 'eventmana' )

  ) );
}
add_action( 'init', 'eventmana_register_menus' );



add_filter( 'wp_nav_menu_items', 'eventmana_add_custom_li', 10, 2 );
function eventmana_add_custom_li ( $items, $args ) {
    if ($args->theme_location == 'primary') {
        $s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';

        if(get_theme_mod('cus_header_search','yes') == 'yes' || get_theme_mod('cus_header_search','yes') == ''){
          $items .= '<li class="header-search-wrapper">
  	                    <form method="get" class="header-search-form" id="searchform" action="'.home_url('/').'">
  	                        <input type="text" value="'.esc_html($s,1).'" name="s" id="s" maxlength="33" placeholder="'.esc_html__('Search', 'eventmana').'" class="form-control header-search"/>
  	                        <input type="submit" hidden="hidden"/>
  	                    </form>
  	                </li>
  	                <li><a href="#" class="btn-search-toggle"><i class="fa fa-search"></i></a></li>';
        }

        if(get_theme_mod('cus_header_submitevent','#') != ''){
          $items .= '<li><a target="'.get_theme_mod('cus_header_submitevent_target','_blank').'" href="'.get_theme_mod('cus_header_submitevent','#').'" class="btn btn-theme btn-submit-event"> '.get_theme_mod('cus_header_submitevent_text','SUBMIT EVENT').' <i class="fa fa-plus-circle"></i></a></li>';
        }
    }
    return $items;
}
