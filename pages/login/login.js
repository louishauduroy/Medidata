$(document).ready(function() {
  var email = "";
  var mdp = "";

  $('#email').val("");

  $('.btn-login').click(function() {
    email = $('#email').val();
    mdp = $('#password').val();

    $.post("../../phpBDD/connexion.php", { email: email, mdp: mdp })
      .done(function(data) {
        $('.login_message').text(data);
        if(data == 'Vous êtes connecté !'){
          window.location = '../mainpage/accueil.php';
        }
      });

    $.post("../../phpBDD/userlogged.php", false)
      .done(function(data) {
        if(data == ''){
        } else {
          window.location = '../mainpage/accueil.php';
        }
      });
  });



});
