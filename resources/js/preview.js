$(function () {
  $('.js-preview-input').change(function (e) {
    console.log('change.');
    var file = e.target.files[0];
    var reader = new FileReader();

    // 画像ファイルでない場合false
    if (file.type.indexOf('image') < 0) {
      alert('画像ファイルを選択してください。');
      return false;
    }

    // 画像を設定する
    reader.onload = (function (file) {
      return function (e) {
        $('.js-preview').attr("src", e.target.result);
        $('.js-preview').attr('title', file.name);
      };
    })(file);

    reader.readAsDataURL(file);
    console.log('OK.');

  });
});