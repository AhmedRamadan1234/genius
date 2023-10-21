;(function($) {
    // Strict Mode
    'use strict';


    $(document).ready(function () {
        /*-------------------------------------------------------------------------------
                 Navbar
               -------------------------------------------------------------------------------*/

        //* Navbar Fixed
        function navbarFixed() {
            if ($('.sticky_nav').length) {
                $(window).scroll(function () {
                    var scroll = $(window).scrollTop();
                    if (scroll) {
                        $(".sticky_nav").addClass("navbar_fixed");
                    } else {
                        $(".sticky_nav").removeClass("navbar_fixed");
                    }
                });
            }
        }

        navbarFixed();

        function active_dropdown() {
            if ($(window).width() < 992) {
                $('.menu li.submenu > a').on('click', function (event) {
                    event.preventDefault();
                    $(this).parent().find('ul').first().slideToggle(700);
                    $(this).parent().siblings().find('ul').hide(700);
                });
            }
        }

        active_dropdown();

        // Pre-loader
        setTimeout(function () {
            var e = 0,
                t = 0,
                n = setInterval(function () {
                    $(".loader .loader-counter").html(t + "%"),
                        $(".loader").css("width", t + "%"), t++, 101 == ++e && (clearInterval(n),
                        $(".preloader,.loader").fadeOut(200),
                        $(".main-section, .site-header, .clb-social, .purchase-theme").addClass("visible"),
                        $(".tablet, .laptop, .phone").addClass("active"))
                }, 12)
        });

        // 5. fullPage

        if ($('#wavescroll').length > 0) {
            $("#wavescroll").fullpage({
                navigation: true,
                navigationPosition: "right",
                autoScrolling: true,
                scrollBar: false,
                scrollOverflow: true,
                animateAnchor: true,
                css3: true,
                verticalCentered: true,
                afterResponsive: function (isResponsive) {
                },
                afterLoad: function (anchorLink, index) {
                    if (index == 6) {
                        $('.header_area, .full_footer').addClass('content-black');
                        $('#fp-nav').addClass('white');
                    } else {
                        $('.header_area, .full_footer').removeClass('content-black');
                        $('#fp-nav').removeClass('white');
                    }
                    if ($('.w_footer_area,.wave_two_section_eight').hasClass('active')) {
                        $("#fp-nav,.full_footer").addClass('hide');
                    } else {
                        $('#fp-nav,.full_footer').removeClass('hide');
                    }
                }
            });
            $('#moveDown').click(function () {
                $.fn.fullpage.moveSectionDown();
            });
            $('#moveUp').click(function () {
                $.fn.fullpage.moveSectionUp();
            });
        }


        /*===============================================
               Parallax Init
          ================================================*/
        if ($('#wavescroll,.home_three').length > 0) {
            $('#wavescroll,.home_three').parallax({
                scalarX: 10.0,
                scalarY: 0.0,
            });
        }

        function parallax() {
            if ($(".parallaxie").length) {
                $('.parallaxie').parallaxie({
                    speed: 0.5,
                });
            }
        }

        parallax();


        $(".archive_nav_item a").on('click', function () {
            event.preventDefault();
            var target = $(this).parent().children(".dropdown-menu");
            $(target).slideDown();
            $(this).parent().siblings().find('ul').slideUp(700);
        });

        /*---------gallery isotope js-----------*/
        function galleryMasonry(){
            if ( $('#gallery').length ){
                $('#gallery').imagesLoaded( function() {
                    // images have loaded
                    // Activate isotope in container
                    $("#gallery").isotope({
                        itemSelector: ".gallery_item",
                        layoutMode: 'masonry',
                        animationOptions: {
                            duration: 750,
                            easing: 'linear'
                        }
                    });

                    // Add isotope click function
                    $(".gallery_filter li").on('click',function(){
                        $(".gallery_filter li").removeClass("active");
                        $(this).addClass("active");

                        var selector = $(this).attr("data-filter");
                        $("#gallery").isotope({
                            filter: selector,
                            animationOptions: {
                                animationDuration: 750,
                                easing: 'linear',
                                queue: false
                            }
                        })
                        return false;
                    })
                })
            }
        }
        galleryMasonry();

        // full screen side nav
        $(".burger_menu").on('click', function () {
            $('.hamburger_menu_wrepper').toggleClass("mySideBar");
            $(this).toggleClass("actives");
        });
        $(".close_icon").on('click', function () {
            $('.hamburger_menu_wrepper').removeClass("mySideBar");
            $('.close_icon').removeClass("actives");
        });

        $('.offcanfas_menu .dropdown').on('show.bs.dropdown', function (e) {
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown(400);
        });
        $('.offcanfas_menu .dropdown').on('hide.bs.dropdown', function (e) {
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp(500);
        });

        /*==========  Header  ==========*/
        $('.offcanfas_menu>li,.header_footer').each(function (index) {
            index = (index + 2) * .2;
            index = index + 's';
            $(this).css('animation-delay', index);
        });



        /*--------------- End popup-js--------*/
        function popupGallery() {
            if ($('.popup_youtube').length) {
                $('.popup_youtube').magnificPopup({
                    type: 'iframe',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false,
                    mainClass: 'mfp-with-zoom mfp-images-mobile',
                });
            }
        }

        popupGallery();


        /*-------------------------------------------------------------------------------
          cart js
        -------------------------------------------------------------------------------*/
        $(".ar_top").on("click", function () {
            var getID = $(this).next().attr("id");
            var result = document.getElementById(getID);
            var qty = result.value;
            $(".proceed_to_checkout .update-cart").removeAttr("disabled");
            if (!isNaN(qty)) {
                result.value++;
            } else {
                return false;
            }
        });

        $(".ar_down").on("click", function () {
            var getID = $(this).prev().attr("id");
            var result = document.getElementById(getID);
            var qty = result.value;
            $(".proceed_to_checkout .update-cart").removeAttr("disabled");
            if (!isNaN(qty) && qty > 0) {
                result.value--;
            } else {
                return false;
            }
        });


        /*-------------------------------------------------------------------------------
          selectpickers js
        -------------------------------------------------------------------------------*/
        if ($(".selectpickers").length > 0) {
            $(".selectpickers").niceSelect();
        }

        if ($('.related_pr_slider').length) {
            $('.related_pr_slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                draggable: false,
                responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 450,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    }
                ]
            });
        }


    });
})(jQuery);