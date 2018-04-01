<?php $page = "Dashboard"; ?>
@extends('layouts.auth') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Site Traffic Overview
                <ul class="pull-right panel-settings panel-button-tab-right">
                    <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                        <em class="fa fa-cogs"></em>
                    </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <ul class="dropdown-settings">
                                    <li><a href="https://www.google.com/analytics/#?modal_active=none">
                                        <em class="fa fa-cog"></em> Google Analytics
                                    </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body">
                <div id="embed-api-auth-container"></div>
                <div id="chart-container"></div>
                <div id="view-selector-container"></div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->
@endsection