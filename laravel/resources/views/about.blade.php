<?php
$authors = \App\Http\Controllers\AuthorController::index();
?>
    @extends('layouts.app') @section('content')
    <div style="padding:30px;" class="container-fluid post-page full">
        <div class="row">
            <h2>About</h2>
        </div>
                    <br/>
        <div class="row">
        <p>The Lyon is the official school newspaper for William Lyon Mackenzie C.I.</p>
        </div>
    </div>

    <div style="margin-top:20px; padding:20px;" class="container-fluid post-page full">
        <h2>Lyon Staff</h2>
        <div class="row">
            @foreach($authors as $authors) @if($authors->year == "2017/2018")
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="author-tab">
                    <img src="{{'img/staff/'.$authors->author.'.jpg'}}">
                    <div class="text">
                        <div class="nameCenter">
                            <h2>{{$authors->author}}</h2>
                        </div>
                        <h5>{{$authors->position}}</h5>
                        <a href="{{'/authors/'.\App\Http\Controllers\AuthorController::nameFind($authors->author)}}">
                        <button style="margin-top:10px;' " class="btn">More Information</button>
                    </a>
                    </div>
                </div>
            </div>
            @endif @endforeach
        </div>
    </div>
    @endsection
