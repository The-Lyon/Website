<!DOCTYPE html>
<?php
$post= \App\Http\Controllers\PostController::index();
$items= \App\Http\Controllers\AuthorController::showAll();
$page = "Posts";
?>
@extends('layouts.auth') @section('content')
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
@endsection
