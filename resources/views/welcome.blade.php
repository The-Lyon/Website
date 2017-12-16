@extends('layouts.app') @section('content')
<?php
$post= \App\Http\Controllers\PostController::index();
?>
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
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
    <div class="nextBtns">
        <button id="nextLeft" style="left:20px;" class="btn nextButton"><span class="fa fa-angle-left"></span></button>
        <button id="nextRight" style="right:20px;" class="btn nextButton"><span class="fa fa-angle-right"></span></button>

    </div>
    <div class="featured-scroll">
        <!-- Featured Article -->
        <div class="featured-container" class=" row ">
            <?php $counter = 1?> @foreach($post as $post) @if($post->featured == "true")
            <div id="featured{{$counter}}" class="post-featured col-4 col-sm-4 col-md-4 col-lg-4">
                <span>Featured</span>
                <h1>{{$post->title}}</h1>
                <img src="{{asset( 'img/posts/'.$post->id.'/head.jpg')}}">
                <div class="featured-author">
                    <div class="name-container">
                        <a href="{{'/authors/'.\App\Http\Controllers\AuthorController::nameFind($post->author)}}">
                            <h2>{{$post->author}}</h2>
                        </a>
                    </div>
                    <img src="{{asset('img/staff/'.$post->author.'.jpg')}}">
                </div>
                <div class="intro">
                    <?php echo($post->intro); ?>
                </div>
                <a href="/posts/{{$post->id}}">
                <button class="readMore btn" class="btn">Read More</button>
                </a>
            </div>
            <?php $counter = $counter +1 ?> @endif @endforeach
        </div>
    </div>
    <!-- Im too lazy to open the JS file. Maybe one day this will find it's way into that file. -->
    <script>
        $(document).ready(function() {
            var currentFeature = 1;
            var featured = $('.post-featured').length

            $(".nextButton").click(function() {
                if ($(this).css('right') == "20px") {
                    if (currentFeature < $('.post-featured').length) {
                        currentFeature = currentFeature + 1;
                        console.log($(".post-featured").length);
                        console.log(currentFeature);
                        if (currentFeature == $('.post-featured').length) {
                            $(".featured-scroll").animate({
                                scrollLeft: $("#featured" + currentFeature).offset().left + 500

                            });
                        } else {
                            $(".featured-scroll").animate({
                                scrollLeft: $("#featured" + currentFeature).offset().left - 20
                            });
                        }
                    }
                } else {
                    console.log("clicked");
                    if (currentFeature > 1) {
                        if (currentFeature == $(".post-featured").length) {
                            $(".featured-scroll").animate({
                                scrollLeft: $("#featured" + $('.post-featured').length).offset().left * 5
                            });
                            if (currentFeature == 2 && $(".post-featured").length == 2) {
                                $(".featured-scroll").animate({
                                    scrollLeft: -500000000
                                });
                            }
                            currentFeature = $(".post-featured").length - 1;
                        } else {
                            currentFeature = currentFeature - 1;
                            $(".featured-scroll").animate({
                                scrollLeft: $("#featured" + currentFeature).offset().left + 20
                            });
                        }
                        if (currentFeature == 2 && $(".post-featured").length == 2) {
                            currentFeature = currentFeature - 1;
                            $(".featured-scroll").animate({
                                scrollLeft: -500000000
                            });
                        }
                    }
                }
                console.log(currentFeature);
            });
        });

    </script>
    <div class="more-articles" class="container-fluid">
        <div class="row">
            <div id="baitText" class="col-sm-12 col-md-7">
                <h3>This is just the tip of the iceberg.</h3>
            </div>
            <div id="baitBtn" class="col-sm-12 col-md-5">
                <a href="/news">
        <button style="width:175px; height:60px; " class="btn">More Articles</button>
        </a>
            </div>
        </div>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <style>
        #app {
            padding-top: 0px;
        }

    </style>
    @endsection
