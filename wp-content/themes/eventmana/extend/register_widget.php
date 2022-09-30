<?php
// Create sidebar
function eventmana_second_widgets_init() {
  
  $args_blog = array(
    'name' => sprintf( __( 'Main Sidebar', 'eventmana') ),
    'id' => "main-sidebar",
    'description' => esc_html__( 'Main Sidebar', 'eventmana' ),
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title"><span class="line"></span>',
    'after_title' => "</h4>",
  );
  register_sidebar( $args_blog );

  $footer1 = array(
    'name' => sprintf( __( 'Footer 1', 'eventmana') ),
    'id' => "footer1",
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title"><span class="line"></span>',
    'after_title' => "</h4>",
  );
  register_sidebar( $footer1 );

  $footer2 = array(
    'name' => sprintf( __( 'Footer 2', 'eventmana') ),
    'id' => "footer2",
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title"><span class="line"></span>',
    'after_title' => "</h4>",
  );
  register_sidebar( $footer2 );

  $footer3 = array(
    'name' => sprintf( __( 'Footer 3', 'eventmana') ),
    'id' => "footer3",
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title"><span class="line"></span>',
    'after_title' => "</h4>",
  );
  register_sidebar( $footer3 );

  $footer4 = array(
    'name' => sprintf( __( 'Footer 4', 'eventmana') ),
    'id' => "footer4",
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title"><span class="line"></span>',
    'after_title' => "</h4>",
  );
  register_sidebar( $footer4 );

  $footer4 = array(
    'name' => sprintf( __( 'Search Sidebar Page', 'eventmana') ),
    'id' => "event_list",
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title"><span class="line"></span>',
    'after_title' => "</h4>",
  );
  register_sidebar( $footer4 );


  

  $search_header_top = array(
    'name' => sprintf( __( 'Header top', 'eventmana') ),
    'id' => "search_header_top",
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title"><span class="line"></span>',
    'after_title' => "</h4>",
  );
  register_sidebar( $search_header_top );

}
add_action( 'widgets_init', 'eventmana_second_widgets_init' );




