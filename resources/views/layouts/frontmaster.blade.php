<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="{{asset('front/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/nav.css')}}">

    {{-- carousel --}}

    <link rel="stylesheet" href="{{asset('front/owl/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/owl/dist/assets/owl.theme.default.min.css')}}">
    <script src="{{asset('front/owl/dist/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('front/css/news-carosel.css')}}">


    {{-- footer --}}
    <link rel="stylesheet" href="{{asset('front/css/footer.css')}}">

@yield('csssec')
</head>

<body>

    <div class="logo-header">

        <div class="grid-container">
            <div class="wrapper">
                <div class="top-header">
                    <div class="top-headers1 date">
                        <div id="time">
                            <iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0"
                                allowtransparency="true"
                                src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=000&aj_time=yes&font_size=16&line_brake=0&bikram_sambat=0&nst=no&api=061154j042"
                                width="320" height="22"></iframe>
                        </div>
                    </div>
                    <div class="top-headers2 title">
                        <a href="#"><img src="#" alt="logo"></a>
                    </div>
                    <!-- <div class="top-headers3 weather">
                            <div class="top-header31">
                                <p>काठमाडौंको मौसम  </p>
                            </div>
                            <div class="top-header32"><img src="img/cloud.png" alt="cloud" width="100%"></div>
                            <div class="top-header33">
                                <p>5°C <br>Overcast </p>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>

    </div>


    <nav class="navbar navbar-expand-md sticky-top navbar-light bg-light main-navbar">

        <a class="navbar-brand" href="#"><i class="fas fa-home"></i></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar1">

          <h1>Nav bar here</h1>
        </div>
    </nav>

@yield('content')

    <footer>
        <div class="main-footer">
            <div class="grid-container">
                <div class="wrapper">
                    <div class="footers">
                        <div class="footer1">
                            <div class="footer-head">
                                <h5>
                                    Example test
                                </h5>
                                <hr>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="last-footer">
            <p>
                Copyright © 2019. All Right Reserved
            </p>
        </div>
    </footer>

    <script>
        $(document).ready(function () {


            $('.sec-carosel .owl-carousel').owlCarousel({

                loop: true,
                margin: 30,
                width: 700,
                autoplay: true,
                lazyLoad: true,
                autoplayHoverPause: false,
                // animateOut: 'fadeOut',
                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                slideAll: true,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

        });

    </script>
@yield('jssec')
</body>
</html>
