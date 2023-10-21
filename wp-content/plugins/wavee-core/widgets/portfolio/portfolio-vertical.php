<section class="portfolio_area sec_pad">
    <div class="container">
        <div class="sec_title text-center">
            <?php
                if ( !empty( $settings['title'] ) ) {
                    echo '<h2 class="s_section_title">' . esc_html( $settings['title']) . '</h2>';
                } ?>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3">
                <ul class="list-unstyled gallery_filter">
                    <?php
                        if (!empty($settings['all_label'])) { ?>
                            <li class="active" data-filter="*">
                                <?php echo esc_html($settings['all_label']); ?>
                            </li>
                            <?php
                        }

                        if ( is_array ( $portfolio_cats ) ) {
                            foreach ( $portfolio_cats as $portfolio_cat ) { ?>
                                <li data-filter=".<?php echo $portfolio_cat->slug ?>">
                                    <?php echo $portfolio_cat->name ?>
                                </li>
                                <?php
                            }
                        } ?>
                </ul>
            </div>
            <div class="col-lg-10 col-md-9">
                <div id="gallery" class="row gallery_inner">
                    <?php
                        while ($portfolios->have_posts()) : $portfolios->the_post();
                            $cats = get_the_terms(get_the_ID(), 'portfolio_cat');
                            $cat_slug = '';
                            if(is_array($cats)) {
                                foreach ($cats as $cat) {
                                    $cat_slug .= $cat->slug.' ';
                                }
                            }
                            $column = !empty($settings['column']) ? $settings['column'] : '6';
                            ?>
                            <div class="col-lg-<?php echo esc_attr($column.' '); echo esc_attr( $cat_slug ); ?> col-sm-6 gallery_item">
                                <div class="gallery_post">
                                    <div class="img">
                                        <a href="<?php the_permalink() ?>">
                                            <?php
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('wavee_285x220');
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="gallery_text_info">
                                        <div class="gallery_content">
                                            <a href="<?php the_permalink() ?>">
                                                <h3><?php the_title() ?></h3>
                                            </a>
                                            <a href="<?php echo get_term_link ( $cat->term_id ) ?>" class="g_tag">
                                                <?php echo $cat->name ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
