<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>DesiStore</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!--//tags -->
    <link href="{{asset('web/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/jquery-ui.css')}}">
    <link href="{{asset('web/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('web/css/flexslider.css')}}" type="text/css" media="screen" />
    <link href="{{asset('web/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('web/css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('../node_modules/toastr/build/toastr.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- //for bootstrap working -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link
        href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
        rel='stylesheet' type='text/css'>
    <link href="{{asset('web/css/nm.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <!-- header -->
    @include('web.inc.menu')

    @yield('content')

    @include('web.inc.footer')

    {{-- @yield('web.pages.sections.slider'); --}}




    <!-- js -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script type="text/javascript" src="{{asset('web/js/jquery-2.1.4.min.js')}}"></script>
    <!-- //js -->
    {{-- <script src="{{asset('web/js/responsiveslides.min.js')}}"></script> --}}
    {{-- <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });

    </script> --}}
    <script src="{{asset('web/js/modernizr.custom.js')}}"></script>
    <!-- Custom-JavaScript-File-Links -->
    <!-- cart-js -->
    <script src="{{asset('web/js/minicart.min.js')}}"></script>
    <script>
        // Mini Cart
        paypal.minicart.render({
            action: '#'
        });

        if (~window.location.search.indexOf('reset=true')) {
            paypal.minicart.reset();
        }

    </script>

    <!-- //cart-js -->
    <script type='text/javascript'>
        //<![CDATA[
        $(window).load(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 9000,
                values: [1000, 7000],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider(
                "values", 1));

        }); //]]>

    </script>
    <script type="text/javascript" src="{{asset('web/js/jquery-ui.js')}}"></script>
    <script src="{{asset('web/js/imagezoom.js')}}"></script>
    <!-- script for responsive tabs -->
    <script src="{{asset('web/js/easy-responsive-tabs.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
            });
        });

    </script>
    <!-- //script for responsive tabs -->
    <script src="{{asset('web/js/jquery.flexslider.js')}}"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });

    </script>
    <!-- stats -->
    <script src="{{asset('web/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('web/js/jquery.countup.js')}}"></script>
    <script>
        $('.counter').countUp();

    </script>
    <!-- //stats -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{asset('web/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/js/jquery.easing.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });

    </script>
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear'
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });

    </script>
    <!-- //here ends scrolling icon -->


    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{asset('web/js/bootstrap.js')}}"></script>
    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}

    {{-- <script>
        // $(document).ready(function () {
        //     console.log('test');
        //     //var cartAdd = document.getElementById('nmCartAdd');

        //     $("#nmCartAdd").submit(function(event) {
        //         event.preventDefault();
        //         console.log('test');
        //     });

        // });


        // var cartAdd = document.getElementById('nmCartAdd');

        // cartAdd.addEventListener('submit', function(){
        //     console.log('test');
        // });

        $(document).ready(function () {
            // console.log('test');
            // var idTest = $("#nmCartSbmt").length;
            // console.log(idTest);

            // $("#nmCartSbmt").on('click', function(){
            //     alert("test");
            // });

            $("#nmCartAdd").submit(function (event) {
                event.preventDefault();
                console.log('test');
            });

        });

    </script> --}}
    <script src="{{asset('../node_modules/toastr/build/toastr.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".nm-cart-count").html(0);
            $(".nm-btn-text").on('click', addToCart);

            function addToCart(e) {
                e.preventDefault();
                $(this).html('Added');

                var id = $(this).data('id');

                if (id) {
                    $.ajax({
                        url: "{{url('cart-add')}}/" + id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data)
                            toastr.success(data.success);
                            cartItemQtySave(data);
                        }
                    })
                }

            }

            function cartItemQtySave(data) {
                // sessionStorage.setItem('qty', data.quantity);
                // var qty = sessionStorage.getItem('qty');
                //console.log(qty);
                $(".nm-cart-count").html(data.quantity);
            }

            // //Form
            // $("#nmCartAdd").submit(function (event) {
            //     event.preventDefault();

            //     $("#nmCartSbmt").val('Added');

            //     // var id = $("#productId").val();
            //     // var text = $('#nmCartAdd').find('input[name="productId"]').val();
            //     // //console.log($(this).serializeArray())
            //     // var dataString = $(this).serialize();
            //     console.log(id);


            //     // if (id) {
            //     //     $.ajax({
            //     //         url: "{{url('cart-add')}}/" + id,
            //     //         type: "GET",
            //     //         dataType: "json",
            //     //         success: function (data) {
            //     //             console.log(data)
            //     //             toastr.success("{{Session::get('message')}}", "Added To Cart");
            //     //         }
            //     //     })
            //     // }

            // })



        });

    </script>

</body>

</html>
