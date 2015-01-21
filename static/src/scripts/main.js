/* jshint devel:true */
// IIFE - Immediately Invoked Function Expression
(function(weddingGlobal) {
    'use strict';
    // The global jQuery object is passed as a parameter
    weddingGlobal(window.jQuery, window, document, undefined);
}(function($, window, document, undefined) {
    'use strict';
    // The $ is now locally scoped

    // Listen for the jQuery ready event on the document
    $(function() {
        // The DOM is ready!

        // Active Navigation Tab
        $('.navbar-nav > li > a').click(function() {
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
        });

        $('#countdownRow').countdown('2015/07/11', function(event) {
            $(this).html(event.strftime('<div class="col-xs-6 col-sm-3 countdown-days"><div class="countdown-section"><span class="countdown-amount">%-D</span><span class="countdown-period">Day%!D</span></div></div><div class="col-xs-6 col-sm-3 countdown-hours"><div class="countdown-section"><span class="countdown-amount">%H</span><span class="countdown-period">Hour%!H</span></div></div><div class="col-xs-6 col-sm-3 countdown-minutes"><div class="countdown-section"><span class="countdown-amount">%M</span><span class="countdown-period">Minute%!M</span></div></div><div class="col-xs-6 col-sm-3 countdown-seconds"><div class="countdown-section"><span class="countdown-amount">%S</span><span class="countdown-period">Second%!S</span></div></div> '
            ));
        });

    });

    // The rest of code goes here!

}));
