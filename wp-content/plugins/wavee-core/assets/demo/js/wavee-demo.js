// ==================================================
// Project Name  :  Wavee - Agencies, Freelancers & Professionals - Templates & Themes
// File          :  JS Base
// Version       :  1.0.0
// Last change   :  28 January 2020
// Author        :  DroitThemes (DroitLab)
// Developer:    :  Rakibul Islam Dewan
// ==================================================




(function($) {
  "use strict";


  
  // back to top - start
  // --------------------------------------------------
  $(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
      $('#backtotop:hidden').stop(true, true).fadeIn();
    } else {
      $('#backtotop').stop(true, true).fadeOut();
    }
  });
  $(function() {
    $("#scroll").on('click', function() {
      $("html,body").animate({
        scrollTop: $("#thetop").offset().top
      }, "slow");
      return false
    })
  });
  // back to top - end
  // --------------------------------------------------




  // preloader - start
  // --------------------------------------------------
  // $(window).on('load', function(){
  //   $('#preloader').fadeOut('slow',function(){$(this).remove();});
  // });
  // preloader - end
  // --------------------------------------------------



  // background image - start
  // --------------------------------------------------
  $('[data-background]').each(function() {
    $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
  });
  // background image - end
  // --------------------------------------------------



  // menu button - start
  // --------------------------------------------------
  $(document).ready(function () {
    $('.close-btn, .overlay').on('click', function () {
      $('#sidebar-menu').removeClass('active');
      $('.overlay').removeClass('active');
      $('.sidebar-menu .menu-list >ul >li >.scrollspy-btn').removeClass('active');
    });

    $('.sidebar-menu .menu-list >ul >li >.scrollspy-btn').on('click', function () {
      $('#sidebar-menu').removeClass('active');
      $('.overlay').removeClass('active');
    });

    $('#sidebar-collapse').on('click', function () {
      $('#sidebar-menu').addClass('active');
      $('.overlay').addClass('active');
    });
  });
  // menu button - end
  // --------------------------------------------------



  // counter up - start
  // --------------------------------------------------
  $('.counter-text').counterUp({
    delay: 10,
    time: 2000
  });
  // counter up - end
  // --------------------------------------------------



  // scroll animation - start
  // --------------------------------------------------
  AOS.init({
    /*disable: function() {
      var maxWidth = 769;
      return window.innerWidth < maxWidth;
    }*/
    once:true,
    duration:1000,
  });
  // scroll animation - end
  // --------------------------------------------------



  // new sticky header - start
  // --------------------------------------------------
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 120) {
      $('.sticky-header').addClass("stuck");
      // $(".sticky-header .brand-logo a img").attr("src", "assets/images/logo/logo_2.png");
    } else {
      $('.sticky-header').removeClass("stuck");
      // $(".sticky-header .brand-logo a img").attr("src", "assets/images/logo/logo_1.png");
    }
  });
  // new sticky header - end
  // --------------------------------------------------



  // portfolio carousel - start
  // --------------------------------------------------
  $('#portfolio-carousel').owlCarousel({
    loop:true,
    nav:true,
    margin:30,
    center:true,
    autoplay:true,
    smartSpeed:1000,
    autoplayTimeout:6000,
    autoplayHoverPause:true,
    responsive:{
      0:{
        items:1
      },
      580:{
        items:2
      },
      600:{
        items:2
      },
      1199:{
        items:2
      },
      1200:{
        items:2
      },
      1920:{
        items:2
      }
    }
  });
  // portfolio carousel - end
  // --------------------------------------------------



  // inner page carousel - start
  // --------------------------------------------------
  $('#innerpage-carousel').owlCarousel({
    loop:true,
    nav:true,
    margin:0,
    dots:false,
    center:true,
    autoplay:true,
    smartSpeed:1000,
    autoplayTimeout:6000,
    autoplayHoverPause:true,
    responsive:{
      0:{
        items:1
      },
      580:{
        items:2
      },
      680:{
        items:2
      },
      1199:{
        items:3
      },
      1200:{
        items:4
      },
      1920:{
        items:4
      }
    }
  });
  // inner page carousel - end
  // --------------------------------------------------



  // parallax - start
  // --------------------------------------------------
  var scene = $('.scene').get(0);
  var parallaxInstance = new Parallax(scene);

  var scene = $('.scene-2').get(0);
  var parallaxInstance = new Parallax(scene);
  // parallax - end
  // --------------------------------------------------



})(jQuery);