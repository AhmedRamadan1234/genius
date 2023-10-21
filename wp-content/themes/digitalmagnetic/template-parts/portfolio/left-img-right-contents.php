<?php

$opt = get_option('wavee_opt');
$attributes = function_exists( 'get_field' ) ? get_field( 'attributes' ) : '';
$btn = function_exists( 'get_field' ) ? get_field( 'button' ) : '';
$is_portfolio_social_share = isset( $opt['portfolio_share_options'] ) ? $opt['portfolio_share_options'] : '';
$copyright_text = !empty($opt['copyright_txt']) ? $opt['copyright_txt'] : esc_html__('© 2020 DroitThemes. All rights reserved', 'wavee');
$portfolio_share_title = !empty( $opt['portfolio_share_title'] ) ? $opt['portfolio_share_title'] : esc_html__('Share', 'wavee');
?>

<section class="portfolio_detailes_two sec_pad">
    <div class="container">
        <div class="pr_details_inner_two">
            <h3><?php the_title() ?></h3>
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="pr_details_slider_two">
                    <?php the_post_thumbnail('wavee_795x505'); ?>
                </div>
            <?php endif; ?>
            <div class="pr_details_content">
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile; ?>
                <div class="d-flex">
                    <?php
                        foreach ($attributes as $attribute) { ?>
                            <div class="por_details_item">
                                <?php
                                if ( $attribute['attribute_key'] ) {
                                    echo '<h5 class="pr_title">' . esc_html($attribute['attribute_key']) . '</h5>';
                                }
                                if ( $attribute['attribute_value'] ) {
                                    echo '<p>' . esc_html($attribute['attribute_value']) . '</p>';
                                }
                                ?>
                            </div>
                            <?php
                        }

                        if ( $is_portfolio_social_share == '1' ) { ?>
                            <div class="por_details_item">
                                <?php
                                if ( $portfolio_share_title ) {
                                    echo '<h5>' . wp_kses_post( $portfolio_share_title ). '</h5>';
                                }
                                ?>
                                <ul class="list-unstyled social_link social_link_two">
                                    <?php
                                    if ( !empty( $opt['is_portfolio_fb'] ) ) { ?>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="social_facebook"></i><i class="social_facebook"></i></a></li>
                                        <?php
                                    }
                                    if ( !empty( $opt['is_portfolio_twitter'] ) ) { ?>
                                        <li><a href="https://www.twitter.com/intent/tweet?text=<?php the_permalink(); ?>"><i class="social_twitter"></i><i class="social_twitter"></i></a></li>
                                        <?php
                                    }
                                    if ( !empty( $opt['is_portfolio_pinterest'] ) ) { ?>
                                        <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>"><i class="social_pinterest"></i><i class="social_pinterest"></i></a></li>
                                        <?php
                                    }
                                    if ( !empty( $opt['is_portfolio_linkedin'] ) ) { ?>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><i class="social_linkedin"></i><i class="social_linkedin"></i></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>
                </div>
                <div class="p_details_btn d-flex">
                    <?php
                    if ( $btn ) { ?>
                        <a href="<?php echo esc_url( $btn['url'] ); ?>" class="g_hover" target="<?php echo esc_attr( $btn['target'] ); ?>">
                            <?php echo esc_html( $btn['title'] ) ?>
                        </a>
                        <?php
                    }
                    ?>
                    <div class="slider_nav pr_details_nav">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        if ( $prev_post ) { ?>
                            <a href="<?php echo get_permalink($prev_post->ID) ?>">
                                <span class="prev"><?php esc_html_e( 'Prev', 'wavee' ) ?></span>
                            </a>
                            <?php
                        } if ( $next_post ) { ?>
                            <a href="<?php echo get_permalink($next_post->ID) ?>">
                                <span class="next"><?php esc_html_e( 'Next', 'wavee' ) ?></span>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>