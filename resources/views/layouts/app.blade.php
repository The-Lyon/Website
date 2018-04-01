<!DOCTYPE html>
<!-- Changes the title to WLMAC if not specified -->
<?php 
if(!isset($title)){
    $title = "WLMAC";
}

?>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="The William Lyon Mackenzie Collegiate Institute official school newspaper - The Lyon."/>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('img/fav/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#4286f4">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}} | The Lyon</title>

    <!-- Styles -->
    <!-- Bulma.io -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet " href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css " integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M " crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet ">
    <!-- Custom Stuff -->
    <link href="{{ asset('css/master-css.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/pace-theme.css')}}" rel="stylesheet" type="text/css">


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
</head>

<body>
    <!-- Enitire app container -->
    <div id="app">
        <!-- Navbar (+ subnav) -->
        <nav>
            <!-- Vertical navbar -->
            <div class="navbar">
                <a style="z-index:10" class="navbar-brand" href="/">The Lyon</a> <!-- Brand -->
                <span class="openMenu"><i class="far fa-compass"></i></span> <!-- Compas open menu button -->
            </div>
            <!-- Submenu -->
            <div class="submenu">
                <!-- Submenu tile boxes -->
                <div style="width:100%; margin:0px; padding:0px!important;" class="tile is-ancestor">
                    <!-- Tile container (full witdth) -->
                    <div class="tile is-vertical is-12">
                        <!-- Articles, Playlists, & Sports tiles -->
                        <div class="tile">
                            <!-- Articles & Playlists tiles -->
                            <div class="tile is-parent is-vertical">
                                <a href="/articles" class="tile is-child notification is-primary">
                                <p class="title">Articles</p>
                                <span class="icon"><i class="fas fa-book"></i></span>
                                </a>
                                <a href="/playlists" class="tile is-child notification is-warning">
                                <p class="title">Playlists</p>
                                <span class="icon"><i class="fas fa-headphones"></i></span>
                                </a>
                            </div>
                            <!-- Sports tile -->
                            <div class="tile is-parent">
                                <a href="/sports" class="tile is-child notification is-info">
                                <p class="title">Sports</p>
                                <span class="icon"><i class="fas fa-bowling-ball"></i></span>
                                </a>
                            </div>
                        </div>
                        <!-- News tile -->
                        <div class="tile is-parent">
                            <a href="/news" class="tile is-child notification is-danger">
                                <p class="title">News</p>
                                <span class="icon"><i class="far fa-newspaper"></i></span>
                            </a>
                        </div>
                        <!-- About tile -->
                        <div class="tile is-parent">
                            <a href="/about" class="tile is-child notification is-primary">
                                <p class="title">About</p>
                                <span class="icon"><i class="far fa-question-circle"></i></span>
                            </a>
                        </div>                    
                    </div>
                </div>
            </div>
        </nav>
        <!-- Content -->
        <div class="content">
            @yield('content') <!-- Specific page data -->
            <!-- Footer -->
            <footer class="container-fluid">
                <!-- Top lighter footer (links etc) -->
                <div class="row" id="footer-light">
                    <div class="col-sm-12 col-md-6">
                        <h3 style="color:white;">The Lyon</h3>
                        <h4 style="color:white;" >William Lyon Mackenzie C.I.</h4>
                    </div>
                    <!-- Auth -->
                    <div id="meta" class="col-sm-12 col-md-6">
                        <h3 style="color:white" >Meta</h3>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Staff Login</a></li>
                        @else
                            <li id="metaDropdown" class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                    </li>
                                    <li>
                                        <a href="/admin">Admin Panel</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </div>
                </div>
                <!-- Lower darker footer -->
                <div class="row" id="footer-dark">
                    <div class="col-sm-12">
                        <p>© The Lyon - 2018</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<!-- Scripts -->
<!-- Custom -->
<script src="/js/app.js"></script>
<script src="/js/pace.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
<!-- Custom Stuff -->
<script src="{{ asset('js/master-js.js') }} "></script>

</html>
