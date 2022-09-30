<?php

get_header();

$eventmana_met_show_comment =  get_post_meta($wp_query->get_queried_object_id(), "eventmana_met_show_comment", true)?get_post_meta($wp_query->get_queried_object_id(), "eventmana_met_show_comment", true):'yes';

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

							<!-- Display content  -->
					        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					                <?php get_template_part( 'content/content', 'page' ); ?>
					                 <?php if ( comments_open() ) comments_template( '', true ); ?>
					        <?php endwhile; else : ?>
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



