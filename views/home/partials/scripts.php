    <!-- //////////////////////[SCRYPTS]/////////////////////////////  -->
    <!-- <script src="app/lib/global.js"></script> -->

    <!-- Supportive-JavaScript -->
    <script src="vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="vendor/sweetalert/js/sweetalert2.min.js"></script>
    <!-- Banner-Slider-JavaScript -->
    <script src="public/my_js_css/responsiveslides.min.js"></script>
    <!--  responsive -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script><!-- //dont erase -->
    <!--  //responsive -->

    <!-- Owl Carousel -->
    <script src="public/my_js_css/owl.carousel.js"></script>
    <!-- //Owl Carousel -->
<script src="<?= media(); ?>/js/global_home.js"></script>

    <!-- Slide-To-Top JavaScript (No-Need-To-Change) -->
    <script type="text/javascript">
        $(document).ready(function() {
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 100,
                easingType: 'linear'
            };
        });
    </script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 0;"> </span></a>
    <!-- //Slide-To-Top JavaScript -->
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                items: 4,
                lazyLoad: true,
                autoPlay: true,
                pagination: false,
            });
        });
    </script>
    <!-- //Owl-Carousel-JavaScript -->
    <script src="public/my_js_css/jquery.magnific-popup.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });
    </script>