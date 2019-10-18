@foreach ($books as $book)
<div class="card-deck text-center">
  <div class="card">
    <div class="card-header">
    @if ($book->image_path)
      <img src="{{ $book->image_path }}" style="width: 200px;height: 200px">
    @endif
    </div>
    <div class="card-body">
      <div class="card-title">
        <p>タイトル:{{ $book->title }}</p>
        <p>感想:{{ $book->impression }}</p>
      </div>
      <div class="card-text">
      @if (Auth::id() == $book->user_id)
        <p> {!! link_to_route('books.show', '詳細を見る', ['id' => $book->id], ['class' => 'btn btn-primary']) !!}</p>
      @endif
      </div>
    </div>
  </div>
</div>
@endforeach