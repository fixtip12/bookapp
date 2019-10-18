@foreach ($books as $book)
<div class="card-deck text-center">
  <div class="card">
    <div class="card-header">
      <img src="{{ $book->image_path }}">
    </div>
    <div class="card-body">
      <div class="card-title">
        <p>タイトル:{{ $book->title }}</p>
        <p>感想:{{ $book->impression }}</p>
      </div>
      <div class="card-text">
        <p> {!! link_to_route('books.show', '詳細を見る', ['id' => $book->id], ['class' => 'btn btn-primary']) !!}</p>
      </div>
    </div>
  </div>
</div>
@endforeach