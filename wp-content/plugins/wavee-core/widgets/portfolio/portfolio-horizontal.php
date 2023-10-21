<section class="<?php echo ( $settings['is_full_width'] == 'yes') ? 'portfolio_fluid_area' : 'portfolio_area sec_pad'; ?>">
    <?php echo ( $settings['is_full_width'] == 'yes') ? '<div class="container">' : '<div class="container">'; ?>
        <ul class="list-unstyled gallery_filter gallery_filter_two">
            <?php
            if (!empty($settings['all_label'])) { ?>
                <li class="active" data-filter="*">
                    <?php echo esc_html($settings['all_label']); ?>
                </li>
                <?php
            }

            if (is_array($portfolio_cats)) {
                foreach ($portfolio_cats as $portfolio_cat) { ?>
                    <li data-filter=".<?php echo $portfolio_cat->slug ?>">
                        <?php echo $portfolio_cat->name ?>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
        <?php echo ( $settings['is_full_width'] == 'yes') ? '</div>' : '';

        if ( $settings ['horizontal_style'] == 'normal' ) { ?>
            <div class="row gallery_inner_four" id="gallery">
                <?php
                while ($portfolios->have_posts()) : $portfolios->the_post();
                    $cats = get_the_terms(get_the_ID(), 'portfolio_cat');
                    $cat_slug = '';
                    if( is_array($cats)) {
                        foreach ($cats as $cat) {
                            $cat_slug .= $cat->slug.' ';
                        }
                    }
                    $column = !empty($settings['column']) ? $settings['column'] : '6'; ?>
                    <div class="col-lg-<?php echo esc_attr($column.' '); echo esc_attr( $cat_slug ); ?> col-md-6 gallery_item">
                        <div class="gallery_post">
                            <a href="<?php the_permalink() ?>">
                                <div class="img">
                                    <?php the_post_thumbnail('wavee_285x220') ?>
                                </div>
                            </a>
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
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <?php

        } elseif ( $settings ) {
            switch ( $settings['horizontal_style'] ) {

                case 'hover_masonry':
                    $hover_classes = 'gallery_inner';
                    $img_class = 'full';
                     break;
                case 'hover':
                    $hover_classes = 'gallery_inner_two';
                    $img_class = 'wavee_480x370';
                    break;
                case 'hover2':
                    $hover_classes = 'gallery_inner_three';
                    $img_class = 'wavee_480x370';
                    break;
            }

            ?>
            <div id="gallery" class="row <?php echo $hover_classes ?>">
                <?php
                    while ($portfolios->have_posts()) : $portfolios->the_post();
                        $cats = get_the_terms(get_the_ID(), 'portfolio_cat');
                        $cat_slug = '';
                        if(is_array($cats)) {
                            foreach ($cats as $cat) {
                                $cat_slug .= $cat->slug.' ';
                            }
                        }
                        $column = !empty($settings['column']) ? $settings['column'] : '6'; ?>
                        <div class="col-lg-<?php echo esc_attr($column.' '); echo esc_attr( $cat_slug ); ?> col-md-4 col-sm-6 gallery_item">
                            <div class="gallery_post_two">
                                <a href="<?php the_permalink() ?>" class="img">
                                    <?php  the_post_thumbnail( $img_class ) ?>
                                </a>
                                <div class="hover_text">
                                    <a href="<?php the_permalink() ?>">
                                        <h3><?php the_title() ?></h3>
                                    </a>
                                    <a href="<?php echo get_term_link ( $cat->term_id ) ?>">
                                        <div class="g_tag"><?php echo $cat->name ?></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
            <?php
        }
     echo ( $settings['is_full_width'] == 'yes') ? '' : ' </div>'; ?>
</section>