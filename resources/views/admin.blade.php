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
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="{!! elixir("css/app.css") !!}">
        <meta name="csrf-token" content="{!! csrf_token() !!}">
    </head>
    <body class="admin">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/dashboard">Dashboard</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                @if (Auth::check())
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Albums <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if (isset($albums) && count($albums))
                                    @foreach($albums as $album)
                                       <li><a href="{!! URL::route('show_album', array('id'=>$album->id)) !!}">{!! $album->name !!}</a></li>
                                    @endforeach
                                @endif
                                <hr />
                                <li><a href="{!! URL::route('album_order') !!}">Set album order</a></li>
                                <li class="{!! isset($page) && $page == 'albums' ? 'active' : null !!}"><a href="/dashboard/albums">All albums</a></li>
                                <li><a href="{!! URL::route('create_album_form') !!}">Create New Album</a></li>
                            </ul>
                        </li>
                        {{--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Slideshows <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if (isset($books) && count($books))
                                    @foreach ($books as $book)
                                        <li class="{!! isset($currentbook) && $currentbook->id == $book->id ? 'active' : null !!}"><a href="/dashboard/book/{!! $book->id  !!}">{!! $book->title !!}</a></li>
                                    @endforeach
                                @endif
                                <hr />
                                <li class="create-book"><a href="/dashboard/book">Manage slideshows</a></li>
                            </ul>
                        </li>--}}
                        {{--<li class="{!! isset($page) && $page == 'images' ? 'active' : null !!}"><a href="/dashboard/images">Images</a></li>--}}
                        <li class="{!! isset($page) && $page == 'settings' ? 'active' : null !!}"><a href="/dashboard/settings">Settings</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/auth/logout">Logout</a></li>
                    </ul>
                @endif
            </div><!--/.navbar-collapse -->
          </div>
        </nav>

        @yield('content')

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js"></script>
        <script type="text/javascript" src="{!! elixir("js/all.js") !!}"></script>
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
