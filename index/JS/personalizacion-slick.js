
$(document).ready(function () {
    $('.demo').slick({
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        speed: 600,
        slidesToShow: 6,
        slidesToScroll: 6,
        draggable:true,
        responsive: [
            {
                breakpoint: 1350,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 1120,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 850,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 550,
                settings: {
                    dots:false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplaySpeed: 2500
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});
