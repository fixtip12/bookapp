<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                <button type="submit" class="btn btn-success" id="deletebtn" name="deletebtn" >はい</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.delete-confirm').click(function(){
      $(".modal-body").text() = val( $(this).val();
    });
</script>