

$(document).ready(function () {
  $('#menuToggle').on('click', function () {
    $('#mobileMenu').stop(true, true).slideToggle(300);
  });
});