$(document).ready(function() {
  var email = "";
  var mdp = "";

  $('#email').val("");

  $('.btn-login').click(function() {
    email = $('#email').val();
    mdp = $('#password').val();

    $.post("../../phpBDD/connexion.php", { email: email, mdp: mdp })
      .done(function(data) {
        if(data == 'Vous êtes connecté !'){
          $('.login_message').css('color','#0BDA51');
          window.location = '../mainpage/accueil.php';
        }
        else {
          $('.login_message').css('color','red');
        }
        $('.login_message').text(data);
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
