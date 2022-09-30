<?php 
/** Template Name: Event grid */

get_header();

// Get Main Layout From Theme Customizer
// $main_layout = get_theme_mod("cus_main_layout","right_sidebar") ? get_theme_mod("cus_main_layout","right_sidebar") : 'right_sidebar';
$main_layout = get_post_meta(get_the_id(), "eventmana_met_main_layout", true) ? get_post_meta(get_the_id(), "eventmana_met_main_layout", true) : 'right_sidebar';

$width_sidebar = "col-lg-3 col-md-4 col-sm-12";

if($main_layout == "fullwidth"){
    $width_main_content = "col-md-12";
}elseif($main_layout == "right_sidebar"){
    $width_main_content = "col-lg-9 col-md-8 col-sm-12 mobile_clear nopadding_mobile";
}if($main_layout == "left_sidebar"){
    $width_main_content = "col-lg-9 col-md-8 col-sm-12 mobile_clear nopadding_mobile";
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
                     
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                        $list_orderby = get_theme_mod('cus_grid_page_orderby', 'eventmana_met_event_date');
                        $list_order = get_theme_mod('cus_grid_page_order', 'DESC');
                        $cus_grid_page_show_pastevent = get_theme_mod('cus_grid_page_show_pastevent', 'yes');
                        

                        if( ($list_orderby == 'eventmana_met_event_date') || ($list_orderby == 'eventmana_met_event_end_date') ){

                            if($cus_grid_page_show_pastevent == 'yes'){
                                $args = array(
                                    'paged' => $paged,
                                    'post_type' => 'event',
                                    'post_status' => 'publish',

                                    'orderby'   => 'meta_value_num',
                                    'order' => $list_order,
                                    'meta_key' => $list_orderby
                                );
                            }else{
                                $args = array(
                                    'paged' => $paged,
                                    'post_type' => 'event',
                                    'post_status' => 'publish',

                                    'orderby'   => 'meta_value_num',
                                    'order' => $list_order,
                                    'meta_key' => $list_orderby,

                                    'meta_query' => array(
                                        'key' => 'eventmana_met_event_end_date',
                                        'value' => current_time( 'timestamp' ),
                                        'compare' => '>=',
                                    ),
                                );
                            }
                            
                        }else{
                            if($cus_grid_page_show_pastevent == 'yes'){
                                $args = array(
                                    'paged' => $paged,
                                    'post_type' => 'event',
                                    'post_status' => 'publish',
                                    'orderby'   => $list_orderby,
                                    'order' => $list_order
                                );
                            }else{
                                $args = array(
                                    'paged' => $paged,
                                    'post_type' => 'event',
                                    'post_status' => 'publish',
                                    'orderby'   => $list_orderby,
                                    'order' => $list_order,
                                    'meta_key' => 'eventmana_met_event_end_date',
                                    'meta_query' => array(
                                        'key' => 'eventmana_met_event_end_date',
                                        'value' => current_time( 'timestamp' ),
                                        'compare' => '>=',
                                    ),
                                );
                            }
                            
                        }

                        $events = new WP_Query($args);
                    
                        
                        ?>
                        <div class="listing-meta list-short">

                            <div class="filters">
                                <?php if( (isset($_POST['search_event']) && $_POST['search_event'] == 'search_event') || (isset($_SESSION['ss_search']) && $_SESSION['ss_search'] == 'search_event') ){ ?>
                                    <h2 class="post-title"> 
                                        <?php esc_html_e('Search for: ','eventmana'); echo '"'.urldecode( $_SESSION['ss_event_name']  ).' - '.urldecode( $_SESSION['ss_event_cat'] ).'".&nbsp;'; ?>
                                        <?php esc_html_e('Total ','eventmana'); echo esc_html($events->found_posts); esc_html_e(' events','eventmana'); ?>  
                                    </h2>
                                <?php }else if( isset($_POST['search_cat']) || (isset($_SESSION['ss_search']) && $_SESSION['ss_search'] == 'search_cat') ){ ?>
                                    <h2 class="post-title"> 
                                        <?php esc_html_e('Search for category: ','eventmana'); echo '"'.urldecode( $_POST['footer_event_cat'] ).'"'; ?>
                                        <?php esc_html_e('Total ','eventmana'); echo esc_html($events->found_posts); esc_html_e(' events','eventmana'); ?>  
                                    </h2>
                                <?php }else{ ?>
                                    <h2 class="post-title"> 
                                        <?php esc_html_e('Total ','eventmana'); echo esc_html($events->found_posts); esc_html_e(' events','eventmana'); ?>  
                                    </h2>
                                <?php } ?>
                            </div>

                            <div class="options">
                                <?php $sort_page = get_theme_mod('cus_sort_page','#'); ?>
                                <form method="post" action="<?php echo esc_url($sort_page); ?>" onChange="submit();">
                                    <div class="form-group selectpicker-wrapper">                                       
                                        <select name="sortvalue" id="sortvalue" class="selectpicker" data-live-search="true" data-width="100%"
                                                data-toggle="tooltip" title="Select Categories">
                                            <option><?php esc_html_e('Sort By','eventmana'); ?></option>
                                            <option value="dateup"><?php esc_html_e('Sort By Date (Up)','eventmana'); ?></option>
                                            <option value="datedown"><?php esc_html_e('Sort By Date (Down)','eventmana'); ?></option>
                                            <option value="upcoming"><?php esc_html_e('Upcoming Events','eventmana'); ?></option>
                                            <option value="titleaz"><?php esc_html_e('A to Z','eventmana'); ?></option>
                                            <option value="titleza"><?php esc_html_e('Z to A','eventmana'); ?></option>
                                        </select>
                                    </div>
                                </form>                                 

                                <ul class="list-grid-tabs" role="tablist">                                    
                                    <li  class="" role="presentation"> <a class="view-list" href="#list-view" data-toggle="tab" role="tab" ><i class="fa fa-th-list"></i></a></li>
                                    <li  class="active" role="presentation"><a class="view-th " href="#grid-view" data-toggle="tab" role="tab"><i class="fa fa-th"></i></a></li>
                                </ul>
                            </div>

                        </div>

                        <div class="tab-content">

                            <div id="list-view"  class="tab-pane fade  " role="tabpanel">
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

                                        $big = 999999999; // need an unlikely integer
                                        $pages = paginate_links(array(
                                             'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                             'format' => '?paged=%#%',
                                             'current' => max(1, get_query_var('paged') ),
                                             'total' => $events->max_num_pages,
                                             'next_text'    => wp_kses('<i class="fa fa-chevron-right"></i>', true),
                                             'prev_text'    => wp_kses('<i class="fa fa-chevron-left"></i>', true),
                                             'type'         => 'array',
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

                            <div id="grid-view"  class="tab-pane fade in active" role="tabpanel">
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

                                            $big = 999999999; // need an unlikely integer
                                            $pages = paginate_links(array(
                                                 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                                 'format' => '?paged=%#%',
                                                 'current' => max(1, get_query_var('paged') ),
                                                 'total' => $events->max_num_pages,
                                                 'next_text'    => wp_kses('<i class="fa fa-chevron-right"></i>', true),
                                                 'prev_text'    => wp_kses('<i class="fa fa-chevron-left"></i>', true),
                                                 'type'         => 'array',
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

                 <?php 
                    if(isset($_POST['search_cat'])){
                        $_SESSION['ss_search'] = 'search_cat';
                        $_SESSION['ss_event_name'] = '';
                        $_SESSION['ss_event_cat'] = '';

                    }else if( isset($_POST['search_event']) && $_POST['search_event'] == 'search_event' ){
                        $_SESSION['ss_search'] = 'search_event';
                        $_SESSION['ss_footer_event_cat'] = '';
                    }else{
                        $_SESSION['ss_search'] = '';
                        $_SESSION['ss_event_name'] = '';
                        $_SESSION['ss_event_cat'] = '';
                        $_SESSION['ss_footer_event_cat'] = '';
                    }
                ?>
        
    </div>
</div>

<?php get_footer(); ?>




