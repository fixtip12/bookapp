@foreach ($books as $book)
<div class="card mb-3 mt-2" style="max-width: 540px">
  <div class="row no-gutters">
    <div class="col-md-4 my-auto">
      <img class="card-img" src="{{ $book->image_path }}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">本のタイトル:{{ $book->title }}</h5>
        <p>感想:{{ $book->impression }}</p>
        <p>投稿日:{{ $book->created_at }}</p>
        @if (Auth::id() == $book->user_id)
        <p> {!! link_to_route('books.show', '詳細を見る', ['id' => $book->id], ['class' => 'btn btn-primary']) !!}</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endforeach