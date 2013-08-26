$().ready(function() {
    /* scrollto */
    var $scrollLinks = $('.subnav .nav a');

    $scrollLinks.on('click', function() {
        var dest = $(this).attr('href');

        $.scrollTo(dest, {
            'offset': -100,
            'duration': 600,
            'easing': 'easeOutBack'
        });
    });
});