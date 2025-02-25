jQuery(document).ready(function($) {
    var $siteHeader = $('.site-header');
    var viewportHeight = $(window).height();

    // Scroll event to toggle 'scrolled' class
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > viewportHeight) {
            $siteHeader.addClass('scrolled');
        } else {
            $siteHeader.removeClass('scrolled');
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
