@extends('layouts.app')

@section('content')

    <h1>id: {{ $book->id }} のメッセージ編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'メッセージ:') !!}
                    {!! Form::text('impression', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection