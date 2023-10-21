<?php
$opt = get_option('wavee_opt');
$portfolio_banner_style = !empty($opt['portfolio_banner_style']) ? $opt['portfolio_banner_style'] : 'style_01';
$portfolio_banner = (get_field( 'portfolio_banner' ) != 'default' || get_field( 'portfolio_banner' ) == '') ? get_field( 'portfolio_banner' ) : $portfolio_banner_style;

if ( $portfolio_banner == 'style_02' ) { ?>
    <section class="breadcrumb_area_two breadcrumb_area_three parallaxie" data-background="img/bg.jpg">
        <div class="overlay"></div>
        <div class="container custom_container">
            <div class="breadcrumb_content">
                <h1><?php wavee_banner_title(); ?></h1>
                <p>
                    <?php
                    if ( has_excerpt() ) {
                        the_excerpt();
                    }
                    ?>
                </p>
            </div>
        </div>
    </section>
    <?php

} else { ?>
    <section class="breadcrumb_area_two breadcrumb_area_four parallaxie"  data-background="img/bg.jpg">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb_content d-flex justify-content-between align-items-center">
                <h1><?php wavee_banner_title(); ?></h1>
                <div class="slider_nav">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    if ( $prev_post ) { ?>
                        <a href="<?php echo get_permalink( $prev_post->ID ) ?>">
                            <i class=" arrow_carrot-left prev"></i>
                        </a>
                        <?php

                    }
                    if ( $next_post ) { ?>
                        <a href="<?php echo get_permalink( $next_post->ID ) ?>">
                            <i class=" arrow_carrot-right next"></i>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}










