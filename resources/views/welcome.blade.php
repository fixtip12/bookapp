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
            </div>
        </div>
    @else
<div class="jumbotron jumbotron-extend">
    <div class="container-fluid jumbotron-container text-white">
        <h1 class="site-name display-3">自分だけの本棚を作ろう</h1>
        <div class="btn-toolbar">
         <div class="btn-group pr-5">
          {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-success']) !!}
         </div>
         <div class="btn-group">
          {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-success']) !!}
         </div>
        </div>
    </div>
</div>
@endif
@endsection