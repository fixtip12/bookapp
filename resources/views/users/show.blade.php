@extends('layouts.app')

@section('content')
<div class="row ">
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
        <ul class="nav nav-tabs nav-justified mb-3 mt-1">
            <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="h4 nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">読書冊数<span class="badge badge-secondary">{{ $count_books }}</span></a></li>
        </ul>
        @if (count($books) > 0)
        @include('books.books', ['books' => $books])
        {{ $books->links('pagination::bootstrap-4') }}
        @endif
        @if (Auth::id() == $user->id)
        {!! link_to_route('books.create', '読んだ本を登録する', [], ['class' => 'btn btn-success btn-lg']) !!}
        @endif
    </div>
</div>
@endsection