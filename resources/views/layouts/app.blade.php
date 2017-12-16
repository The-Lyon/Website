<!DOCTYPE html>
<?php 
if(!isset($title)){
    $title = "WLMAC";
}

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}} | The Lyon</title>

    <!-- Styles -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet " href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css " integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M " crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet ">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/26a7a33067.css">
    <!-- Custom Stuff -->
    <link href="{{ asset('css/master-css.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/pace-theme.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/master-js.js') }} ">


    </script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/fav/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/fav/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/fav/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/fav/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/fav/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/fav/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/fav/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/fav/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/fav/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('img/fav/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/fav/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('img/fav/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('img/fav/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#4286f4">
</head>

<body>
    <div id="app">
        <nav>
            <div class="navbar fixed-top">
                <ul class="nav">
                    <li id="mobile-menu" class="nav-item dropdown">
                        <a class="nav-link" id="mobileBtn" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        <div class="dropdown-menu" id="mobile-nav">
                            <a class="dropdown-item" href="/news">News</a>
                            <a class="dropdown-item" href="/sports">Sports</a>
                            <a class="dropdown-item" href="/articles">Articles</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/playlists">Playlist</a>
                            <a class="dropdown-item" href="/about">About</a>
                            <a class="dropdown-item" href="/contact">Contact</a>
                        </div>
                    </li>
                </ul>
                <a style="z-index:10" class="navbar-brand" href="/"><img id="mac-logo" height="60px;" src="{{ asset('img/100px-Wlmac_logo.png') }}"> </a>
                <ul style="z-index:10" class="nav">
                    <li class="nav-item .hvr-sweep-to-top">
                        <a class="nav-link" href="/news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sports">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/articles">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/playlists">Playlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li id="mobile-menu" class="nav-item dropdown disabled mobile-menu2">
                        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('content')
    </div>
    <footer class="container-fluid">
        <div class="row" id="footer-light">
            <div class="col-sm-12 col-md-6">
                <h3>The Lyon</h3>
                <h4>William Lyon Mackenzie C.I.</h4>
            </div>
            <div id="meta" class="col-sm-12 col-md-6">
                <h3>Meta</h3>
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Staff Login</a></li>
                @else
                <li id="metaDropdown" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li>
                            <a href="/admin">
                            Admin Panel
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </div>
        </div>
        <div class="row" id="footer-dark">
            <div class="col-sm-12">
                <p>© The Lyon - 2017</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/pace.js"></script>
</body>

</html>
