$(function () {
  $('.js-header-trigger').on('click', function () {
    $('.c-menuTrigger__bar').toggleClass('isActive');
    $('.js-header-toggle-target').toggleClass('isActive');
  });
});