@extends('layouts.app') @section('content')
<div class="container-fluid post post-full">
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '255764971238848',
                xfbml: true,
                version: 'v2.6'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h2 id="page-title" style="margin-bottom:20px;padding:10px;">Contact The Lyon</h2>
        </div>
        <div class="col-sm-12">
                <?php
            if(isset($sent)){
                echo('<div class="alert alert-success" role="alert"><span><strong>Message Sent!</strong></span></div>');
            }
            ?>
            {{Form::open([ 'method' => 'POST', 'route' => 'posts.store' ])}}
            <div class="contact">
                <p>Send us an email:</p>
                <hr class="nomargin" />
                <input name="name" class="form-control" placeholder="Name" type="text">
                <input name="email" class="form-control" placeholder="Email" type="email">
                <textarea name="message" class="form-control" placeholder="Message"></textarea>
                <input type="submit" class="btn" value="Send">
            </div>
            {{Form::close()}}
            <br/>
            <br/>
        </div>
    </div>
</div>
@endsection
