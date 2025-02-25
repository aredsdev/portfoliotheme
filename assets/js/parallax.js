jQuery(document).ready(function($) {
    function updateParallax() {
        var scrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();

        // Top parallax layers
        $('.parallax-top .parallax-layer-back').css('transform', 'translateY(' + scrollTop * 0.5 + 'px)');
        $('.parallax-top .parallax-layer-mid').css('transform', 'translateY(' + scrollTop * 0.3 + 'px)');
        $('.parallax-top .parallax-layer-front').css('transform', 'translateY(' + scrollTop * 0.1 + 'px)');

        // Bottom parallax layers
        var bottomParallaxOffset = $('.parallax-bottom').offset().top;
        var bottomScrollTop = scrollTop - bottomParallaxOffset + windowHeight;

        if (bottomScrollTop > 0) {
            $('.parallax-bottom .parallax-layer-back').css('transform', 'translateY(' + bottomScrollTop * 0.5 + 'px)');
            $('.parallax-bottom .parallax-layer-mid').css('transform', 'translateY(' + bottomScrollTop * 0.3 + 'px)');
            $('.parallax-bottom .parallax-layer-front').css('transform', 'translateY(' + bottomScrollTop * 0.1 + 'px)');
        } else {
            // Reset transform for bottom parallax layers when not in view
            $('.parallax-bottom .parallax-layer-back').css('transform', 'translateY(0)');
            $('.parallax-bottom .parallax-layer-mid').css('transform', 'translateY(0)');
            $('.parallax-bottom .parallax-layer-front').css('transform', 'translateY(0)');
        }
    }

    // Initial update
    updateParallax();

    // Update on scroll
    $(window).scroll(function() {
        updateParallax();
    });
});