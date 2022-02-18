$(document).ready(function () {
    $('.slider-thumbnails').slick({
        infinite: false,
        slidesToShow: 7,
        slidesToScroll: 1,
        asNavFor: '.slider',
        focusOnSelect: true
    });            
    
    $('.slider').slick({
        infinite: false,
        asNavFor: '.slider-thumbnails',
    });
})