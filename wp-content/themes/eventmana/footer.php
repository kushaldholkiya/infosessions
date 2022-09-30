<?php
$eventmana_met_style_footer = get_post_meta($wp_query->get_queried_object_id(), "eventmana_met_style_footer", true)?get_post_meta($wp_query->get_queried_object_id(), "eventmana_met_style_footer", true):'tem2';
?>

<!-- Layout for woocommerce -->
<?php if( class_exists('Woocommerce') && is_woocommerce() ){ ?>
    </div></section>
<?php } ?>

<?php if($eventmana_met_style_footer == 'tem1'){ ?>
	<footer class="footer">
        <div class="footer-meta">
            <div class="container text-center">
         		<?php echo get_theme_mod('cus_footer_content', '@ copyright 2015'); ?>       
            </div>
        </div>
    </footer>
<?php }else{ ?>
	<footer class="footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                	<?php 
					    // Check widget footer active
					    $i=0;
					    if(is_active_sidebar('footer1')){$i++;}
					    if(is_active_sidebar('footer1')){$i++;}
					    if(is_active_sidebar('footer3')){$i++;}
					    if(is_active_sidebar('footer4')){$i++;}
					    if($i==4){
					        $colum = 'col-md-3 col-sm-6';
					    }else if($i==3){
					        $colum = 'col-md-4  col-sm-6';
					    }else if($i==2){
					        $colum = 'col-md-6  col-sm-6';
					    }else if($i==1){
					        $colum = 'col-md-12  col-sm-6';
					    }
				    ?>

				    <?php if(is_active_sidebar('footer1')){ ?>
                        <div class="<?php echo esc_attr($colum); ?> ">
                            <?php  dynamic_sidebar('footer1'); ?>
                        </div>
                    <?php } ?>
                    <?php if(is_active_sidebar('footer2')){ ?>
                        <div class="<?php echo esc_attr($colum); ?>">
                            <?php  dynamic_sidebar('footer2'); ?>
                        </div>
                    <?php } ?>
                    <?php if(is_active_sidebar('footer3')){ ?>
                        <div class="<?php echo esc_attr($colum); ?>">
                            <?php  dynamic_sidebar('footer3'); ?>
                        </div>
                    <?php } ?>
                    <?php if(is_active_sidebar('footer4')){ ?>
                        <div class="<?php echo esc_attr($colum); ?>">
                            <?php  dynamic_sidebar('footer4'); ?>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
        <div class="footer-meta footer-meta-alt">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 ">
                        
                        <?php
                            wp_nav_menu( array(
                                'menu'              => '',
                                'theme_location'    => 'footer',
                                'depth'             => 3,
                                'container'         => '',
                                'container_class'   => '',
                                'container_id'      => '',
                                'menu_class'        => 'footer-menu'
                            ));
                        ?>
                    </div>
                    
                </div>

            </div>
        </div>
    </footer>
<?php } ?>



           

		</div> <!-- /Wrapper -->
	</div> <!-- /container_boxed -->
    
<?php wp_footer(); ?>
</body>
</html>