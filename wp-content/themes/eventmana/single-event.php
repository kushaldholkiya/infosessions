<?php get_header();

$id_event = get_the_id();

//Get Layout
$main_layout = get_post_meta($id_event, "eventmana_met_main_layout", true) ? get_post_meta($id_event, "eventmana_met_main_layout", true) : 'right_sidebar';


$width_sidebar = "col-lg-3 col-md-4 col-sm-12";

if($main_layout == "fullwidth"){
    $width_main_content = "col-md-12";
}elseif($main_layout == "right_sidebar"){
    $width_main_content = "col-lg-9 col-md-8 col-sm-12 mobile_clear";
}if($main_layout == "left_sidebar"){
    $width_main_content = "col-lg-9  col-md-8 col-sm-12 mobile_clear";
}



?>


<section class="page-section with-sidebar sidebar-right first-section light">
	<div class="container">
		<div class="row">

			<!-- left sidebar -->
			<?php if($main_layout == "left_sidebar"){ ?>
				<aside id="sidebar" class="sidebar <?php echo esc_attr($width_sidebar); ?> ">

					<?php if(get_post_meta($id_event, "eventmana_met_event_latitude", true)!=''){ ?>
					    <div class="widget google-map-widget">
					        <!-- Google map -->
					        <div class="google-map" data-zoom="17" data-latitude="<?php echo get_post_meta($id_event, "eventmana_met_event_latitude", true)?get_post_meta($id_event, "eventmana_met_event_latitude", true):'0'; ?>" data-longitude="<?php echo get_post_meta($id_event, "eventmana_met_event_longitude", true)?get_post_meta($id_event, "eventmana_met_event_longitude", true):'0'; ?>" data-defineid="map-canvas" data-marker_title="<?php echo get_post_meta($id_event, "eventmana_met_event_location", true); ?>">
					            <div id="map-canvas"></div>
					        </div>
					        <!-- /Google map -->
					        <a href="<?php echo get_post_meta($id_event, "eventmana_met_event_link_gotolocation", true) ?>" class="link"><i class="fa fa-map-marker"></i> <?php echo get_post_meta($id_event, "eventmana_met_event_gotolocation", true) ?></a>
					    </div>
				    <?php } ?>

				    <?php if(get_post_meta($id_event, "eventmana_met_event_when_where", true) || get_post_meta($id_event, "eventmana_met_event_organizer", true)){ ?>
					    <div class="widget">
					        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					            
					            <?php if(get_post_meta($id_event, "eventmana_met_event_title_when", true) || get_post_meta($id_event, "eventmana_met_event_when_where", true)) { ?>
						            <div class="panel panel-default">
						                <div class="panel-heading" role="tab" id="headingOne">
						                    <h4 class="panel-title">
						                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						                            <?php echo get_post_meta($id_event, "eventmana_met_event_title_when", true); ?>
						                        </a>
						                    </h4>
						                </div>
						                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						                    <div class="panel-body">
						                    	<?php echo get_post_meta($id_event, "eventmana_met_event_when_where", true); ?>
						                    </div>
						                </div>
						            </div>
					            <?php } ?>

					            <?php if(get_post_meta($id_event, "eventmana_met_event_title_organizer", true) || get_post_meta($id_event, "eventmana_met_event_organizer", true)){ ?>
						            <div class="panel panel-default">
						                <div class="panel-heading" role="tab" id="headingTwo">
						                    <h4 class="panel-title">
						                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						                            <?php echo get_post_meta($id_event, "eventmana_met_event_title_organizer", true); ?>
						                        </a>
						                    </h4>
						                </div>
						                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
						                    <div class="panel-body">
						                        <?php echo get_post_meta($id_event, "eventmana_met_event_organizer", true); ?>
						                    </div>
						                </div>
						            </div>
					            <?php } ?>

					        </div>
					    </div>
				    <?php } ?>
				</aside>
			<?php } ?>

			<!-- Content -->	
			<section id="content" class="content <?php echo esc_attr($width_main_content); ?> ">

				<?php 
					while(have_posts()): the_post();
						the_content( );
						if ( comments_open() ) comments_template( '', true );
					endwhile;
				?>

			</section>
			<!-- /Content -->

			<?php if($main_layout == "right_sidebar"){ ?>
				<hr class="page-divider transparent visible-xs"/>

				<aside id="sidebar" class="sidebar <?php echo esc_attr($width_sidebar); ?> ">

					<?php if(get_post_meta($id_event, "eventmana_met_event_latitude", true)!=''){ ?>
					    <div class="widget google-map-widget">
					        <!-- Google map -->
					        <div class="google-map" data-zoom="17" data-latitude="<?php echo get_post_meta($id_event, "eventmana_met_event_latitude", true)?get_post_meta($id_event, "eventmana_met_event_latitude", true):'0'; ?>" data-longitude="<?php echo get_post_meta($id_event, "eventmana_met_event_longitude", true)?get_post_meta($id_event, "eventmana_met_event_longitude", true):'0'; ?>" data-defineid="map-canvas" data-marker_title="<?php echo get_post_meta($id_event, "eventmana_met_event_location", true); ?>">
					            <div id="map-canvas"></div>
					        </div>
					        <!-- /Google map -->
					        <a href="<?php echo get_post_meta($id_event, "eventmana_met_event_link_gotolocation", true) ?>" class="link"><i class="fa fa-map-marker"></i> <?php echo get_post_meta($id_event, "eventmana_met_event_gotolocation", true) ?></a>
					    </div>
				    <?php } ?>

				    <?php if(get_post_meta($id_event, "eventmana_met_event_when_where", true) || get_post_meta($id_event, "eventmana_met_event_organizer", true)){ ?>
					    <div class="widget">
					        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					            
					            <?php if(get_post_meta($id_event, "eventmana_met_event_title_when", true) || get_post_meta($id_event, "eventmana_met_event_when_where", true)) { ?>
						            <div class="panel panel-default">
						                <div class="panel-heading" role="tab" id="headingOne">
						                    <h4 class="panel-title">
						                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						                            <?php echo get_post_meta($id_event, "eventmana_met_event_title_when", true); ?>
						                        </a>
						                    </h4>
						                </div>
						                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						                    <div class="panel-body">
						                    	<?php echo get_post_meta($id_event, "eventmana_met_event_when_where", true); ?>
						                    </div>
						                </div>
						            </div>
					            <?php } ?>

					            <?php if(get_post_meta($id_event, "eventmana_met_event_title_organizer", true) || get_post_meta($id_event, "eventmana_met_event_organizer", true)){ ?>
						            <div class="panel panel-default">
						                <div class="panel-heading" role="tab" id="headingTwo">
						                    <h4 class="panel-title">
						                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						                            <?php echo get_post_meta($id_event, "eventmana_met_event_title_organizer", true); ?>
						                        </a>
						                    </h4>
						                </div>
						                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
						                    <div class="panel-body">
						                        <?php echo get_post_meta($id_event, "eventmana_met_event_organizer", true); ?>
						                    </div>
						                </div>
						            </div>
					            <?php } ?>

					        </div>
					    </div>
				    <?php } ?>
				</aside>
			<?php } ?>


			

		</div>
	</div>
</section>



<?php get_footer(); ?>



