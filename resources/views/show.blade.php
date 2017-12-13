@extends('layouts.app') @section('content')
<div class="container-fluid post-page post-full">
    <div class="row">
        <div class="col-sm-12 col-md-10 mx-auto">
            <img class="head-img" src="{{asset('img/posts/'.$post->id.'/head.jpg')}}">
            <h1>
                <?php echo $post->title;?>
            </h1>
            <div class="text-container">
                <hr/>
                <div class="row">
                    <div class="col-sm-6">
                        <p id="timestamp" style="line-height:60px;">{{$post->created_at}}</p>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <img src="{{asset('img/staff/'.$post->author.'.jpg')}}" id="profile">
                        <a href="{{'/authors/'.\App\Http\Controllers\AuthorController::nameFind($post->author)}}">
                            <h3>{{ $post -> author}}</h3>
                        </a>
                    </div>
                </div>
                <hr/>
                <?php echo $post->body; ?>
            </div>
        </div>
    </div>
</div>
@endsection
