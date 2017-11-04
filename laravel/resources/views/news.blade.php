@extends('layouts.app') @section('content')
<?php
$post= \App\Http\Controllers\PostController::index();
?>
    <div class="container-fluid post post-full">

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 id="page-title" style="margin-bottom:20px;padding:10px;">News</h2>
            </div>
            <div class="col-sm-12 col-md-6">
                <form action="/search" metho="POST" id="search">
                    <input name="type" type="number" value="1" style="display:none">
                    <input class="form-control" placeholder=<?php 
                           if (isset($search)||isset($message)){ echo($query); 
                            }else{ 
                               echo("Search");}?> type="text" name="query"><span class="input-group-btn">
                    <button class="btn">Search</button>
                    </span>
                </form>
            </div>
        </div>
        <div class="container-fluid">
            <div style="text-align:center;" class="row">
                @if(isset($message))
               <h3 style="width:100%; padding:20px">{{$message." for '".$query."'"}}</h3>
                @elseif(isset($search))
                @foreach($search as $post) 
                @if($post->sport == "false" AND $post->intro != "playlist")
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="post-tab">
                        <img src="{{asset('img/posts/'.$post->id.'/head.jpg')}}">
                        <h1>{{$post->title}}</h1>
                        <a href="{{'/authors/'.\App\Http\Controllers\AuthorController::nameFind($post->author)}}">
                            <p>{{$post->author}}</p>
                        </a>
                        <div class="intro-container">
                            <div id="intro"><?php echo($post->intro);?></div>
                        </div>
                        <a href="{{'/posts/'.$post->id}}">
                        <button class="btn">Read Article</button>
                    </a>
                    </div>
                </div>
                @endif
                @endforeach 
                @else
                @foreach($post as $post) 
                @if($post->sport == "false" AND $post->intro != "playlist")
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="post-tab">
                        <img src="{{asset('img/posts/'.$post->id.'/head.jpg')}}">
                        <h1>{{$post->title}}</h1>
                        <a href="{{'/authors/'.\App\Http\Controllers\AuthorController::nameFind($post->author)}}">
                            <p>{{$post->author}}</p>
                        </a>
                        <div class="intro-container">
                            <div id="intro"><?php echo($post->intro);?></div>
                        </div>
                        <a href="{{'/posts/'.$post->id}}">
                        <button class="btn">Read Article</button>
                    </a>
                    </div>
                </div>
                @endif @endforeach @endif
            </div>
        </div>
        <hr/>
    </div>
    @endsection
