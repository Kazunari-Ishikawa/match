$(function () {
  $('.js-header-trigger').on('click', function () {
    $('.js-trigger-bar').toggleClass('isActive');
    $('.js-header-toggle-target').toggleClass('isActive');
  });
});