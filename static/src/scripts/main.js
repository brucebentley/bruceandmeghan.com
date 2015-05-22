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

        //$('#our-story').prepend('<div class="section-background"><div class="section-background-image"></div></div>');

        // Active Navigation Tab
        $('.navbar-nav > li > a').click(function() {
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
        });

        // The Final Countdown
        $('#countdownRow').countdown('2015/07/11 17:30:00', function(event) {
            $(this).html(event.strftime('<div class="col-xs-6 col-sm-3 countdown-days"><div class="countdown-section"><span class="countdown-amount">%-D</span><span class="countdown-period">Day%!D</span></div></div><div class="col-xs-6 col-sm-3 countdown-hours"><div class="countdown-section"><span class="countdown-amount">%H</span><span class="countdown-period">Hour%!H</span></div></div><div class="col-xs-6 col-sm-3 countdown-minutes"><div class="countdown-section"><span class="countdown-amount">%M</span><span class="countdown-period">Minute%!M</span></div></div><div class="col-xs-6 col-sm-3 countdown-seconds"><div class="countdown-section"><span class="countdown-amount">%S</span><span class="countdown-period">Second%!S</span></div></div> '
            ));
        });

        // Groomsmen Slider
        $('.wedding-slideshow').slick({
            arrows: true,
            autoplay: false,
            autoplaySpeed: 5000,
            dots: true,
            infinite: false,
            slide: '.slide',
            slidesToShow: 1,
            slidesToScroll: 1
        });

        $('#rsvpForm').on('submit', function(e) {
            e.preventDefault();

            var data = {
                action : 'wufoo_post',
                fields : $(this).serialize()
            };

            $.ajax({
                type     : 'POST',
                url      : '/wp-admin/admin-ajax.php',
                data     : data,
                dataType : 'json',
                success  : function(data) {
                    console.log(data);
                    swal({
                        title: 'RSVP Confirmed!',
                        text: "We can't wait to see you there!",
                        type: 'success',
                        showCancelButton: 'true',
                        confirmButtonColor: '#4db6ac',
                        confirmButtonText: 'Nope, All Set!',
                        cancelButtonColor: '#4db6ac',
                        cancelButtonText: 'RSVP Another?',
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }, function() {
                        swal({
                            title: 'Thanks!',
                            text: 'Your RSVP has been confirmed.',
                            type: 'success',
                            confirmButtonColor: '#4db6ac',
                            confirmButtonText: 'Back To The Site',
                            closeOnConfirm: true
                        });
                    });
                },
                error : function(data) {
                    swal({
                        title: 'Uh Oh!',
                        text: "It looks like something didn't go quite as planned. We're sorry for that!",
                        type: 'error',
                        confirmButtonColor: '#e84e40',
                        confirmButtonText: 'Try Again...',
                        closeOnConfirm: true
                    });
                }
            });
        });
    });

    // The rest of code goes here!

}));
