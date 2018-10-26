<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="page-header">
                    <h2>About Us</h2>
                </div>
                <p class="about">
                        <?php echo session('about'); ?> 
                </p>
                <ul class="list-contact">
                    <li><a href="#"> <i class="fa fa-envelope"></i><?php echo session('email'); ?> </a></li>
                    <li><i class="fa fa-phone"></i> <?php echo session('contact'); ?><span></span> </li>
                    <li><i class="fa fa-map-marker"></i><?php echo session('location'); ?></li>
                </ul>

            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="page-header">
                    <h2>Quick Links</h2>
                </div>
                <ul class="link-list">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
                <ul class="link-list">
                    <li><a href="">Terms & Conditions</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">License & Agreement</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="page-header">
                    <h2>Get Connected</h2>
                </div>
                <ul class="social-ftr">
                    <li>
                            <a href="<?php echo session('fb_url'); ?>"><i class="fa fa-facebook"></i></a>
                            <a href="<?php echo session('twitter_url'); ?>"><i class="fa fa-twitter"></i></a>
                            <a href="<?php echo session('insta_url'); ?>"><i class="fa fa-instagram"></i></a>
                            <a href="<?php echo session('yt_url'); ?>"><i class="fa fa-youtube"></i></a>
                            <a href="<?php echo session('gplus_url'); ?>"><i class="fa fa-google-plus"></i></a>

                    </li>

                </ul>
                <div class="page-header">
                    <h2>Opening Hours</h2>
                </div>
                <p class="Opening">
                        <?php echo session('open_close'); ?>
                </p>
            </div>
            <div class="wrap-footer">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <p class="desgn">Copyright &copy; 2018 . <a href="/"> <?php echo session('name'); ?></a> . All Rights Reserved</p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 text-right">
                    <p class="desgn">design: <a href="http://www.facebook.com/misview" target="_blank">MIS Community</a></p>
                </div>
            </div>
        </div>
    </div>
    @yield('extra-js')
</footer>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
{{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.carousel').carousel({
            interval: 5000

        });
    });
</script>

<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.themer').owlCarousel({
            loop:true,
            autoplay: true,
            nav:true,
            dots: false,
            navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
        $('.themer-on').owlCarousel({
            loop:true,
            autoplay: true,
            nav:true,
            dots: false,
            margin: 20,
            navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
        $('.draggy').owlCarousel({
            loop:true,
            autoplay: false,
            nav:true,
            dots: false,
            margin: 25,
            navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        });
        $('.themer-on-all').owlCarousel({
            loop:true,
            autoplay: false,
            nav:true,
            dots: false,
            margin:15,
            navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
        $('.themer-on-all-snd').owlCarousel({
            loop:true,
            autoplay: false,
            nav:true,
            dots: false,
            margin:15,
            navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
        $('.themer-on-all-snd-testi').owlCarousel({
            loop:true,
            autoplay: true,
            nav:true,
            dots: true,
            margin:15,
            navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        $(".droppr").hover(
            function() {
                $(this).find(".mnu-drp.dropdown-menu").stop(true, true).delay(200).fadeIn(500);
            },
            function() {
                $(this).find(".mnu-drp.dropdown-menu").stop(true, true).delay(200).fadeOut(500);
            }
        );

    });
    $('#document').ready(function(){
        $('.elemmodal').on('hidden.bs.modal', function () {
            location.reload();
        });
        $('.carousel').carousel({
            interval: 1000
        })
        $(document).ready(function(){

            var owl_1 = $('#owl-1');
            var owl_2 = $('#owl-2');

            owl_1.owlCarousel({
                loop:false,
                margin:10,
                nav:false,
                items: 1,
                autoplay:true,
                dots: false
            });

            owl_2.owlCarousel({
                loop:false,
                margin:10,
                nav: false,
                autoplay:true,
                items: 5,
                center:true,
                navText: [ '<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ],
                dots: false

            });

            owl_2.find(".item").click(function(){
                var slide_index = owl_2.find(".item").index(this);
                owl_1.trigger('to.owl.carousel',[slide_index,300]);
            });

            // Custom Button
            $('.customNextBtn').click(function() {
                owl_1.trigger('next.owl.carousel',500);
                owl_2.trigger('next.owl.carousel',500);
            });
            $('.customPreviousBtn').click(function() {
                owl_1.trigger('prev.owl.carousel',500);
                owl_2.trigger('prev.owl.carousel',500);
            });
        });
    });
</script>
<script src="{{ asset('assets/js/range.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('ul.nav li.dropdown a').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
        });
        $('li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
        });
        $('.dropdown-submenu').hover(function () {
            $(this).toggleClass('open');
        });
        $('.panel-collapse').on('show.bs.collapse', function () {
            $(this).siblings('.panel-heading').addClass('active');
        });

        $('.panel-collapse').on('hide.bs.collapse', function () {
            $(this).siblings('.panel-heading').removeClass('active');
        });
        $("#range_28").ionRangeSlider({
            type: "double",
            min: 0,
            max: 20000,
            from: 100,
            to: 18000,
            from_min: 100,
            from_max: 18000,
            to_min: 100,
            to_max: 18000
        });
    });
</script>
<script>
    $(document).ready(function() {
        var obj = document.createElement("audio");
        obj.src = "{{ asset('assets/audio/bowl.mp3') }}";
        obj.volume = 0.4;
        obj.autoPlay = false;
        obj.preLoad = true;
        obj.controls = true;

        $(".playSound").click(function() {
            obj.play();
            // obj.pause();
        });
    });
    </script>
<script>
    $(window).scroll(function(){
        if($(document).scrollTop() > 250){
            $('.scroll-nav').addClass('navbar-fixed-top');
        }else{
            $('.scroll-nav').removeClass('navbar-fixed-top');
        }
    });
    </script>
<script src='{{ asset('assets/js/jquery.elevatezoom.js') }}'></script>
<script>
    $(document).ready(function(){
        $('#ex1').zoom();
    });

    $(document).ready(function(){
        $('#ex2').zoom();
    });
    $(document).ready(function(){
        $('#ex3').zoom();
    });
    $(document).ready(function(){
        $('#ex4').zoom();
    });
    $(document).ready(function(){
        $('#ex5').zoom();
    });
</script>
<script>
    jQuery(
        '<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>'
    ).insertAfter(".quantity input");
    jQuery(".quantity").each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find(".quantity-up"),
            btnDown = spinner.find(".quantity-down"),
            min = input.attr("min"),
            max = input.attr("max");

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });


    
</script>
</body>
</html>