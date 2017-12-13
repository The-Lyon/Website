@extends('layouts.app') @section('content')
<?php
$items= \App\Http\Controllers\AuthorController::showAll();
?>
    @include('messages')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });

    </script>
    <div style="overflow:auto;" class="container-fluid post-page full">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <div class="panel panel-default">
                    <h2>New Post</h2>
                    <hr/>
                    <div class="post-test">
                        {!! Form::open(array('route'=>'posts.store', 'files' => true))!!} {{Form::label('title','Title:')}} {{Form::text('title',null,array('class'=>'form-control'))}}
                        <br/> {!! Form::Label('item', 'Author:') !!}
                        <select class="form-control" name="author">
                    @foreach($items as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                    </select>
                        <br/> {{Form::label('intro','Intro:')}}
                        <br/> {{Form::textarea('intro',null,array('class'=>'form-control'))}}
                        <br/> {{Form::label('body','Post Body:')}} {{Form::textarea('body',null,array('class'=>'form-control'))}}
                        <br/> {{Form::label('headImg',"Header Image")}} {{Form::file('headImg',array('class'=>'form-control img-upload'))}}
                        <br/> {{Form::label('body','Sports Article:')}} {{ Form::checkbox('sport') }}
                        <br/> {{Form::label('music','Playlist:')}} {{ Form::checkbox('playlist') }}<br/> {{Form::label('article','Article:')}} {{ Form::checkbox('article') }}
                        <br/>
                        <br/> {{Form::submit('Create Post', array('class'=>'btn'))}} {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h2>Info</h2>
                <hr/>
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
    @endsection
