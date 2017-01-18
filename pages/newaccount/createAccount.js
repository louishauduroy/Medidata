$(document).ready(function() {
  var email = "";
  var mdp = "";
  var mdp2 = "";
  var username = "";

  $('#email').val("");
  $('#username').val("");

  $('.btn-login').click(function() {
    email = $('#email').val();
    mdp = $('#password').val();
    mdp2 = $('#password2').val();
    username = $('#username').val();

    if ( ($.trim( email ) == '')  || ($.trim( mdp ) == '') || ($.trim( mdp2 ) == '') || ($.trim( username ) == '')){
      $('.login_message').text('Veuillez entrer les informations');
    }
    else {
      if (mdp == mdp2){
        $.post("newAccount.php", { email: email, mdp: mdp, username: username })
          .done(function(data) {
            $('.login_message').text(data);
          });
      }else { $('.login_message').text('Confirmez les même mot de passe'); }
    }
  });



});
