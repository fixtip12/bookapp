@extends('layouts.app')

@section('content')
<div class="container jumbotron-extend text-white pt-5">
    <div class="text-center">
        <h1  class="display-4">ログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Eメール') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-success btn-lg btn-block']) !!}
            {!! Form::close() !!}
            <p class="mt-2">アカウントをお持ちでない場合はこちら {!! link_to_route('signup.get', '会員登録') !!}</p>
        </div>
    </div>
</div>
@endsection