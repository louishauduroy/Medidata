$(document).ready(function() {
  var email = "";
  var mdp = "";

  $('.btn-login').click(function() {
    email = $('#email').val();
    mdp = $('#password').val();

    $.post("../../phpBDD/connexion.php", { email: email, mdp: mdp })
      .done(function(data) {
        $('.login_message').text(data);
      });
  });



});
