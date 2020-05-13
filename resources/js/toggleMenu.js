$(function () {
  $('.js-header-trigger').on('click', function () {
    $(this).toggleClass('active');
    $('.js-header-toggle-target').toggleClass('active');
  });
  // $('.c-spMenu__link').on('click', function () {
  //   $('.js-header-toggle-target').removeClass('active');
  // })
});