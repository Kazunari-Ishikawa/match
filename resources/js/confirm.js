$(function () {

  // 応募取り消し確認
  $('#js-cancel-apply').click(function () {
    if (confirm('これまでのメッセージも同時に削除します。本当に取り消しますか？')) {
    } else {
      return false;
    }
  })
});