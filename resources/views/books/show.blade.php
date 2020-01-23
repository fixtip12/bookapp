@extends('layouts.app')

@section('content')

<h1 class="text-white">{{ $book->title }}</h1>

<div class="card my-3" style="width: 18rem">
    <img src="{{ $book->image_path}}" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">本のタイトル:{{ $book->title }}</h5>
        <p>感想:{{ $book->impression }}</p>
        <p>投稿日:{{ $book->created_at }}</p>
    </div>
</div>

{!! link_to_route('books.edit', '本のタイトル・感想を編集', ['id' => $book->id], ['class' => 'btn btn-light']) !!}

{!! Form::model($book, ['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
<button type="button" class="delete-confirm btn btn-success" value="{{ $book->id}}" data-toggle="modal" data-target="#confirm-delete">削除</button>
@include('commons.modal')
{!! Form::close() !!}


@endsection