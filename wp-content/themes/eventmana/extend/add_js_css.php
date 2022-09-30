<?php 

add_action( 'wp_enqueue_scripts', 'eventmana_google_fonts',11 );
add_action('wp_enqueue_scripts', 'eventmana_theme_scripts_styles');
add_action('wp_enqueue_scripts', 'eventmana_script_ie');
add_action('wp_head', 'eventmana_primary_color');
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );



function eventmana_google_fonts() {
    wp_enqueue_style( 'theme-slug-fonts', eventmana_customize_google_fonts(), array(), null );
}




 function eventmana_theme_scripts_styles() {

    
    /* Add Javascript bellow - use eventmana_add_js() to add: $name - unique, $url - path of javascript */
    if(get_theme_mod('cus_google_map_api') != ''){
      wp_enqueue_script("googleapis", "https://maps.googleapis.com/maps/api/js?key=".get_theme_mod('cus_google_map_api'),array(),false,true);    
    }else{
      wp_enqueue_script('map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false',array('jquery'),false,true);
    }

    eventmana_add_js('modernizr', OVA_THEME_URI.'/assets/plugins/modernizr.custom.js');
    eventmana_add_js('bootstrap', OVA_THEME_URI.'/assets/plugins/bootstrap/js/bootstrap.min.js');
    eventmana_add_js('bootstrap-select', OVA_THEME_URI.'/assets/plugins/bootstrap-select/bootstrap-select.min.js');
    eventmana_add_js('superfish', OVA_THEME_URI.'/assets/plugins/superfish/js/superfish.js');
    
    eventmana_add_js('smoothscroll', OVA_THEME_URI.'/assets/plugins/jquery.smoothscroll.min.js');
    eventmana_add_js('easing', OVA_THEME_URI.'/assets/plugins/jquery.easing.min.js');
    eventmana_add_js('smooth-scrollbar', OVA_THEME_URI.'/assets/plugins/smooth-scrollbar.min.js');

    if (is_ssl()) {
      eventmana_add_js('prettyPhoto', OVA_THEME_URI.'/assets/plugins/prettyphoto/js/jquery.prettyPhoto_https.js');
    }else{
      eventmana_add_js('prettyPhoto', OVA_THEME_URI.'/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js');
    }
    eventmana_add_js('carousel', OVA_THEME_URI.'/assets/plugins/owlcarousel2/owl.carousel.min.js');

    eventmana_add_js('waypoints', OVA_THEME_URI.'/assets/plugins/waypoints/waypoints.min.js');
    eventmana_add_js('countdown', OVA_THEME_URI.'/assets/plugins/countdown/jquery.plugin.min.js');
    eventmana_add_js('jquery.countdown', OVA_THEME_URI.'/assets/plugins/countdown/jquery.countdown.min.js');
    eventmana_add_js('isotope', OVA_THEME_URI.'/assets/plugins/isotope/jquery.isotope.min.js');


    

    eventmana_add_js('theme', OVA_THEME_URI.'/assets/js/theme.js');
    eventmana_add_js('custom', OVA_THEME_URI.'/assets/js/custom.js');

    eventmana_add_js('theme_init', OVA_THEME_URI.'/assets/js/theme_init.js');


    /* Add Css bellow - uyse eventmana_add_css to add: $name - unique, $url - path of css*/
    eventmana_add_css('bootstrap', OVA_THEME_URI.'/assets/plugins/bootstrap/css/bootstrap.min.css');
    eventmana_add_css('font-awesome', OVA_THEME_URI.'/assets/plugins/fontawesome/css/font-awesome.min.css');
    eventmana_add_css('bootstrap-select', OVA_THEME_URI.'/assets/plugins/bootstrap-select/bootstrap-select.min.css');
    eventmana_add_css('owl.carousel.min', OVA_THEME_URI.'/assets/plugins/owlcarousel2/assets/owl.carousel.min.css');
    eventmana_add_css('owl.theme.default.min', OVA_THEME_URI.'/assets/plugins/owlcarousel2/assets/owl.theme.default.min.css');
    eventmana_add_css('prettyPhoto', OVA_THEME_URI.'/assets/plugins/prettyphoto/css/prettyPhoto.css');
    eventmana_add_css('animate', OVA_THEME_URI.'/assets/plugins/animate/animate.min.css');
    eventmana_add_css('countdown', OVA_THEME_URI.'/assets/plugins/countdown/jquery.countdown.css');
    eventmana_add_css('custom', OVA_THEME_URI.'/assets/css/custom.css');

    if ( is_child_theme() ) {
      wp_enqueue_style( 'parent-stylesheet', trailingslashit( get_template_directory_uri() ) . 'style.css', false );
    }

   
    wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), 'eventmana' );

}

