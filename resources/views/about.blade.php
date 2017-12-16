<?php
$authors = \App\Http\Controllers\AuthorController::index();
?>
    @extends('layouts.app') @section('content')
    <div class="container-fluid post top-title post-full">

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 id="page-title" style="margin-bottom:20px;padding:10px;">About</h2>
            </div>
        </div>
    </div>
    <div style="padding:40px;" class="container-fluid post-page full">
        <div class="row">
            <h2>What is The Lyon?</h2>
        </div>
        <br/>
        <div class="row">
            <p>The Lyon is the official school newspaper for William Lyon Mackenzie C.I. Need to know more? Get in touch with us <a href="/contact">here</a>!</p>
        </div>
    </div>

    <div style="margin-top:20px; padding:30px;" class="container-fluid post-page full">
        <h2>Lyon Executive Team</h2>
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
    <br/> @endsection
