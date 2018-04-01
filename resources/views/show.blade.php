@extends('layouts.app') @section('content')
<?php $path = asset('img/posts/'.$post->id.'/head.jpg') ?>
<div class="container-fluid post-page post-full">
            <div class="head-img" style='background-image: url("{{$path}}");'></div>
            <h1>
                <?php echo $post->title;?>
            </h1>
            <div class="text-container">
                <div class="row">
                    <div class="col-sm-6">
                        <p id="timestamp" style="line-height:60px;">{{date_format($post->updated_at,"Y/m/d")}} <?php if($post->created_at != $post->updated_at){echo "(Updated)";} ?></p>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <img src="{{asset('img/staff/'.$post->author.'.jpg')}}" id="profile">
                        <a href="{{'/authors/'.\App\Http\Controllers\AuthorController::nameFind($post->author)}}">
                            <h3>{{$post -> author}}</h3>
                        </a>
                    </div>
                </div>
                <hr/>
                <?php echo $post->body; ?>
            </div>
</div>
@endsection
