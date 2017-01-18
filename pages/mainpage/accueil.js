$(document).ready(function() {

  $('.logout').click(function() {
    $.post("../../phpBDD/Logout.php", false);
    window.location = '../login/login.php';
  });

  $.post("../../phpBDD/userlogged.php", false)
    .done(function(data) {
      $('.username').html(data+' <b class="caret"></b>');
    });

});
