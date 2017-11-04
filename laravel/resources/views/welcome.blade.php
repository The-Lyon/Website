@extends('layouts.app') @section('content')
<?php
$recent = \App\Http\Controllers\PostController::recent();
$post_link = "posts/".$recent->id;
?>
    <div class="info-section">
        <!-- Calendar Version 
        <div class="inner-section">
            <div class="day">
                <h1>Today is a:</h1>
                <h1><strong>Day 2</strong></h1>
            </div>
            <div class="week">
                <p>This will be a calendar event</p>
                <p>This will be a calendar event</p>
            </div>
        </div>
!-->

        <!-- Just Title -->
        <h1>The Lyon</h1>
        <h3>Read | Rant | Roar</h3>
    </div>
    <div class="featured">
        <h2 id="featured-title">Featured Article</h2>
        <hr/>
        <!-- Featured Article -->
        <div class="container-fluid post post-hover">
            <div class="row">
                <div id="picture" class="col-lg-6 col-sm-12">
                    <h1>{{ $recent->title }}</h1>
                    <img id="post-img" src="{{'/img/posts/'.$recent->id.'/head.jpg'}}">
                </div>
                <div id="info" style="background-color:white;" class=" col-lg-6  col-sm-12">
                    <div id="profile-row" class="container-fluid">
                        <img src="{{'img/staff/'.$recent->author.'.jpg'}}" id="profile">
                        <a href="{{'/authors/'.\App\Http\Controllers\AuthorController::nameFind($recent->author)}}">
                            <h3>{{ $recent -> author}}</h3>
                        </a>
                    </div>
                    <div class="intro-container">
                        <?php echo($recent -> intro);?>
                    </div>
                    <a href={{$post_link}}>
                    <button class="btn">Read Article</button>
                </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="more-articles" style="text-align:center;" class="col-sm-12">
            <a href="/news">
        <button style="width:175px; height:60px;" class="btn">More Articles</button>
        </a>
        </div>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet"> @endsection
