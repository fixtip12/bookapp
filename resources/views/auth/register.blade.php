@extends('layouts.app')

@section('content')
<div class="container jumbotron-extend text-white pb-4">
    <div class="text-center">
        <h1 class="display-5">会員登録</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
            <div class="form-group">
                {!! Form::label('name', 'お名前') !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Eメール') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'パスワード') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'パスワード（再入力）') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('この内容で会員登録する', ['class' => 'btn btn-success btn-lg btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection