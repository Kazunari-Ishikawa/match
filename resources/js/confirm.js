$(function () {

  // 応募取り消し確認
  $('#js-cancel-apply').click(function () {
    if (confirm('これまでのメッセージも同時に削除します。本当に取り消しますか？')) {
    } else {
      return false;
    }
  })

  // 案件削除確認
  $('#js-delete-work').click(function () {
    if (confirm('この案件への全ての応募者とのメッセージも削除されます。本当に削除しますか？')) {
    } else {
      return false;
    }
  })

  // 案件成約確認
  $('#js-close-work').click(function () {
    if (confirm('この案件への全ての応募者とのメッセージも削除されます。また、成約済み案件は検索結果には表示されません。よろしいですか？')) {
    } else {
      return false;
    }
  })
});