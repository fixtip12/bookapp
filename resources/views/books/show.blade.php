@extends('layouts.app')

@section('content')

    <h1>登録ID:{{ $book->id }} の書籍詳細ページ</h1>

    <div class="card my-3" style="width: 18rem">
    <img src="{{ $book->image_path}}" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">タイトル:{{ $book->title }}</h5>
        <p>感想:{{ $book->impression }}</p>
    </div>
    </div>


    {!! link_to_route('books.edit', 'このメッセージを編集', ['id' => $book->id], ['class' => 'btn btn-light']) !!}

    {!! Form::model($book, ['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@endsection