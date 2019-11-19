<footer>
    <div id="footer-brand">
        <img id="footer-logo" src="../img/fnexus_no_bg.png" alt="logo">
        <img id="license-logo" src="../img/cc.png" alt="cc">
        <p>2019</p>
    </div>
    <div id="footer-contact">
        <a target="_blank" href="https://github.com/fnexus">Github</a>
        <div class="footer-divider"></div>
        <a target="_blank" href="mailto:fnexus.co@gmail.com">Support</a>
    </div>
    <div class="share-button">
        <span><i class="fas fa-share-alt"></i> Follow us!</span>
        <a href="#"><i class="fab fa-facebook-f fa-xs"></i></a>
        <a target="_blank" href="https://twitter.com/fnexusTeam"><i class="fab fa-twitter fa-xs"></i></a>
        <a href="#"><i class="fab fa-instagram fa-xs"></i></a>
        <a href="#"><i class="fab fa-linkedin-in fa-xs"></i></a>
    </div>
</footer>

<script type="text/javascript">
    $(document).ready(function () {
        $('.demo').slick({
            dots: true,
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: true,
            speed: 1100,
            slidesToShow: 6,
            slidesToScroll: 6,
            draggable:true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
</script>

</body>
</html>