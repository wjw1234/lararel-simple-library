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
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{elixir("css/app.css")}}">
    </head>
    <body class="main">

        <div class="container">

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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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