// Creating the widget 
class eventmana_mapevent_widget extends WP_Widget {

function __construct() {
  parent::__construct(
  // Base ID of your widget
  'eventmana_mapevent_widget', 


  // Widget name will appear in UI
  esc_html__('Map Event', 'eventmana'), 

  // Widget description
  array( 'description' => esc_html__( 'You can insert multi location', 'eventmana' ), ) 
  );
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
  $lat1 = apply_filters( 'widget_lat1', $instance['lat1'] );
  $lat1_title = apply_filters( 'widget_lat1_title', $instance['lat1_title'] );

  $lat2 = apply_filters( 'widget_lat2', $instance['lat2'] );
  $lat2_title = apply_filters( 'widget_lat2_title', $instance['lat2_title'] );

  $lat3 = apply_filters( 'widget_lat3', $instance['lat3'] );
  $lat3_title = apply_filters( 'widget_lat3_title', $instance['lat3_title'] );

  $lat4 = apply_filters( 'widget_lat4', $instance['lat4'] );
  $lat4_title = apply_filters( 'widget_lat4_title', $instance['lat4_title'] );

  $lat5 = apply_filters( 'widget_lat5', $instance['lat5'] );
  $lat5_title = apply_filters( 'widget_lat5_title', $instance['lat5_title'] );
  
  $lat6 = apply_filters( 'widget_lat6', $instance['lat6'] );
  $lat6_title = apply_filters( 'widget_lat6_title', $instance['lat6_title'] );

  $lat7 = apply_filters( 'widget_lat7', $instance['lat7'] );
  $lat7_title = apply_filters( 'widget_lat7_title', $instance['lat7_title'] );

  $lat8 = apply_filters( 'widget_lat8', $instance['lat8'] );
  $lat8_title = apply_filters( 'widget_lat8_title', $instance['lat8_title'] );

  $location = apply_filters( 'widget_location', $instance['location'] )?apply_filters( 'widget_location', $instance['location'] ):'';

  $class = apply_filters( 'widget_class', $instance['class'] );


  // before and after widget arguments are defined by themes
  echo ''.$args['before_widget'];



  $id = rand();
  $html = '';
  $html .= '<div class="widget google-map-widget '.$class.'">
                <div class="google-map1">
                    <div id="map-canvas1" 
                      data-lat1="'.trim($lat1).'" data-lat1_title="'.$lat1_title.'" 
                      data-lat2="'.trim($lat2).'" data-lat2_title="'.$lat2_title.'"
                      data-lat3="'.trim($lat3).'" data-lat3_title="'.$lat3_title.'"
                      data-lat4="'.trim($lat4).'" data-lat4_title="'.$lat4_title.'"
                      data-lat5="'.trim($lat5).'" data-lat5_title="'.$lat5_title.'"
                      data-lat6="'.trim($lat6).'" data-lat6_title="'.$lat6_title.'"
                      data-lat7="'.trim($lat7).'" data-lat7_title="'.$lat7_title.'"
                      data-lat8="'.trim($lat8).'" data-lat8_title="'.$lat8_title.'"
                      data-img="'.OVA_THEME_URI.'/assets/img/icon-google-map.png"
                    ></div>
                </div>
                <a href="#" class="link"><i class="fa fa-map-marker"></i>'.$location.'</a>
            </div>';
 

  // This is where you run the code and display the output
  echo ($html);

  echo ($args['after_widget']);
}
    
// Widget Backend 
public function form( $instance ) {

  if ( isset( $instance[ 'lat1' ] ) ) {
    $lat1 = $instance[ 'lat1' ];
  }else{
    $lat1 = '';
  }
  if ( isset( $instance[ 'lat1_title' ] ) ) {
    $lat1_title = $instance[ 'lat1_title' ];
  }else{
    $lat1_title = '';
  }
  

  if ( isset( $instance[ 'lat2' ] ) ) {
    $lat2 = $instance[ 'lat2' ];
  }else{
    $lat2 = '';
  }
  if ( isset( $instance[ 'lat2_title' ] ) ) {
    $lat2_title = $instance[ 'lat2_title' ];
  }else{
    $lat2_title = '';
  }
  

  if ( isset( $instance[ 'lat3' ] ) ) {
    $lat3 = $instance[ 'lat3' ];
  }else{
    $lat3 = '';
  }
  if ( isset( $instance[ 'lat3_title' ] ) ) {
    $lat3_title = $instance[ 'lat3_title' ];
  }else{
    $lat3_title = '';
  }

  if ( isset( $instance[ 'lat4' ] ) ) {
    $lat4 = $instance[ 'lat4' ];
  }else{
    $lat4 = '';
  }
  if ( isset( $instance[ 'lat4_title' ] ) ) {
    $lat4_title = $instance[ 'lat4_title' ];
  }else{
    $lat4_title = '';
  }
  

  if ( isset( $instance[ 'lat5' ] ) ) {
    $lat5 = $instance[ 'lat5' ];
  }else{
    $lat5 = '';
  }
  if ( isset( $instance[ 'lat5_title' ] ) ) {
    $lat5_title = $instance[ 'lat5_title' ];
  }else{
    $lat5_title = '';
  }

  if ( isset( $instance[ 'lat6' ] ) ) {
    $lat6 = $instance[ 'lat6' ];
  }else{
    $lat6 = '';
  }
  if ( isset( $instance[ 'lat6_title' ] ) ) {
    $lat6_title = $instance[ 'lat6_title' ];
  }else{
    $lat6_title = '';
  }

  if ( isset( $instance[ 'lat7' ] ) ) {
    $lat7 = $instance[ 'lat7' ];
  }else{
    $lat7 = '';
  }
  if ( isset( $instance[ 'lat7_title' ] ) ) {
    $lat7_title = $instance[ 'lat7_title' ];
  }else{
    $lat7_title = '';
  }


  if ( isset( $instance[ 'lat8' ] ) ) {
    $lat8 = $instance[ 'lat8' ];
  }else{
    $lat8 = '';
  }
  if ( isset( $instance[ 'lat8_title' ] ) ) {
    $lat8_title = $instance[ 'lat8_title' ];
  }else{
    $lat8_title = '';
  }

  if ( isset( $instance[ 'location' ] ) ) {
    $location = $instance[ 'location' ];
  }else{
    $location = '';
  }

  if ( isset( $instance[ 'class' ] ) ) {
    $class = $instance[ 'class' ];
  }else{
    $class = '';
  }
  

  // Widget admin form
  ?>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat1' ) ); ?>"><?php esc_html_e( 'Location1: Latitude,Longitude - like: 41.040807, 28.848071', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat1' ) ); ?>" type="text" value="<?php echo esc_attr( $lat1 ); ?>" />
  </p>
   <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat1_title' ) ); ?>"><?php esc_html_e( 'Title for location 1', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat1_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat1_title' ) ); ?>" type="text" value="<?php echo esc_attr( $lat1_title ); ?>" />
  </p>


  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat2' ) ); ?>"><?php esc_html_e( 'Location2: Latitude,Longitude - like: 41.040807, 28.848071', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat2' ) ); ?>" type="text" value="<?php echo esc_attr( $lat2 ); ?>" />
  </p>
   <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat2_title' ) ); ?>"><?php esc_html_e( 'Title for location 2', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat2_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat2_title' ) ); ?>" type="text" value="<?php echo esc_attr( $lat2_title ); ?>" />
  </p>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat3' ) ); ?>"><?php esc_html_e( 'Location3: Latitude,Longitude - like: 41.040807, 28.848071', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat3' ) ); ?>" type="text" value="<?php echo esc_attr( $lat3 ); ?>" />
  </p>
   <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat3_title' ) ); ?>"><?php esc_html_e( 'Title for location 3', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat3_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat3_title' ) ); ?>" type="text" value="<?php echo esc_attr( $lat3_title ); ?>" />
  </p>


  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat4' ) ); ?>"><?php esc_html_e( 'Location 4: Latitude,Longitude - like: 41.040807, 28.848071', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat4' ) ); ?>" type="text" value="<?php echo esc_attr( $lat4 ); ?>" />
  </p>
   <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat4_title' ) ); ?>"><?php esc_html_e( 'Title for location 4', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat4_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat4_title' ) ); ?>" type="text" value="<?php echo esc_attr( $lat4_title ); ?>" />
  </p>
 
  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat5' ) ); ?>"><?php esc_html_e( 'Location 5: Latitude,Longitude - like: 41.040807, 28.848071', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat5' ) ); ?>" type="text" value="<?php echo esc_attr( $lat5 ); ?>" />
  </p>
   <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat5_title' ) ); ?>"><?php esc_html_e( 'Title for location 5', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat5_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat5_title' ) ); ?>" type="text" value="<?php echo esc_attr( $lat5_title ); ?>" />
  </p>


  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat6' ) ); ?>"><?php esc_html_e( 'Location 6: Latitude,Longitude - like: 41.040807, 28.848071', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat6' ) ); ?>" type="text" value="<?php echo esc_attr( $lat6 ); ?>" />
  </p>
   <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat6_title' ) ); ?>"><?php esc_html_e( 'Title for location 6', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat6_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat6_title' ) ); ?>" type="text" value="<?php echo esc_attr( $lat6_title ); ?>" />
  </p>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat7' ) ); ?>"><?php esc_html_e( 'Location 7: Latitude,Longitude - like: 41.040807, 28.848071', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat7' ) ); ?>" type="text" value="<?php echo esc_attr( $lat7 ); ?>" />
  </p>
   <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat7_title' ) ); ?>"><?php esc_html_e( 'Title for location 7', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat7_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat7_title' ) ); ?>" type="text" value="<?php echo esc_attr( $lat7_title ); ?>" />
  </p>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat8' ) ); ?>"><?php esc_html_e( 'Location 8: Latitude,Longitude - like: 41.040807, 28.848071', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat8' ) ); ?>" type="text" value="<?php echo esc_attr( $lat7 ); ?>" />
  </p>
   <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'lat8_title' ) ); ?>"><?php esc_html_e( 'Title for location 8', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat8_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat8_title' ) ); ?>" type="text" value="<?php echo esc_attr( $lat8_title ); ?>" />
  </p>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'location' ) ); ?>"><?php esc_html_e( 'location', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'location' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'location' ) ); ?>" type="text" value="<?php echo esc_attr( $location ); ?>" />
  </p>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>"><?php esc_html_e( 'class', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'class' ) ); ?>" type="text" value="<?php echo esc_attr( $class ); ?>" />
  </p>

  <?php 
}
  
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
  $instance = array();

  $instance['lat1'] = ( ! empty( $new_instance['lat1'] ) ) ? strip_tags( $new_instance['lat1'] ) : '';
  $instance['lat1_title'] = ( ! empty( $new_instance['lat1_title'] ) ) ? strip_tags( $new_instance['lat1_title'] ) : '';

  $instance['lat2'] = ( ! empty( $new_instance['lat2'] ) ) ? strip_tags( $new_instance['lat2'] ) : '';
  $instance['lat2_title'] = ( ! empty( $new_instance['lat2_title'] ) ) ? strip_tags( $new_instance['lat2_title'] ) : '';

  $instance['lat3'] = ( ! empty( $new_instance['lat3'] ) ) ? strip_tags( $new_instance['lat3'] ) : '';
  $instance['lat3_title'] = ( ! empty( $new_instance['lat3_title'] ) ) ? strip_tags( $new_instance['lat3_title'] ) : '';

  $instance['lat4'] = ( ! empty( $new_instance['lat4'] ) ) ? strip_tags( $new_instance['lat4'] ) : '';
  $instance['lat4_title'] = ( ! empty( $new_instance['lat4_title'] ) ) ? strip_tags( $new_instance['lat4_title'] ) : '';

  $instance['lat5'] = ( ! empty( $new_instance['lat5'] ) ) ? strip_tags( $new_instance['lat5'] ) : '';
  $instance['lat5_title'] = ( ! empty( $new_instance['lat5_title'] ) ) ? strip_tags( $new_instance['lat5_title'] ) : '';

  $instance['lat6'] = ( ! empty( $new_instance['lat6'] ) ) ? strip_tags( $new_instance['lat6'] ) : '';
  $instance['lat6_title'] = ( ! empty( $new_instance['lat6_title'] ) ) ? strip_tags( $new_instance['lat6_title'] ) : '';

  $instance['lat7'] = ( ! empty( $new_instance['lat7'] ) ) ? strip_tags( $new_instance['lat7'] ) : '';
  $instance['lat7_title'] = ( ! empty( $new_instance['lat7_title'] ) ) ? strip_tags( $new_instance['lat7_title'] ) : '';

  $instance['lat8'] = ( ! empty( $new_instance['lat8'] ) ) ? strip_tags( $new_instance['lat8'] ) : '';
  $instance['lat8_title'] = ( ! empty( $new_instance['lat8_title'] ) ) ? strip_tags( $new_instance['lat8_title'] ) : '';
  

  $instance['location'] = ( ! empty( $new_instance['location'] ) ) ? strip_tags( $new_instance['location'] ) : '';
  $instance['class'] = ( ! empty( $new_instance['class'] ) ) ? strip_tags( $new_instance['class'] ) : '';
  return $instance;
}
} // Class wpb_widget ends here


