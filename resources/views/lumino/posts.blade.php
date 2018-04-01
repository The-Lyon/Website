<!DOCTYPE html>
<?php
$post= \App\Http\Controllers\PostController::index();
$items= \App\Http\Controllers\AuthorController::showAll();
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

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea'
            });

        </script>
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
                <li><a href="/admin/users"><em class="fa fa-address-card-o">&nbsp;</em> Users</a></li>
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
                            <table width="100%">
                                <tr>
                                    <th><strong><u>Title</u></strong></th>
                                    <th><strong><u>Author</u></strong></th>
                                    <th> <strong><u>Type</u></strong></th>
                                    <th><strong><u></u></strong></th>
                                </tr>
                                @foreach($post as $post)
                                <tr>
                                    <td><strong>{{$post->title}}</strong></td>

                                    <td>{{$post->author}}</td>

                                    <td>
                                        <?php if($post->sport == 'false'){ echo("News");
                                        }elseif($post->sport == 'true'){
                                            echo("Sport");
                                        }elseif($post->sport == 'playlist'){
                                        echo("Playlist");}elseif($post->sport == "article"){echo("Article");}else{echo("undefined");} ?>
                                    </td>
                                    <td>
                                        {{Form::open([ 'method' => 'delete', 'route' => [ 'posts.destroy', $post->id ] ])}}
                                        <button style="float:right" id="delete" class="post-item btn btn-primary btn-sm"><span class="fa fa-trash-o"></span></button> {{ Form::close() }} {{Form::open([ 'method' => 'GET', 'route' => [ 'posts.edit', $post->id ] ])}}<button style="float:right" id="edit" class="post-item btn btn-primary btn-sm"><span class="	fa fa-edit"></span></button></form>
                                        {{ Form::close() }} {{ Form::close() }} {{Form::open([ 'method' => 'PUT', 'route' => [ 'posts.update', $post->id ] ])}}
                                        <input type="text" name="featured" style="display:none" value="true">
                                        <?php
                                if ($post->featured == "true"){
                                    echo('<button style="float:right" id="edit" class="post-item btn btn-primary btn-sm"><span class="fa fa-star"></span></button>');
                                }else{
                                    echo('<button style="float:right" id="edit" class="post-item btn btn-primary btn-sm"><span class="fa fa-star-o"></span></button>');
                                }
                                ?>
                                            </form>
                                            {{ Form::close() }}
                                    </td>

                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->

            <!--row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default collapsed">
                        <div class="panel-heading">
                            New Post
                            <span class="pull-right clickable panel-toggle panel-button-tab-left panel-collapsed"><em class="fa fa-toggle-down"></em></span></div>
                        <div class="panel-body" style="display:none;">
                            {!! Form::open(array('route'=>'posts.store', 'files' => true))!!} {{Form::label('title','Title:')}} {{Form::text('title',null,array('class'=>'form-control'))}}
                            <br/> {!! Form::Label('item', 'Author:') !!}
                            <select class="form-control" name="author">
                    @foreach($items as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                    </select> <br/>{{Form::label('intro','Intro:')}}
                            <br/> {{Form::textarea('intro',null,array('class'=>'form-control'))}}
                            <br/> {{Form::label('body','Post Body:')}} {{Form::textarea('body',null,array('class'=>'form-control'))}}
                            <br/> {{Form::label('headImg',"Header Image")}} {{Form::file('headImg',array('class'=>'form-control img-upload'))}}
                            <br/>
                            <div class="row">
                                <div class="col-sm-3">
                                    {{Form::label('type', "News")}}{{ Form::radio('type', 'News',array('class'=>'form-control')) }}
                                </div>
                                <div class="col-sm-3">
                                    {{Form::label('type', "Sport ")}}{{ Form::radio('type', 'Sport',array('class'=>'form-control')) }}
                                </div>
                                <div class="col-sm-3">
                                    {{Form::label('type', "Article ")}}{{ Form::radio('type', 'Article',array('class'=>'form-control')) }}
                                </div>
                                <div class="col-sm-3">
                                    {{Form::label('type', "Playlist ")}}{{ Form::radio('type', 'Playlist',array('class'=>'form-control')) }}
                                </div>
                            </div>
                            <br/> {{Form::submit('Create Post', array('class'=>'btn btn-primary'))}} {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Post Info (Read Me!)
                            <span class="pull-right clickable panel-toggle panel-button-tab-left panel-collapsed"><em class="fa fa-toggle-down"></em></span></div>
                        <div class="panel-body" style="display:none;">
                            <h4><strong>General:</strong></h4>
                            <ul style="line-height:25px;">
                                <li><u>Title:</u> The title of the post. (Max 255 Char)</li>
                                <li><u>Author:</u> The person who wrote it. <br/><strong>Note:</strong> The author must be created <a href="/new/user">here</a> before they can be added to a post.</li>
                                <li><u>Intro:</u> The text which is shown on all cards for the article. (Max 225 Char)
                                    <br/><strong>Note:</strong> The text must be in ONE paragraph or else it will not display.</li>
                                <li><u>Post Body:</u> The content. <br/><strong>Note:</strong> Double check formatting as it may not copy over perfectly.</li>
                                <li><u>Header Image:</u> The image featured on the card/top of article.</li>
                                <li><u>Sports Article:</u> Check this if the article is sports related.</li>
                                <li><u>Playlist:</u> Check this if the post is a playlist.</li>
                            </ul>
                            <br/>
                            <h4><strong>Playlist</strong></h4>
                            <ul>
                                <li>Fill in normally: Title, Author, Body</li>
                                <li>In 'Intro' copy and paste the below code with the updated "Track Link" which you got from your playlist. (Click <a href="https://developer.spotify.com/technologies/widgets/spotify-play-button/">here</a> for more information)
                                    <?php $iframe= '<iframe src="(YOUR LINK HERE)&theme=white&view=coverart" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>';?>
                                    <br/>
                                    </br/>{{$iframe}}<br/>
                                    <br/>
                                </li>
                                <li>Check the 'Playlist' box</li>
                            </ul>
                            <br/>
                            <h4><strong>Other</strong></h4>
                            <ul>If something is not working it can most likely be uploaded manually by a web dev.</ul>
                        </div>
                    </div>
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
