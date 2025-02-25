jQuery(document).ready(function($) {
    var $fixedHeader = $('.fixed-header');
    var viewportHeight = $(window).height();

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > viewportHeight) {
            $fixedHeader.addClass('scrolled');
        } else {
            $fixedHeader.removeClass('scrolled');
        }
    });

    // Hamburger menu toggle
    $('.hamburger-menu').on('click', function() {
        $('.mobile-nav').toggleClass('active');
    });

    // Close hamburger menu when a menu item is clicked
    $('.mobile-nav .nav-menu li a').on('click', function() {
        $('.mobile-nav').removeClass('active');
    });
});
