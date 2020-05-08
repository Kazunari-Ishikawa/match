$(function () {
  $('.js-menu__tab').on('click', function () {
    $(this).next('.js-menu__target').slideToggle();
  })
});