<?php
$opt = get_option('wavee_opt');
$is_preloader = isset( $opt['is_preloader'] ) ? $opt['is_preloader'] : '1';


if ( $is_preloader == '1' ) { ?>
    <div class="preloader">
        <div class="loader">
            <div class="loader-counter"></div>
        </div>
    </div>
    <?php
}