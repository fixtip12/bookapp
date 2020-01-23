@extends('layouts.app')

@section('content')
@if (Auth::check())
<div class="row">
    <aside class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ Auth::user()->name }}</h3>
            </div>
            <div class="card-body">
                <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
            </div>
        </div>
    </aside>
    <div class="col-sm-8">
        @if (count($books) > 0)
        @include('books.books', ['books' => $books])
        @endif
        {{ $books->links('pagination::bootstrap-4') }}
        @if (Auth::id() == $user->id)
        {!! link_to_route('books.create', '読んだ本を登録する', [], ['class' => 'btn btn-success btn-lg']) !!}
        @endif
        <a href="/form">bootstrap</a>
        <a href="/form?home=大阪">大阪</a>
        
    </div>
</div>
@else
<main>
    <div class="block_bg pb-3">
        <div class="top-child text-center text-white">

            <h1 class="mb-3">自分だけの本棚を作ろう</h1>
            <p>
                今日から始める読書週間。<br>
                日々の生活をもっと豊かに。
            </p>
            <p>
                {!! link_to_route('signup.get', '読書記録を始める', [], ['class' => 'btn btn-lg btn-success']) !!}
            </p>
        </div>
    </div>
</main>
@endif
@endsection