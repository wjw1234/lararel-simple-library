<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato:400,300,100">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.9/jquery.fullPage.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
        <link rel="stylesheet" href="{{elixir("css/app.css")}}">
    </head>
    <body class="main">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Hammer Lab</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav" id="fullpage-menu">
                    <li data-name="about" class="active"><a href="#" data-section="1">About</a></li>
                    <li data-name="services"><a href="#" data-section="2">Services</a></li>
                    <li data-name="gallery"><a href="#" data-section="3">Gallery</a></li>
                    <li data-name="contact"><a href="#" data-section="4">Contact</a></li>
                </ul>
            </div>
        </nav>

        <div id="fullpage">
            <div class="section section-about">
                Hammer Lab is a photographic processing and print lab also offering services in retouching, drum scanning and digital printing.
            </div>
            <div class="section section-services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li>Drum Scanning</li>
                                <li>Printing</li>
                                <li>Digital Printing</li>
                                <li>Retouching</li>
                            </ul>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-gallery">
                
            </div>
            <div class="section section-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>For any questions please contact us on:</p>
                            <p>hammerlabs@mac.com</p>
                        </div>
                        <div class="col-md-6">
                            <p>Address</p>
                            <p>116, Cremer Business Centre,<br />
                            37 Cremer St, London E2 8HD</p>
                            <iframe
                              width="600"
                              height="450"
                              frameborder="0" style="border:0"
                              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCgCZHxAxNfU7Om1NGXOhgB7mv4Slb0QIE
                                &q=hammer+lab%2C+116+Cremer+business+centre%2C+37+cremer+street%2C+london%2C+E2+8HD" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php /*
        <div class="col-md-3 col-sm-3">
            @if (strlen($settings->site_title))
                <h1>{!! $settings->site_title !!}</h1>
            @endif
            <ul class="menu">
                <li>Stories
                    <ul>
                        @foreach ($books as $book)
                            <li class="{!! isset($currentbook) && $currentbook->id == $book->id ? 'active' : null !!}"><a href="/book/{!! $book->id  !!}">{!! $book->title !!}</a></li>
                        @endforeach
                    </ul>
                </li>
                @if (strlen($settings->video_url))
                    <li><a href="{!! $settings->video_url !!}" target="_blank">Video</a></li>
                @endif
                <li><a href="/info">Info + Contact</a></li>
            </ul>
            <div class="social">
                @if (strlen($settings->instagram))
                    <a class="instagram" target="_blank" href="{!! $settings->instagram !!}"><i class="fa fa-instagram"></i></a>
                @endif
                @if (strlen($settings->tumblr))
                    <a class="tumblr" target="_blank" href="{!! $settings->tumblr !!}"><i class="fa fa-tumblr-square"></i></a>
                @endif
            </div>
        </div>

        <div class="col-md-9 col-sm-9 content">
            @yield('content')
        </div>

        */ ?>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.9/jquery.fullPage.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
        <script type="text/javascript" src="{{elixir("js/all.js")}}"></script>
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>





<!-- github.com/ElliottLandsborough -->