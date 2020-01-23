@extends('layouts.app')
@section('title')|資料請求|{{ session('home')}}@endsection

@section('content')

    <h1 class="text-white">支店確認</h1>

        <label for="name" class="text-white">名前</label>
        <input type="text" id="name" name="name" value="{{ session('name') }}">
        <label for="address" class="text-white">住所</label>
        <input type="text" id="address" name="address" value="{{ session('address') }}">
        <a href="/form">戻る</a>

@endsection