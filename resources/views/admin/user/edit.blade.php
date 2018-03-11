@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            {!! Form::model($user, ['route' => ['user.update', $user],'method' => 'put']) !!}
            
          

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