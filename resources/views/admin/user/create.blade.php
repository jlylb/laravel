@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['url' => 'admin/user','class'=>'form','method'=>'post']) !!}


            {{ Form::bsText('name') }}

            {{ Form::bsText('email') }}

            {{ Form::bsText('password','password') }}


            <div class="form-group">
                {!! Form::submit('保存', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            

                
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection