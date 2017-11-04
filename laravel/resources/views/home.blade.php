@extends('layouts.app') @section('content')

<div class="container-fluid post-page">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h2>Welcome {{ Auth::user()->name }}</h2>
                <hr/>
                <div id="quickStart" class="container">
                    <h3><strong>Quick Start</strong></h3>
                    <div style="text-align:left;" class="row">
                        <div class="col-sm-4">
                            <a href="/new/post">
                                <div class="btn">New Post</div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="/new/user">
                                <div class="btn">New Executive</div>
                            </a>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="/edit/post">
                                <div class="btn">Manage Posts</div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="/edit/user">
                                <div class="btn">Manage Users</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
