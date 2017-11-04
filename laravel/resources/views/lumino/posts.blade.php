<!DOCTYPE html>
<?php
$post= \App\Http\Controllers\PostController::index();
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Lyon - Admin Dashboard</title>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/datepicker3.css')}}" rel="stylesheet">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    </head>

    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#"><span>The</span>Lyon<span>Admin</span></a>
                    <ul class="nav navbar-top-links navbar-right">

                    </ul>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Lyon Admin</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            <ul class="nav menu">
                <li><a href="/admin"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                <li class="active"><a href="/admin/post"><em class="fa fa-edit">&nbsp;</em> Posts</a></li>
                <li><a href="/admin/user"><em class="fa fa-address-card-o">&nbsp;</em> Users</a></li>
                <li><a href="/">Back to The Lyon</a></li>
            </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
                    <li class="active">Posts</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Posts</h1>
                </div>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Posts
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                        <div class="panel-body">
                            @foreach($post as $post)
                            <div class="post-row">
                            <p><strong>{{$post->title}}</strong></p>
                            <p>{{$post->author}}</p>
                            <p id="intro">
                                <?php echo($post->intro); ?>
                            </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        <!--/.row-->

        <div class="col-sm-12">
            <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
        </div>
        </div>
        <!--/.row-->
        </div>
        <!--/.main-->

        <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/chart.min.js')}}"></script>
        <script src="{{asset('js/chart-data.js')}}"></script>
        <script src="{{asset('js/easypiechart.js')}}"></script>
        <script src="{{asset('js/easypiechart-data.js')}}"></script>
        <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
        <script>
            window.onload = function() {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                });
            };

        </script>

    </body>

    </html>
