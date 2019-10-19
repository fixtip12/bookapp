@extends('layouts.app')

@section('content')


<h1 class="text-white">読んだ本を編集する</h1>

<div class="row">
  <div class="col-6">
    {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put','enctype' => 'multipart/form-data']) !!}

    <div class="form-group text-white">
      {!! Form::label('title', '本のタイトル') !!}
      {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group text-white">
      {!! Form::label('impression', '感想・レビュー:') !!}
      {!! Form::text('impression', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group text-white">
      {!! Form::label('image_path', '本の表紙:') !!}
      {{Form::file('image_path')}}
    </div>

    {!! Form::submit('更新する', ['class' => 'btn btn-light']) !!}

    {!! Form::close() !!}
  </div>
</div>
@endsection