// Creating the widget 
class eventmana_search_event_widget extends WP_Widget {

function __construct() {
  parent::__construct(
  // Base ID of your widget
  'eventmana_search_event_widget', 


  // Widget name will appear in UI
  __('Search Event', 'eventmana'), 

  // Widget description
  array( 'description' => __( 'Search event', 'eventmana' ), ) 
  );
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

  $page_display = apply_filters( 'widget_page_display', $instance['page_display'] ) ? apply_filters( 'widget_page_display', $instance['page_display'] ):'';
  $keyword = apply_filters( 'widget_keyword', $instance['keyword'] ) ? apply_filters( 'widget_keyword', $instance['keyword'] ) : 'Keyword';
  $allcat = apply_filters( 'widget_allcat', $instance['allcat'] ) ? apply_filters( 'widget_allcat', $instance['allcat'] ) : 'All Categories';

  $id = rand();
  $html = '';

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

  $event_name = '';
  $event_cat = '';
  $event_time = '';
  
  $selected_time = '';

  if(isset($_REQUEST['event_name'])){
    $event_name = $_REQUEST['event_name'];
  }

  if(isset($_REQUEST['event_cat'])){
    $event_cat = $_REQUEST['event_cat'];
  }

  if(isset($_REQUEST['event_time'])){
    $event_time = $_REQUEST['event_time'];
  }

  if( strpos($page_display, '?') ){
      $post= 'post';
  }else{
      $post= 'get';
  }

  $html = '<div class="widget"><h4 class="widget-title">'.__('Search','eventmana').'</h4>';
  $html .= '<form method="'.$post.'" action="'.$page_display.'" name="comments-form" id="comments-form">


              <div class="form-group">
                  <input type="text" name="event_name" value="'.$event_name.'" placeholder="'.$keyword.'" class="form-control" style="line-height: 55px; height: 55px; margin-bottom: 25px; font-size: 18px; ">
              </div>


              <div class="form-group selectpicker-wrapper">                                       
                  <select name="event_cat" class="selectpicker" data-live-search="true" data-width="100%"
                      data-toggle="tooltip" title="'.$allcat.'">';
                      $html .= '<option value="">'.$allcat.'</option>';
                      foreach ($cat as $key => $value) {
                        $selected_cat = '';
                        if($event_cat == $value->slug){
                          $selected_cat = 'selected="selected"';
                        }
                        $html .= '<option '.$selected_cat.' value="'.$value->slug.'">'.$value->name.'</option>';
                      }

                  $html .= '</select>
              </div>
              


              <input type="hidden" name="search_event" value="search_event" />
              <div class="form-group"><input type="submit" class="btn btn-theme" id="submit" value="'.esc_html__('Search','eventmana').'"></div>

          </form></div>';
 

  // This is where you run the code and display the output
  echo ''.$html;
}


// Widget Backend 
public function form( $instance ) {

  if ( isset( $instance[ 'page_display' ] ) ) {
    $page_display = $instance[ 'page_display' ];
  }else{
    $page_display = '';
  }

  if ( isset( $instance[ 'keyword' ] ) ) {
    $keyword = $instance[ 'keyword' ];
  }else{
    $keyword = '';
  }

  if ( isset( $instance[ 'allcat' ] ) ) {
    $allcat = $instance[ 'allcat' ];
  }else{
    $allcat = '';
  }
  // Widget admin form
  ?>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'page_display' ) ); ?>"><?php esc_html_e( 'Insert page link that template is "Page Search Event" ', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'page_display' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page_display' ) ); ?>" type="text" value="<?php echo esc_attr( $page_display ); ?>" />
  </p>
  
  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'keyword' ) ); ?>"><?php esc_html_e( 'Placeholder of keyword', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'keyword' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'keyword' ) ); ?>" type="text" value="<?php echo esc_attr( $keyword ); ?>" />
  </p>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'allcat' ) ); ?>"><?php esc_html_e( 'All Cateogries text', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'allcat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'allcat' ) ); ?>" type="text" value="<?php echo esc_attr( $allcat ); ?>" />
  </p> 


  <?php 
}
  
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
  $instance = array();

  $instance['page_display'] = ( ! empty( $new_instance['page_display'] ) ) ? strip_tags( $new_instance['page_display'] ) : '';
  $instance['keyword'] = ( ! empty( $new_instance['keyword'] ) ) ? strip_tags( $new_instance['keyword'] ) : '';
  $instance['allcat'] = ( ! empty( $new_instance['allcat'] ) ) ? strip_tags( $new_instance['allcat'] ) : '';

  return $instance;
}

}







