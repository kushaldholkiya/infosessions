<?php get_header(); ?>
<section class="page-section page404a color">
    <div class="container">

        <div id="main-slider">

            <!-- Slide -->
            <div class="item page text-center">
                <div class="caption">
                    <div class="container">
                        <div class="div-table">
                            <div class="div-cell">
                                <div class="caption-subtitle" data-animation="fadeInUp" data-animation-delay="300"><i class="fa fa-warning"></i></div>
                                <h3 class="caption-subtitle" data-animation="fadeInUp" data-animation-delay="300"><?php esc_html_e('Error 404','eventmana'); ?></h3>
                                <h2 class="caption-title" data-animation="fadeInDown" data-animation-delay="100"><?php esc_html_e('Page not Found', 'eventmana'); ?></h2>
                                <p class="caption-text">
                                    <a class="btn btn-theme btn-theme-xl scroll-to" href="<?php echo esc_url( home_url( '/' ) );  ?>" data-animation="flipInY" data-animation-delay="600"> <?php esc_html_e('Go to Homepage','eventmana') ?> <i class="fa fa-arrow-circle-right"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

	</div><!-- /container -->
</section>

<?php get_footer(); ?>