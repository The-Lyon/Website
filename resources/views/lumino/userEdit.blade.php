<!DOCTYPE html>
<?php
$page = "Users";
?>
@extends('layouts.auth') @section('content')
<!--row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit {{ $author->author }}
                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-down"></em></span></div>
            <div class="panel-body">
                {!! Form::open(array('route'=>['authors.update',$author->id], 'files' => true,'method' => 'put'))!!} {{Form::label('author','Name (Full):')}} {{Form::text('author',$author->author,array('class'=>'form-control'))}}
                <br/> {{Form::label('year','Year:')}}
                <select class="form-control" name="year">
            <?php 
            for ($x=date("Y")-1;$x<=date("Y")+1;$x++){
                echo('<option value="'.($x).'/'.($x+1).'">'.($x).'/'.($x+1).'</option>');
            }
            ?>
        </select>
                <br/> {{Form::label('position','Position:')}} {{Form::text('position',$author->position,array('class'=>'form-control'))}}
                <br/> {{Form::label('bio','Bio (Max 400 characters):')}} {{Form::textarea('bio',$author->bio,array('class'=>'form-control'))}}
                <br/> {{Form::file('profilePic',array('class'=>'form-control img-upload'))}}
                <br/> {{Form::submit('Update User', array('class'=>'btn btn-primary'))}} {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit User Info (Read Me!)
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