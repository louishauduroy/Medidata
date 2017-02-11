$(document).ready(function() {

  clear_input();

  $('.btn-login').click(function() {
    var email = $('#email').val();
    var mdp = $('#password').val();

    $.post("php/connexion.php", { email: email, mdp: mdp })
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

    clear_input();
  });

  function clear_input(){
    $('#email').val('');
    $('#password').val('');
  }



});
