<?php
/** Template Name: Blog Template*/
get_header();

$main_layout = get_post_meta(get_the_id(), "eventmana_met_main_layout", true) ? get_post_meta(get_the_id(), "eventmana_met_main_layout", true) : 'right_sidebar';

$width_sidebar = "col-lg-3 col-md-4 col-sm-12";

if($main_layout == "fullwidth"){
    $width_main_content = "col-md-12";
}elseif($main_layout == "right_sidebar"){
    $width_main_content = "col-lg-9 col-md-8 col-sm-12";
}if($main_layout == "left_sidebar"){
    $width_main_content = "col-lg-9 col-md-8 col-sm-12";
}

?>
		<?php if($main_layout == "left_sidebar"){ ?>
				<div class="<?php echo esc_attr($width_sidebar); ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>



        <!-- Page Blog -->
        <section class="page-section">
            <div class="container">
                <div class="row">

                		<!-- Display sidebar at left  -->
						<?php if($main_layout == "left_sidebar"){ ?>
							<div class="<?php echo esc_attr($width_sidebar); ?>">
								<?php get_sidebar(); ?>
							</div>
						<?php } ?>

						<!-- Display content  -->
						<div class="<?php echo esc_attr($width_main_content); ?>">

								<?php $show_page_heading = get_post_meta(get_the_id(), "eventmana_met_page_heading", true); ?>
								<?php if($show_page_heading == 'show'){ ?>
								    <h2 class="post-title"><?php the_title();?> </h2>
								<?php } ?>

								
					            <?php 
						            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
									$args = array(    
									    'paged' => $paged,
									    'post_type' => 'post',
									    'orderby'	=> 'date',
									);
									$a = new WP_Query($args);

					            if ( $a->have_posts() ) : while ( $a->have_posts() ) : $a->the_post(); ?>
						        		<!-- Default dispaly content/content.php, if post choose post-format => display content/content-post_format -->                
						                <?php get_template_part( 'content/content', get_post_format() ); ?>
						        <?php endwhile; ?>
						       			<div class="pagination-wrapper">
								            <?php
					                            global $wp_query;

					                            $big = 999999999; // need an unlikely integer
					                            $pages = paginate_links(array(
					                                         'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					                                         'format' => '?paged=%#%',
					                                         'current' => max(1, get_query_var('paged') ),
					                                         'total' => $a->max_num_pages,
					                                         'next_text'    => wp_kses('<i class="fa fa-chevron-right"></i>', true),
					                                         'prev_text'    => wp_kses('<i class="fa fa-chevron-left"></i>', true),
					                                         'type'		    => 'array',
					                                     ) );

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
						        <?php else : ?>
						                <p><?php esc_html_e('Sorry, no pages matched your criteria.', 'eventmana'); ?></p>
						        <?php endif; ?>
						</div>

						<!-- Display sidebar at right  -->	
						<?php if($main_layout == "right_sidebar"){ ?>
							<div class="<?php echo esc_attr($width_sidebar); ?>">
								<?php get_sidebar(); ?>
							</div>
						<?php } ?>

                </div>
            </div>
        </section>
        <!-- /Page Blog -->

    
    
<?php get_footer(); ?>




