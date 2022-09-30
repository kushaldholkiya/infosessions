<?php
/** Template Name: Page Search event */

get_header();

// Get Main Layout From Theme Customizer
$main_layout = get_post_meta(get_the_id(), "eventmana_met_main_layout", true) ? get_post_meta(get_the_id(), "eventmana_met_main_layout", true) : 'right_sidebar';

$width_sidebar = "col-lg-3 col-md-4 col-sm-12";

if($main_layout == "fullwidth"){
    $width_main_content = "col-md-12";
}elseif($main_layout == "right_sidebar"){
    $width_main_content = "col-lg-9 col-md-8 col-sm-12 mobile_clear nopadding_mobile";
}if($main_layout == "left_sidebar"){
    $width_main_content = "col-lg-9 col-md-8 col-sm-12 mobile_clear nopadding_mobile";
}


function title_filter( $where, &$wp_query )
{
    global $wpdb;
    if ( $search_term = $wp_query->get( 'search_prod_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql(  $search_term  ) . '%\'';
    }
    return $where;
}


?>
<div class="page-section with-sidebar sidebar-right first-section">
    <div class="container">
        

                <!-- Display sidebar at left  -->
                <?php if($main_layout == "left_sidebar"){ ?>
                    <div id="sidebar" class="sidebar <?php echo esc_attr($width_sidebar); ?>">
                        <?php dynamic_sidebar('event_list'); ?>
                    </div>
                <?php } ?>

                <!-- Display content  -->
                <div class="<?php echo esc_attr($width_main_content); ?>">

                    <?php
                    $cus_search_page_result =  get_theme_mod('cus_search_page_result', 'yes');

                    /* Search sidebar */ 
                     if( isset($_REQUEST['search_event']) ){


                        $_SESSION['ss_event_name'] = $_REQUEST['event_name'];
                        $_SESSION['ss_event_cat'] = $_REQUEST['event_cat'];


                        $event_name = $_REQUEST['event_name'];
                        $event_cat = $_REQUEST['event_cat'];

                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                       
                        $arr_name = array();
                        $arr_cat = array();

                        $arr_base = array(
                            'paged' => $paged,
                            'post_type'  => 'event',
                            'post_status' => 'publish'
                        );

                        if($event_name){
                            $arr_name = array(
                                'search_prod_title' => $event_name
                            );
                        }

                        if($event_cat != ''){
                            $arr_cat = array('tax_query' => array(
                                        array(
                                            'taxonomy' => 'eventgroup',
                                            'field'    => 'slug',
                                            'terms' => $event_cat
                                        ),
                                    ));
                        }else{
                            $arr_cat = array('tax_query' => array(
                                        array(
                                            'taxonomy' => 'eventgroup',
                                            'field'    => 'slug',
                                            'terms' => $event_cat,
                                            'operator' => 'NOT IN',
                                        ),
                                    ));
                        }

                        $arr_result = array();

                      

                        if($cus_search_page_result == 'no'){
                            
                            $arr_result = array(
                                'meta_key' => 'eventmana_met_event_end_date',
                                'meta_query' => array(
                                    'key' => 'eventmana_met_event_end_date',
                                    'value' => current_time( 'timestamp' ),
                                    'compare' => '>=',
                                )
                            );

                        }

                         $arr_order = array( 
                                            'orderby'   => 'meta_value_num',
                                            'order'     => 'eventmana_met_event_date',
                                            'meta_key' => 'eventmana_met_event_date'
                                        );


                        $args = array_merge($arr_base, $arr_name, $arr_cat, $arr_result, $arr_order);
                        

                        add_filter( 'posts_where', 'title_filter', 10, 2 );
                        $events = new WP_Query($args);
                        remove_filter( 'posts_where', 'title_filter', 10, 2 );


                        


                    } else if ( isset($_SESSION['ss_event_name']) && isset($_SESSION['ss_event_cat']) ){
                        
                        $event_name = $_SESSION['ss_event_name'];
                        $event_cat = $_SESSION['ss_event_cat'];



                        $arr_name = array();
                        $arr_cat = array();

                        $arr_base = array(
                            'paged' => $paged,
                            'post_type'  => 'event',
                            'post_status' => 'publish',
                        );

                        if($event_name){
                            $arr_name = array(
                                'search_prod_title' => $event_name
                            );
                        }

                        if($event_cat != ''){
                            $arr_cat = array('tax_query' => array(
                                        array(
                                            'taxonomy' => 'eventgroup',
                                            'field'    => 'slug',
                                            'terms' => $event_cat
                                        ),
                                    ));
                        }else{
                            $arr_cat = array('tax_query' => array(
                                        array(
                                            'taxonomy' => 'eventgroup',
                                            'field'    => 'slug',
                                            'terms' => $event_cat,
                                            'operator' => 'NOT IN',
                                        ),
                                    ));
                        }

                        $arr_result = array();
                        if($cus_search_page_result == 'no'){
                            $arr_result = array(
                                'meta_key' => 'eventmana_met_event_end_date',
                                'meta_query' => array(
                                    'key' => 'eventmana_met_event_end_date',
                                    'value' => current_time( 'timestamp' ),
                                    'compare' => '>=',
                                )
                            );
                        }

                        $arr_order = array( 
                                            'orderby'   => 'meta_value_num',
                                            'order'     => 'eventmana_met_event_date',
                                            'meta_key' => 'eventmana_met_event_date'
                                        );

                        $args = array_merge($arr_base, $arr_name, $arr_cat, $arr_result, $arr_order );
                        

                        add_filter( 'posts_where', 'title_filter', 10, 2 );
                        $events = new WP_Query($args);
                        remove_filter( 'posts_where', 'title_filter', 10, 2 );

                    } 
                        ?>

                    <div class="listing-meta ">

                         <div class="filters">
                            <?php if( isset($_SESSION['ss_event_name']) && isset($_SESSION['ss_event_cat']) ){ ?>
                                <h2 class="post-title"> 
                                    <?php esc_html_e('Search for: ','eventmana'); echo '"'.urldecode( $_SESSION['ss_event_name'] ).' - '.urldecode( $_SESSION['ss_event_cat'] ).'".&nbsp;'; ?>
                                    <?php esc_html_e('Total ','eventmana'); echo esc_html($events->found_posts); esc_html_e(' events','eventmana'); ?>  
                                </h2>
                            <?php } ?>
                        </div>

                        <div class="options">
                            
                            <ul class="list-grid-tabs" role="tablist">                                    
                                <li  class="active" role="presentation"> <a class="view-list" href="#list-view" data-toggle="tab" role="tab" ><i class="fa fa-th-list"></i></a></li>
                                <li  class="" role="presentation"><a class="view-th " href="#grid-view" data-toggle="tab" role="tab"><i class="fa fa-th"></i></a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="tab-content">

                        <div id="list-view"  class="tab-pane fade active in" role="tabpanel">
                            <div class="thumbnails events vertical">
                                <?php if($events->have_posts()):
                                        while ($events -> have_posts()): $events->the_post();
                                        $port_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                                        $ticket_detail = get_post_meta(get_the_id(), "eventmana_met_event_ticket_detail", true) ? get_post_meta(get_the_id(), "eventmana_met_event_ticket_detail", true) : 'Ticket & Detail';
                                        $event_time_icon = get_post_meta(get_the_id(), "eventmana_met_event_time_icon", true) ? get_post_meta(get_the_id(), "eventmana_met_event_time_icon", true) : 'fa-file-text-o';
                                ?>
                                    <div class="thumbnail no-border no-padding">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="media_img">
                                                    <img src="<?php echo esc_url($port_thumbnail[0]); ?>" alt="<?php get_the_title(); ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <div class="caption">
                                                    <div class="pull-right share_social">
                                                        <span class="fa-stack fa-lg icon_share">
                                                            <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                            <i class="fa fa-stack-1x fa-share-alt"></i>
                                                        </span>

                                                        <div class="share">
                                                            <a target="_blank" href="http://twitter.com/intent/tweet?status=<?php get_the_title(); ?>+<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
                                                            <a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php get_the_title(); ?>"><i class="fa fa-facebook"></i></a>
                                                            <a target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?media=[MEDIA]&url=<?php the_permalink(); ?>&is_video=false&description=<?php get_the_title(); ?>"><i class="fa fa-pinterest"></i></a>
                                                            <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <h3 class="caption-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <p class="caption-category"><i class="fa <?php echo esc_attr($event_time_icon); ?>"></i>&nbsp;<?php echo get_post_meta(get_the_ID(), 'eventmana_met_event_time', true); ?> </p>
                                                    <p class="caption-price"><?php echo get_post_meta(get_the_ID(), 'eventmana_met_event_price', true); ?></p>
                                                    <p class="caption-text"><?php echo get_post_meta(get_the_id(), "eventmana_met_event_intro", true) ?></p>
                                                    <p class="caption-more"><a href="<?php the_permalink(); ?>" class="btn btn-theme"><?php echo esc_html($ticket_detail); ?></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="page-divider half"/>

                                <?php endwhile; endif; wp_reset_postdata(); ?>

                            </div>

                            <!-- Pagination -->
                            <div class="pagination-wrapper">
                                <?php
                                    global $wp_query;

                                    $add_url = (strpos(get_pagenum_link(), '?') == true) ? '&event_name='.$event_name.'&event_cat='.$event_cat : '';

                                    $big = 999999999; // need an unlikely integer
                                    $pages = paginate_links(array(
                                         'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                         'format' => '?paged=%#%',
                                         'current' => max(1, get_query_var('paged') ),
                                         'total' => $events->max_num_pages,
                                         'next_text'    => wp_kses('<i class="fa fa-chevron-right"></i>', true),
                                         'prev_text'    => wp_kses('<i class="fa fa-chevron-left"></i>', true),
                                         'type'         => 'array',
                                         'add_fragment' => $add_url
                                    ));

                                    if( is_array( $pages ) ) {
                                        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                                        echo '<ul class="pagination">';
                                        foreach ( $pages as $page ) {
                                                echo "<li>$page</li>";
                                        }
                                       echo '</ul>';
                                    }
                                ?>
                            </div>
                            <!-- /Pagination -->

                        </div>

                        <div id="grid-view"  class="tab-pane fade " role="tabpanel">
                            <div class="row thumbnails events">

                                <?php $d = 0; $i = 1 ; $dd = 0; $ii = 1 ; ?>
                                
                                <?php if($events->have_posts()):
                                        while ($events -> have_posts()): $events->the_post();
                                        $event_thumbnail_horizontal = get_post_meta(get_the_id(), "eventmana_met_event_thumbnail_horizontal", true);
                                        $ticket_detail = get_post_meta(get_the_id(), "eventmana_met_event_ticket_detail", true) ? get_post_meta(get_the_id(), "eventmana_met_event_ticket_detail", true) : 'Ticket & Detail';
                                        $event_time_icon = get_post_meta(get_the_id(), "eventmana_met_event_time_icon", true) ? get_post_meta(get_the_id(), "eventmana_met_event_time_icon", true) : 'fa-file-text-o';
                                ?>      
                                    <div class="col-md-4 col-sm-6">
                                        <div class="thumbnail no-border no-padding">
                                            <div class="media_img">
                                                <img src="<?php echo esc_url($event_thumbnail_horizontal); ?>" alt="<?php the_title(); ?>">
                                            </div>
                                            <div class="caption">
                                                <h3 class="caption-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <p class="caption-category"><i class="fa <?php echo esc_attr($event_time_icon); ?>"></i> <?php echo get_post_meta(get_the_ID(), 'eventmana_met_event_time', true); ?> </p>
                                                <p class="caption-price"><?php echo get_post_meta(get_the_ID(), 'eventmana_met_event_price', true); ?></p>
                                                <p class="caption-text"><?php echo get_post_meta(get_the_id(), "eventmana_met_event_intro", true) ?></p>
                                                <p class="caption-more"><a href="<?php the_permalink(); ?>" class="btn btn-theme"><?php echo esc_html($ticket_detail); ?></a></p>
                                            </div>
                                        </div>
                                    </div>

                                <?php if( $i == 3 ){ ?>
                                    <?php $i = 0 ; ?>
                                    <div class="clearfix fix_desk"></div>
                                <?php } $i++; $d++; ?>

                                <?php if( $ii == 2 ){ ?>
                                    <?php $ii = 0 ; ?>
                                    <div class="clearfix fix_ipad"></div>
                                <?php } $ii++; $dd++; ?>  
                                    
                                <?php endwhile; endif; wp_reset_postdata(); ?>

                                <hr class="page-divider half"/>

                                <!-- Pagination -->
                                <div class="pagination-wrapper">
                                    <?php
                                        global $wp_query;

                                        $add_url = (strpos(get_pagenum_link(), '?') == true) ? '&event_name='.$event_name.'&event_cat='.$event_cat : '';

                                        $big = 999999999; // need an unlikely integer
                                        $pages = paginate_links(array(
                                             'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                             'format' => '?paged=%#%',
                                             'current' => max(1, get_query_var('paged') ),
                                             'total' => $events->max_num_pages,
                                             'next_text'    => wp_kses('<i class="fa fa-chevron-right"></i>', true),
                                             'prev_text'    => wp_kses('<i class="fa fa-chevron-left"></i>', true),
                                             'type'         => 'array',
                                             'add_fragment' => $add_url
                                        ));

                                        if( is_array( $pages ) ) {
                                            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                                            echo '<ul class="pagination">';
                                            foreach ( $pages as $page ) {
                                                    echo "<li>$page</li>";
                                            }
                                           echo '</ul>';
                                        }
                                    ?>
                                </div>
                                <!-- /Pagination -->
                            </div>
                        </div>
                    </div>    
                     

                </div>   
                <!-- /Display content  --> 
                    
                            

                <!-- Display sidebar at right  -->  
                <?php if($main_layout == "right_sidebar"){ ?>
                    <div id="sidebar" class="sidebar <?php echo esc_attr($width_sidebar); ?>">
                        <?php dynamic_sidebar('event_list'); ?>
                    </div>
                <?php } ?>
     
        
    </div>
</div>

<?php get_footer(); ?>