function eventmana_primary_color(){
    $cus_main_color = get_theme_mod('cus_main_color', '#ed4a43');

    $main_color = eventmana_hex2rgb($cus_main_color);

    

    $cus_body_font = str_replace('ovatheme_','',get_theme_mod('cus_body_font', 'Raleway'));
    $cus_heading_1 = str_replace('ovatheme_','',get_theme_mod('cus_heading_1', 'Roboto'));
    $cus_heading_2 = str_replace('ovatheme_','',get_theme_mod('cus_heading_2', 'Roboto Slab'));


    ?>
         <style type="text/css">
           
            a{ color: <?php echo esc_attr($cus_main_color); ?>; }

            body,
            #main-slider .caption-subtitle,
            .countdown-amount,
            .featured-line .countdown-wrapper.countdown-featured,
            .featured-line .countdown-wrapper.countdown-featured .countdown-amount,
            .featured-line .countdown-wrapper.countdown-featured .countdown-period,
            #main-slider .slide5 .countdown-wrapper,
            #main-slider .slide5 .countdown-wrapper .countdown-amount,
            #main-slider .slide5 .countdown-wrapper .countdown-period{
                font-family: <?php echo esc_attr($cus_body_font); ?>, sans-serif;
            }

            .wide.multipage .top-line, .boxed.multipage .top-line > .container,
            .multipage .sf-menu a,
            #main-slider .slide5 h2,
            #main-slider .slide6 .caption-title,
            .breadcrumbs .breadcrumb a,
            .font_roboto,.schedule-wrapper .nav > li > a,
            .schedule-wrapper .schedule-tabs.lv1 .nav > li > a .line1,
            .schedule-wrapper .schedule-tabs.lv1 .nav > li > a .line2,
            .timeline .post-excerpt,
            .listing-meta .filters a,
            .listing-meta .options .byrevelance,
            .listing-meta .options .bydate,
            .listing-meta .options .view-list,
            .listing-meta .options .view-th,
            .thumbnails.events .caption-category,
            .thumbnails.events .caption-price,
            .thumbnails.events .caption-text,
            .thumbnails.gallery .caption-category,
            .footer-menu,
            .country-select .dropdown-toggle,
            .footer .widget address,
            .footer .widget ul,
            .footer .widget li,
            .footer .widget p,
            .sidebar .widget .panel-group .panel-default > .panel-heading,
            .sidebar .widget .panel-body ,
            .faq-alt .panel-body,
            .google-map-widget .link,
            .page-section.create-new-event p

            {
                font-family: <?php echo esc_attr($cus_heading_1); ?>, sans-serif;
            }

            #main-slider .caption-title,
            .countdown-period,
            .thumbnails.events .thumbnail .date,
            

            {
                font-family: <?php echo esc_attr($cus_heading_2); ?>, serif;
            }
           
            .spinner {
              background: #ffffff;
              box-shadow: inset 0 0 0 0.12em rgba(0, 0, 0, 0.2);
              background: -webkit-linear-gradient(<?php echo esc_attr($cus_main_color); ?> 50%, #353535 50%), -webkit-linear-gradient(#353535 50%, <?php echo esc_attr($cus_main_color); ?> 50%);
              background: linear-gradient(<?php echo esc_attr($cus_main_color); ?> 50%, #353535 50%), linear-gradient(#353535 50%, <?php echo esc_attr($cus_main_color); ?> 50%);
            }
            
          
            .wide .page-section.color,
            .boxed .page-section.color > .container {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
           
            .color .section-title .fa-stack .fa {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .section-title .rhex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .section-title .crcle {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .section-title .wohex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            
            .rhex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .crcle {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .wohex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            
            .btn-theme {
              color: #ffffff;
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              border-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            
            .color .btn-theme {
              color: <?php echo esc_attr($cus_main_color); ?>;
             
            }
            
            .btn-theme-transparent,
            .btn-theme-transparent:focus,
            .btn-theme-transparent:active {
              background-color: transparent;
              border-color: <?php echo esc_attr($cus_main_color); ?>;
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            
            .logo a:hover {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .logo a .logo-hex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .logo a:hover .logo-fa {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .sf-arrows > li > .sf-with-ul:focus:after,
            .sf-arrows > li:hover > .sf-with-ul:after,
            .sf-arrows > .sfHover > .sf-with-ul:after {
              border-top-color: <?php echo esc_attr($cus_main_color); ?>;
            }
        
            .sf-arrows ul li > .sf-with-ul:focus:after,
            .sf-arrows ul li:hover > .sf-with-ul:after,
            .sf-arrows ul .sfHover > .sf-with-ul:after {
              border-left-color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            @media (max-width: 991px) {
              .mobile-submenu {
                background-color: <?php echo esc_attr($cus_main_color); ?>;
              }
            }
          
            #main-slider.owl-theme .owl-controls .owl-buttons .owl-prev:hover,
            #main-slider.owl-theme .owl-controls .owl-buttons .owl-next:hover {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            #main-slider.owl-theme .owl-controls .owl-nav [class*=owl-]:hover {
              border-color: <?php echo esc_attr($cus_main_color); ?>;
              background: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
            #main-slider.owl-theme .owl-controls .owl-dots .owl-dot:hover span,
            #main-slider.owl-theme .owl-controls .owl-dots .owl-dot.active span {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              border: solid 2px #ffffff;
            }
            .form-background {
              background-color: #0d1d31;
            }
            .form-header {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            
            .btn-play .fa {
              background-color: #ffffff;
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .btn-play:hover {
              border-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .btn-play:hover .fa {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .img-carousel .owl-controls .owl-page span,
            .img-carousel .owl-controls .owl-buttons div {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            /* 3.4 - Partners carousel / Owl carousel
            /* ========================================================================== */
           
            .partners-carousel .owl-prev:hover,
            .partners-carousel .owl-next:hover {
              border-color: <?php echo esc_attr($cus_main_color); ?>;
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .partners-carousel .owl-prev:hover .fa,
            .partners-carousel .owl-next:hover .fa {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .schedule-wrapper .schedule-tabs.lv2 .nav > li.active > a {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .schedule-wrapper .schedule-tabs.lv2 .nav > li.active:before {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
          
            .row.faq .nav li.active a,
            .row.faq .nav li a:hover {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              border-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
           
            .post-title a:hover {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .post-header .post-meta {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .post-header .post-meta a:hover {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .timeline .post-title {
              color: <?php echo esc_attr($cus_main_color); ?>;
              border-bottom: solid 1px #d2d2dc;
            }
            .timeline .post-title a {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .timeline .post-meta a .fa {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .timeline .post-readmore a:hover {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            
            .pagination > li > a:hover,
            .pagination > li > span:hover,
            .pagination > li > a:focus,
            .pagination > li > span:focus {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
            .pagination > .active > a,
            .pagination > .active > span,
            .pagination > .active > a:hover,
            .pagination > .active > span:hover,
            .pagination > .active > a:focus,
            .pagination > .active > span:focus {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              border-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .project-details .dl-horizontal dt {
              color: #3c4547;
            }
            .thumbnail.hover,
            .thumbnail:hover {
              border: solid 1px <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .caption-category {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
          
            .color .testimonials.owl-theme .owl-dots .owl-dot span {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              border: solid 2px #ffffff;
            }
           
            .widget-title:before {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            
            #af-form .form-control:focus {
              border-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            #af-form .alert {
              border-color: <?php echo esc_attr($cus_main_color); ?>;
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
           
            .price-value {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            
            .price-table.featured {
              border-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .price-table.featured:before {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
            .container.gmap-background .on-gmap.color {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #fefefe;
            }
           
            .to-top:hover {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
            .btn-preview-light,
            .btn-preview-light:hover {
              border-color: #f5f5f5;
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .btn-preview-dark,
            .btn-preview-dark:hover {
              border-color: #f5f5f5;
              background-color: #0d1d31;
            }
            .sidebar .widget-title {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .widget.categories li.active a,
            .widget.categories li a:hover {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
            .about-the-author .media-heading {
              color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .comments-form .block-title {
              color: <?php echo esc_attr($cus_main_color); ?> !important;
            }
          
            /* dark version */
            .body-dark .section-title .rhex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .body-dark .section-title .crcle {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .body-dark .section-title .wohex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .body-dark .color .section-title .rhex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .body-dark .color .section-title .crcle {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .body-dark .color .section-title .wohex {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .body-dark .form-background .section-title .fa-stack-1x {
              color: <?php echo esc_attr($cus_main_color); ?> !important;
            }
            .body-dark .color .btn-theme {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              border-color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .body-dark .event-background {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .body-dark .pagination > li > a:hover,
            .body-dark .pagination > li > span:hover,
            .body-dark .pagination > li > a:focus,
            .body-dark .pagination > li > span:focus {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }
            .body-dark .pagination > .active > a,
            .body-dark .pagination > .active > span,
            .body-dark .pagination > .active > a:hover,
            .body-dark .pagination > .active > span:hover,
            .body-dark .pagination > .active > a:focus,
            .body-dark .pagination > .active > span:focus {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              border-color: <?php echo esc_attr($cus_main_color); ?>;
            }
           
            .body-dark .widget.categories li.active a,
            .body-dark .widget.categories li a:hover {
              background-color: <?php echo esc_attr($cus_main_color); ?>;
              color: #ffffff;
            }

            .top-line .hot-line span{ color: <?php echo esc_attr($cus_main_color); ?>; }
            .multipage .logo a .logo-hex, .multipage .logo a:hover{ color: <?php echo esc_attr($cus_main_color); ?>; }
            .multipage .logo a .logo-hex{ background-color: <?php echo esc_attr($cus_main_color); ?>; }

            .slide3::before, .slide4::before{
                background-color: rgba(<?php echo esc_attr($main_color[0]); ?>,<?php echo esc_attr($main_color[1]); ?>, <?php echo esc_attr($main_color[2]); ?>, 0.7);  
            }
            #main-slider .slide4 .btn-theme-dark:hover{ 
                border-color: <?php echo esc_attr($cus_main_color); ?>;
                background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .feature .title-inner span.title{color: <?php echo esc_attr($cus_main_color); ?>;}
            .filtrable .current a, .filtrable .active a, .filtrable .current a:hover, .filtrable .active a:hover{ 
                color: <?php echo esc_attr($cus_main_color); ?>;
                border-bottom-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .filtrable a:hover, .thumbnails.events .caption-price{
                color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .thumbnails.events .caption-title a:hover{
                color: <?php echo esc_attr($cus_main_color); ?>;   
            }
            .thumbnails.events .caption-more .btn-theme:hover{
                background-color: <?php echo esc_attr($cus_main_color); ?>;
                border-color: <?php echo esc_attr($cus_main_color); ?>;   
            }
            .thumbnail .caption.hovered{
                background-color: rgba(<?php echo esc_attr($main_color[0]); ?>,<?php echo esc_attr($main_color[1]); ?>, <?php echo esc_attr($main_color[2]); ?>, 0.6);  

            }
            #main-slider .location-search .form-group .input-group{  border: solid 5px <?php echo esc_attr($cus_main_color); ?>;    }
            .thumbnail.hover .rehex .rehex-deg .rehex-deg{ background-color: <?php echo esc_attr($cus_main_color); ?>; }
            .thumbnails.info-thumbs .caption-title::before{ background-color: <?php echo esc_attr($cus_main_color); ?>; }
            .carousel-slider .owl-prev:hover, .carousel-slider .owl-next:hover{ border-color: <?php echo esc_attr($cus_main_color); ?>; }
            .carousel-slider .owl-prev:hover .fa, .carousel-slider .owl-next:hover .fa{ color: <?php echo esc_attr($cus_main_color); ?>; }
            .thumbnails.gallery .caption-buttons .btn:hover{ color: <?php echo esc_attr($cus_main_color); ?>; }
            .thumbnails.hotels .caption-title a:hover{ color: <?php echo esc_attr($cus_main_color); ?>; }
            .widget-categories ul li a:hover{ color: <?php echo esc_attr($cus_main_color); ?>; }
            .pagination li span.current{ background-color: <?php echo esc_attr($cus_main_color); ?>; }
            .multipage .pagination > li > a:hover, .multipage .pagination > li > span:hover, .multipage .pagination > li > a:focus, .multipage .pagination > li > span:focus{
                 background-color: <?php echo esc_attr($cus_main_color); ?>;
            }
            .wide .footer-widgets, .boxed .footer-widgets > .container{
                border-top: solid 5px <?php echo esc_attr($cus_main_color); ?>;
            }
            .img-carousel.owl-theme .owl-controls .owl-dots .owl-dot:hover span, .img-carousel.owl-theme .owl-controls .owl-dots .owl-dot.active span{
                background-color: <?php echo esc_attr($cus_main_color); ?>;    
            }

            .schedule-wrapper.schedule-alt .schedule-tabs.lv1 .nav > li.active{
                background-color: <?php echo esc_attr($cus_main_color); ?>!important;        
            }
            .timeline a{ color: <?php echo esc_attr($cus_main_color); ?>!important; }
            .faq-alt .panel-title a{ color: <?php echo esc_attr($cus_main_color); ?>; }

            .sticky{
                border-top: 5px solid <?php echo esc_attr($cus_main_color);?>;
            }
            .vc_row {
              margin-left: 0px!important;
              margin-right: 0px!important;
            }
            .wpb_row{ margin-bottom: 0!important;}

            ul li.current_page_item a{
              color: <?php echo esc_attr($cus_main_color);?>!important;
            }
         </style>
    <?php
}


 function eventmana_add_js($name, $url){
    /* enqueue javascript */
    wp_enqueue_script($name,$url,array(),false,true);
}


 function eventmana_add_css($name, $url){
    /* enqueue css*/
    wp_enqueue_style( $name,$url);
}


 function eventmana_script_ie(){
    /* Fix tf and IE */
    wp_enqueue_style( 'ova_add_fix', OVA_THEME_URI.'/extend/css/fix.css');
    echo '<!--[if lt IE 9]>
    <script src="'.OVA_THEME_URI.'/framework/script/html5shiv.js"></script>
    <script src="'.OVA_THEME_URI.'/framework/script/respond.min.js"></script>
    <![endif]-->';
}




/* Google Font */


function eventmana_customize_google_fonts() {
    $fonts_url = '';

    $cusbodyfont = get_theme_mod('cus_body_font', 'Raleway');
    $cusheading1 = get_theme_mod('cus_heading_1', 'Roboto');
    $cusheading2 = get_theme_mod('cus_heading_2', 'Roboto Slab');





    $cusbodyfont_c = _x( 'on', $cusbodyfont.': on or off', 'eventmana' );

    $cusheading1_c = _x( 'on', $cusheading1.': on or off', 'eventmana' );

    $cusheading2_c = _x( 'on', $cusheading2.': on or off', 'eventmana' );


 
    if ( 'off' !== $cusbodyfont_c || 'off' !== $cusheading1_c || 'off' !== $cusheading2_c ) {
        $font_families = array();
 
        if ( 'off' !== $cusbodyfont_c && strpos($cusbodyfont,'ovatheme_') === false ) {
            $font_families[] = $cusbodyfont.':100,200,300,400,500,600,700,800,900"';
        }
 
        if ( 'off' !== $cusheading1_c && strpos($cusheading1,'ovatheme_') === false ) {
            $font_families[] = $cusheading1.':100,200,300,400,500,600,700,800,900';
        }

        if ( 'off' !== $cusheading2_c && strpos($cusheading2,'ovatheme_') === false ) {
            $font_families[] = $cusheading2.':100,200,300,400,500,600,700,800,900';
        }


        if($font_families != null){
          $query_args = array(
              'family' => urlencode( implode( '|', $font_families ) ),
              'subset' => urlencode( 'latin,latin-ext' ),
          );  
          $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
       
 
        
    }
 
    return esc_url_raw( $fonts_url );
}

function eventmana_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb; // returns an array with the rgb values
}


function eventmana_wpadminjs() {

    wp_enqueue_script( 'wpadminjs', OVA_THEME_URI.'/framework/script/wpadmin.js' );
}
add_action( 'admin_enqueue_scripts', 'eventmana_wpadminjs' );



// add_action('init', 'eventmana_myStartSession', 1);
// add_action('wp_logout', 'eventmana_myEndSession');
// add_action('wp_login', 'eventmana_myEndSession');

// function eventmana_myStartSession() {
//     if(!session_id()) {
//         session_start();
//     }
// }

// function eventmana_myEndSession() {
//     session_destroy ();
// }


