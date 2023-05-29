/* 
$(document).ready(function(){
    $('.hero-slider').slick({
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: true,
        centerMode: true,
    });
}
 */

function applyCarousel(){
    $('.hero-slider').slick({
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        
    });
}

applyCarousel();