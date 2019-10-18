@extends('layouts.app')

@section('content')

    <h1>メッセージ新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => 'books.store','enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('impression', '感想:') !!}
                    {!! Form::text('impression', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image_path', '画像:') !!}
                    {{Form::file('image_path')}}
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection