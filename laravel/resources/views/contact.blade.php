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
        <div style="text-align:center;" class="col-sm-12">
            <div class="fb-page" data-href="https://www.facebook.com/torontohackerclub/" data-tabs="messages" data-width="1000" data-height="300" data-small-header="true">
                <div class="fb-xfbml-parse-ignore">
                    <blockquote></blockquote>
                </div>
            </div>
            <br/>
            <br/>
            <p>Or send us an email at: <a href="mailto:mailtelenko@gmail.com">email</a></p>
        </div>
    </div>
</div>
@endsection
