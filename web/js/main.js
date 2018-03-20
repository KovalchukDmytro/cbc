$(document).ready(function(){
    $('.open-menu').click(function(){
        $('.full_menu').slideDown();
    });

    $('.close_menu').click(function(){
        $('.full_menu').hide();
    });
});

$('document').ready(function() {
    $('.main-menu li a').each(function() {
        if ('http://cbc.org.ua/' == window.location.href) {
            $('#header').addClass('main-header');
        }
    });
});

$(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        margin: 10,
        nav: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },

            700: {
                items: 2
            },

            900: {
                items: 3
            }
        }
    })
});

$(document).ready(function() {
    $('#popup').click( function(event){
        event.preventDefault();
        $('#overlay').fadeIn(400,
            function(){
                $('#modal_form')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 200);
                });
    });

    $('#modal_close, #overlay').click( function(){
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#overlay').fadeOut(400);
                }
            );
    });
});