@extends('layouts.app') @section('content') @include('messages')
<div style="overflow:auto;" class="container-fluid post-page">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h2>New Executive</h2>
                <hr/>
                <div class="post-test">
                    {!! Form::open(array('route'=>'authors.store', 'files' => true))!!} {{Form::label('author','Name (Full):')}} {{Form::text('author',null,array('class'=>'form-control'))}}
                    <br/> {{Form::label('year','Year:')}}
                    <select class="form-control" name="year">
                        <?php 
                        for ($x=date("Y")-1;$x<=date("Y")+1;$x++){
                            echo('<option value="'.($x).'/'.($x+1).'">'.($x).'/'.($x+1).'</option>');
                        }
                        ?>
                    </select>
                    <br/> {{Form::label('position','Position:')}} {{Form::text('position',null,array('class'=>'form-control'))}}
                    <br/> {{Form::label('bio','Bio (Max 400 characters):')}} {{Form::textarea('bio',null,array('class'=>'form-control'))}}
                    <br/> {{Form::file('profilePic',array('class'=>'form-control img-upload'))}}
                    <br/> {{Form::submit('Create User', array('class'=>'btn'))}} {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
