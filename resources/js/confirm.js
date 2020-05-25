$(function () {

  // 応募確認
  $('.js-apply-work').click(function () {
    if (confirm('この案件に応募します。よろしいですか？')) {
    } else {
      return false;
    }
  })

  // 応募取り消し確認
  $('.js-cancel-apply').click(function () {
    if (confirm('これまでのメッセージも同時に削除します。本当に取り消しますか？')) {
    } else {
      return false;
    }
  })

  // 案件削除確認
  $('.js-delete-work').click(function () {
    if (confirm('この案件への全ての応募者とのメッセージも削除されます。本当に削除しますか？')) {
    } else {
      return false;
    }
  })

  // 案件成約確認
  $('.js-close-work').click(function () {
    if (confirm('成約済みから元に戻すことはできず、検索結果にも表示されなくなります。また、この案件への全ての応募者とのメッセージも削除されます。よろしいですか？')) {
    } else {
      return false;
    }
  })
});