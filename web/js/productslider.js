$(function(){
    $('#products_view').slides({
        preload: true,
        preloadImage: '../images/loading.gif',
        effect: 'slide, fade',
        crossfade: true,
        slideSpeed: 200,
        fadeSpeed: 100,
        generateNextPrev: true,
        generatePagination: false
    });
});

$(window).scroll(function() {
    if ($(this).scrollTop() > 1){
        $('.stis').addClass("sticky");
        $('.stis').css('display', 'block');
    }
    else{
        $('.stis').removeClass("sticky");
        $('.stis').css('display', 'none');
    }
});


