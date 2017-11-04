@extends('layouts.app') @section('content')
<div class="container-fluid author">
    <div class="row">
        <div id="text-area" class="col-sm-12 col-md-8">
            <h1>
                <?php echo $author->author." | ".$author->position ?>
            </h1>
            <div class="bio-container">
                <p>
                    <?php echo $author->bio; ?>
                </p>
            </div>
        </div>
        <div style="text-align:center;" class="col-sm-12 col-md-4">
            <div class="img-container">
                <img src="{{asset('img/staff/'.$author->author.'.jpg')}}" id="authorProfile">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid post post-full">
    <div style="text-align:center;" class="row">
        @foreach($post as $post)
        @if ($post->author == $author->author AND $post->sport != "playlist")
        <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="post-tab">
                <img src="{{asset('img/posts/'.$post->id.'/head.jpg')}}">
                <h1>{{$post->title}}</h1>
                <a href="{{'/authors/'.\App\Http\Controllers\AuthorController::nameFind($post->author)}}">
                    <p>{{$post->author}}</p>
                </a>
                <div class="intro-container">
                    <p id="intro">{{$post->intro}}</p>
                </div>
                <a href="{{'/posts/'.$post->id}}">
                        <button class="btn">Read Article</button>
                    </a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
