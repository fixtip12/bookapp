@extends('layouts.app')

@section('content')

    <h1 class="text-white">読んだ本を登録する</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => 'books.store','enctype' => 'multipart/form-data']) !!}

                <div class="form-group text-white">
                    {!! Form::label('title', '本タイトル:') !!}
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
        
                <button type="button" data-toggle="modal" data-target="#modal_delete" data-title="登録しますか？" data-url="book/store">削除</button>

                <div class="modal" tabindex="-1" role="dialog" id="modal_delete">
    <form role="form" class="form-inline" method="POST" action="">
      {{ csrf_field() }}
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
            <button type="submit" class="btn btn-danger">削除</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script>
    $('#modal_delete').on('shown.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var title = button.data('title');
      var url = button.data('url');
      var modal = $(this);
      modal.find('.modal-body p').eq(0).text(title);
      modal.find('form').attr('action',url);
    });
  </script>
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection