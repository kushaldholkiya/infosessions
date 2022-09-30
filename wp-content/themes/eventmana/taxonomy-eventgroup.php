<?php 
/** Template Name: Single Category */

get_header();

// Get Main Layout From Theme Customizer
// $main_layout = get_theme_mod("cus_main_layout","right_sidebar") ? get_theme_mod("cus_main_layout","right_sidebar") : 'right_sidebar';
$main_layout = get_theme_mod('cus_main_layout','left_sidebar');

$width_sidebar = "col-lg-3 col-md-4 col-sm-12";

if($main_layout == "fullwidth"){
    $width_main_content = "col-md-12";
}elseif($main_layout == "right_sidebar"){
    $width_main_content = "col-lg-9 col-md-8 col-sm-12 mobile_clear";
}if($main_layout == "left_sidebar"){
    $width_main_content = "col-lg-9  col-md-8 col-sm-12 mobile_clear";
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
                        $event_category = get_query_var('eventgroup');

                        $cus_cat_page_show_pastevent = get_theme_mod('cus_cat_page_show_pastevent', 'yes');
                        
                     
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $cat_orderby = get_theme_mod('cus_cat_page_orderby', 'eventmana_met_event_date');
                        $cat_order = get_theme_mod('cus_cat_page_order', 'DESC');

                   
                            
                        if($cus_cat_page_show_pastevent == 'yes'){
                            $args = array(
                                'paged' => $paged,
                                'post_type' => 'event',
                                'post_status' => 'publish',

                                'orderby'   => 'meta_value_num',
                                'order' => $cat_order,
                                'meta_key' => $cat_orderby,

                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'eventgroup',
                                        'field'    => 'slug',
                                        'terms' => $event_category
                                    ),
                                )
                            );
                        }else{
                            $args = array(
                                'paged' => $paged,
                                'post_type' => 'event',
                                'post_status' => 'publish',

                                'orderby'   => 'meta_value_num',
                                'order' => $cat_order,
                                'meta_key' => $cat_orderby,
                                
                                'meta_query' => array(
                                    'key' => 'eventmana_met_event_end_date',
                                    'value' => time(),
                                    'compare' => '>=',
                                ),

                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'eventgroup',
                                        'field'    => 'slug',
                                        'terms' => $event_category
                                    ),
                                )
                            );
                        }
                        
                            
                        

                        
                        $events = new WP_Query($args);
                      
                        ?>

                    <div class="listing-meta">

                         <div class="filters">
                           
                            <h2 class="post-title"> 
                                <?php esc_html_e('Total ','eventmana'); echo esc_html($events->found_posts); esc_html_e(' events','eventmana'); esc_html_e(' - ', 'eventmana'); echo urldecode($event_category); esc_html_e(' category ', 'eventmana'); ?>  
                            </h2>
                            
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
                                ?>
                                    <div class="thumbnail no-border no-padding">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-4">
                                                <div class="media">
                                                    <a href="<?php the_permalink(); ?>" class="like"><i class="fa fa-heart"></i></a>
                                                    <img src="<?php echo esc_url($port_thumbnail[0]); ?>" alt="<?php get_the_title(); ?>"/>
                                                    <div class="caption hovered"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                                <div class="caption">
                                                    <a href="<?php the_permalink(); ?>" class="pull-right">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fa fa-stack-2x fa-circle-thin"></i>
                                                            <i class="fa fa-stack-1x fa-share-alt"></i>
                                                        </span>
                                                    </a>
                                                    <h3 class="caption-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <p class="caption-category"><i class="fa fa-file-text-o"></i>&nbsp;<?php echo get_post_meta(get_the_ID(), 'eventmana_met_event_time', true); ?> </p>
                                                    <p class="caption-price"><?php echo get_post_meta(get_the_ID(), 'eventmana_met_event_price', true); ?></p>
                                                    <p class="caption-text"><?php echo get_post_meta(get_the_id(), "eventmana_met_event_intro", true) ?></p>
                                                    <p class="caption-more"><a href="<?php the_permalink(); ?>" class="btn btn-theme"><?php esc_html_e('Tickets &amp; details','eventmana'); ?></a></p>
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

                        <div id="grid-view"  class="tab-pane fade " role="tabpanel">
                            <div class="row thumbnails events">

                                <?php if($events->have_posts()):
                                        while ($events -> have_posts()): $events->the_post();
                                        $event_thumbnail_horizontal = get_post_meta(get_the_id(), "eventmana_met_event_thumbnail_horizontal", true);
                                ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="thumbnail no-border no-padding">
                                            <div class="media">
                                                <a href="<?php the_permalink(); ?>" class="like"><i class="fa fa-heart"></i></a>
                                                
                                                <img src="<?php echo esc_url($event_thumbnail_horizontal); ?>" alt="<?php the_title(); ?>">
                                                <div class="caption hovered"></div>
                                            </div>
                                            <div class="caption">
                                                <h3 class="caption-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <p class="caption-category"><i class="fa fa-file-text-o"></i> <?php echo get_post_meta(get_the_ID(), 'eventmana_met_event_time', true); ?> </p>
                                                <p class="caption-price"><?php echo get_post_meta(get_the_ID(), 'eventmana_met_event_price', true); ?></p>
                                                <p class="caption-text"><?php echo get_post_meta(get_the_id(), "eventmana_met_event_intro", true) ?></p>
                                                <p class="caption-more"><a href="<?php the_permalink(); ?>" class="btn btn-theme"><?php esc_html_e('Tickets &amp; details','eventmana'); ?></a></p>
                                            </div>
                                        </div>
                                    </div>

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

              
     
        
    </div>
</div>

<?php get_footer(); ?>




