@extends('layouts.app')

@section('content')
<div class="row">
    <aside class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
            </div>
        </div>
    </aside>
    <div class="col-sm-8">
        <ul class="nav nav-tabs nav-justified mb-3">
            <li class="nav-item"><a href="#" class="nav-link">TimeLine</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
        </ul>
        @if (Auth::id() == $user->id)
        {!! link_to_route('books.create', '新規メッセージの投稿', [], ['class' => 'btn btn-primary']) !!}
        @endif
        @if (count($books) > 0)
        @include('books.books', ['books' => $books])
        {{ $books->links('pagination::bootstrap-4') }}
        @endif
    </div>

</div>
@endsection