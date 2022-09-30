<?php

get_header();

// Get Main Layout From Theme Customizer
$main_layout = get_theme_mod("cus_main_layout","right_sidebar") ? get_theme_mod("cus_main_layout","right_sidebar") : 'right_sidebar';

$width_sidebar = "col-lg-3 col-md-4 col-sm-12";

if($main_layout == "fullwidth"){
	$width_main_content = "col-md-12";
}elseif($main_layout == "right_sidebar"){
	$width_main_content = "col-md-8 col-sm-12";
}if($main_layout == "left_sidebar"){
	$width_main_content = "col-md-8 col-sm-12";
}

?>

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

						<header class="page-header">
							<h2 class="page-title">
								<?php printf( __( 'Search Results for: <span>%s</span>', 'eventmana' ), get_search_query() ); ?>
							</h2>
						</header>

				        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				                <?php get_template_part( 'content/content', 'search' ); ?>
				        <?php endwhile; ?>
				        <div class="pagination-wrapper">
				            <?php eventmana_ovatheme::eventmana_pagination_theme(); ?>
						</div>
				        <?php else : ?>
				                <?php get_template_part( 'content/content', 'none' ); ?>
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
    
<?php get_footer(); ?>










