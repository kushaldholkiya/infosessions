<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <?php 
        $seo_description = get_post_meta(eventmana_get_current_id(), "eventmana_met_seo_desc", true) ? get_post_meta(eventmana_get_current_id(), "eventmana_met_seo_desc", true) : '';
        $seo_keywords    = get_post_meta(eventmana_get_current_id(), "eventmana_met_seo_key", true) ? get_post_meta(eventmana_get_current_id(), "eventmana_met_seo_key", true) : '';
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php echo get_bloginfo( 'pingback_url' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- For SEO -->
    <?php if($seo_description!="") { ?>
        <meta name="description" content="<?php echo esc_attr($seo_description); ?>">
    <?php }elseif(get_theme_mod("cus_global_seo_desc", "") ){ ?>
        <meta name="description" content="<?php echo get_theme_mod("cus_global_seo_desc", ""); ?>">
    <?php } ?>
    <?php if($seo_keywords!="") { ?>
        <meta name="keywords" content="<?php echo esc_attr($seo_keywords); ?>">
    <?php }elseif(get_theme_mod("cus_global_seo_key", "") ){ ?>
        <meta name="keywords" content="<?php echo get_theme_mod("cus_global_seo_key", ""); ?>">
    <?php } ?>
    <?php wp_head(); ?>
</head>

<?php 
// Get version layout in each page or post
$eventmana_met_version_layout = get_post_meta(eventmana_get_current_id(), "eventmana_met_version_layout", true) ? get_post_meta(eventmana_get_current_id(), "eventmana_met_version_layout", true):'global';
if($eventmana_met_version_layout != '' && $eventmana_met_version_layout == 'global'){
    $eventmana_met_version_layout = get_theme_mod("cus_version_layout", 'wide');
}

$page_text_direction = is_rtl() ? 'rtl' : 'ltr';
$body_extra_class = $eventmana_met_version_layout.' '.$page_text_direction.' body-light   multipage';

?>

<body <?php body_class($body_extra_class); ?> >


    <!-- Preloader -->
    <?php if( get_theme_mod('cus_display_spin','yes') == 'yes' ){ ?>
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>
    <?php } ?>
    

    <div class="container_boxed">
        <div class="wrapper">
            <!-- HEADER -->
            <header class="header fixed">
                
                <!-- Top Line -->
                <div class="top-line">
                    <div class="container">
                        <?php if(get_theme_mod('cus_header_registration','yes') == 'yes' || get_theme_mod('cus_header_registration','yes') == ''){ ?>
                            
                            <ul class="user-menu">
                                <?php if( !is_user_logged_in() ){ ?>
                                    <li><a href="<?php echo esc_url(home_url('/').'wp-login.php?action=register'); ?>"> <i class="fa fa-file-text-o"></i> <?php echo get_theme_mod('cus_register_now','Register Now'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/').'wp-login.php?action=login'); ?>"><i class="fa fa-user"></i> <?php echo get_theme_mod('cus_login_text','Login'); ?></a></li>
                                <?php } else{ ?>
                                    <li> <?php echo get_theme_mod('cus_welcome_text','Welcome'); ?>&nbsp; <?php  $wp_current_user = wp_get_current_user(); echo esc_html($wp_current_user->user_login); ?> </li>
                                    <li><a href="<?php echo wp_logout_url(); ?>"><?php echo get_theme_mod('cus_logout_text','Login'); ?></a></li>

                                <?php } ?>
                            </ul>

                        <?php } ?>

                        <?php if(get_theme_mod('cus_header_latestevent','yes') == 'yes' || get_theme_mod('cus_header_latestevent','yes') == ''){ ?>
                            <div class="hot-line">
                                <?php if( is_active_sidebar('search_header_top') ){ dynamic_sidebar('search_header_top');} ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /Top Line -->

                <div class="container">
                    <div class="header-wrapper clearfix">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" class="scroll-to">
                                <?php if(get_theme_mod('cus_logo_option','logo_text') == 'logo_text'){ ?>
                                    
                                    <span class="fa-stack">
                                        <i class="fa logo-hex fa-stack-2x"></i>
                                        <i class="fa logo-fa <?php  echo esc_attr(get_theme_mod('cus_logo_icon','fa-map-marker')); ?> fa-stack-1x"></i>
                                    </span>
                                    <?php echo esc_html(get_theme_mod('cus_logo_text','Event Mana')); ?>

                                <?php }else if(get_theme_mod('cus_logo_option','logo_text') == 'logo_image'){ ?>

                                    <img src="<?php  echo esc_url( get_theme_mod('cus_logo_image', OVA_THEME_URI.'/framework/customizer/images/logo.jpg') ); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>"/>

                                <?php } ?>

                            </a>
                        </div>

                        <!-- /Logo -->

                        <!-- Navigation -->
                        <div id="mobile-menu"></div>
                        <nav class="navigation closed clearfix">
                            <a href="#" class="menu-toggle btn"><i class="fa fa-bars"></i></a>
                            <?php
                                wp_nav_menu( array(
                                    'menu'              => '',
                                    'theme_location'    => 'primary',
                                    'depth'             => 3,
                                    'container'         => '',
                                    'container_class'   => '',
                                    'container_id'      => '',
                                    'menu_class'        => 'sf-menu nav'
                                ));
                            ?>
                        </nav>
                        <!-- /Navigation -->

                    </div>
                </div>
            </header>
            <!-- /HEADER -->

            <?php 
                $cus_breadcrumbs_bg = get_theme_mod('cus_breadcrumbs_bg', OVA_THEME_URI.'/assets/img/blog-post-1.jpg');
                $eventmana_met_dis_breadcrumbs = get_post_meta(eventmana_get_current_id(), "eventmana_met_dis_breadcrumbs", true) ? get_post_meta(eventmana_get_current_id(), "eventmana_met_dis_breadcrumbs", true):'yes';
                $background_breadcums = get_post_meta(eventmana_get_current_id(), "eventmana_met_background_breadcums", true) ? get_post_meta(eventmana_get_current_id(), "eventmana_met_background_breadcums", true) : $cus_breadcrumbs_bg; 
            ?>

            <?php if($eventmana_met_dis_breadcrumbs == 'yes'){ ?>
                <section class="page-section image breadcrumbs overlay" style="background-image: url('<?php echo esc_url($background_breadcums)?>')" >
                    <div class="container">
                        <div class="row">
                            <?php eventmana_breadcrumbs();?>
                        </div>
                    </div>
                </section>
            <?php } else{ ?>
                <div class="clearfix no_breadcrumbs"></div>
            <?php } ?>

            

            

            