// Creating the widget 
class eventmana_search_cat_widget extends WP_Widget {

function __construct() {
  parent::__construct(
  // Base ID of your widget
  'eventmana_search_cat_widget', 


  // Widget name will appear in UI
  esc_html__('Search Category Footer', 'eventmana'), 

  // Widget description
  array( 'description' => esc_html__( 'Search Category Footer', 'eventmana' ), ) 
  );
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

  $page_display = apply_filters( 'widget_page_display', $instance['page_display'] )?apply_filters( 'widget_page_display', $instance['page_display'] ):'';
  $allcat = apply_filters( 'widget_allcat', $instance['allcat'] )?apply_filters( 'widget_allcat', $instance['allcat'] ):'';

  $id = rand();
  $html = '';

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

  $event_cat = '';
 
  if(isset($_REQUEST['event_cat'])){
    $event_cat = $_REQUEST['event_cat'];
  }

  if( strpos($page_display, '?') ){
      $post= 'post';
  }else{
      $post= 'get';
  }
  
  $html .= '<form method="'.$post.'" action="'.$page_display.'" name="comments-form" id="comments-form" class="country-select">
              <div class="form-group">                                       
                  <select name="footer_event_cat" class="selectpicker" title="'.$allcat.'" onchange="this.form.submit()">';
                      $html .= '<option value="">'.$allcat.'</option>';
                      foreach ($cat as $key => $value) {
                        $selected_cat = '';
                        if($event_cat == $value->slug){
                          $selected_cat = 'selected="selected"';
                        }
                        $html .= '<option '.$selected_cat.' value="'.$value->slug.'">'.$value->name.'</option>';
                      }

                  $html .= '</select>
              </div>
              <input type="hidden" name="search_cat" value="search_cat" />
          </form>';

  // This is where you run the code and display the output
  echo ''.$html;
}


// Widget Backend 
public function form( $instance ) {

  if ( isset( $instance[ 'page_display' ] ) ) {
    $page_display = $instance[ 'page_display' ];
  }else{
    $page_display = '';
  }
 

  if ( isset( $instance[ 'allcat' ] ) ) {
    $allcat = $instance[ 'allcat' ];
  }else{
    $allcat = '';
  }
  // Widget admin form
  ?>

  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'page_display' ) ); ?>"><?php esc_html_e( 'Insert url of page that use event list template', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'page_display' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page_display' ) ); ?>" type="text" value="<?php echo esc_attr( $page_display ); ?>" />
  </p>
  
  <p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'allcat' ) ); ?>"><?php esc_html_e( 'All Cateogries text', 'eventmana' ); ?></label> 
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'allcat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'allcat' ) ); ?>" type="text" value="<?php echo esc_attr( $allcat ); ?>" />
  </p>
   


  <?php 
}
  
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
  $instance = array();

  $instance['page_display'] = ( ! empty( $new_instance['page_display'] ) ) ? strip_tags( $new_instance['page_display'] ) : '';
  $instance['allcat'] = ( ! empty( $new_instance['allcat'] ) ) ? strip_tags( $new_instance['allcat'] ) : '';


  return $instance;
}

} // /Widget Class



// Register and load the widget
function eventmana_wpb_load_widget() {
  register_widget( 'eventmana_mapevent_widget' );
  register_widget('eventmana_search_event_widget');
  register_widget('eventmana_search_cat_widget');
}
add_action( 'widgets_init', 'eventmana_wpb_load_widget' );

