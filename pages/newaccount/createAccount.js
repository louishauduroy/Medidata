$(document).ready(function() {

  clear_input();
  maj_utilisateurs();

  $('.btn-new').click(function() {
    var email = $('#email').val();
    var mdp = $('#password').val();
    var mdp2 = $('#password2').val();
    var username = $('#username').val();

    if ( ($.trim( email ) == '')  || ($.trim( mdp ) == '') || ($.trim( mdp2 ) == '') || ($.trim( username ) == '')){
      $('.login_message').css('color','red');
      $('.login_message').text('Veuillez entrer les informations');
    }
    else {
      if (mdp == mdp2){
        $.post("php/newAccount.php", { email: email, mdp: mdp, username: username })
          .done(function(data) {
            if(data=='Creation reussie') { $('.login_message').css('color','#0BDA51'); }
            else { $('.login_message').css('color','red'); }
            $('.login_message').text(data);
          });
      }else {
        $('.login_message').css('color','red');
        $('.login_message').text('Confirmez les même mot de passe');
      }
    }

    clear_input();
    maj_utilisateurs();
  });


  $('.btn-del').click(function() {
    var email1 = $('#email_supp1').val();
    var email2 = $('#email_supp2').val();
    var email_admin = $('#email_supp_admin').val();
    var mdp_admin = $('#password_supp').val();

    if ( ($.trim( email1 ) == '')  || ($.trim( email2 ) == '') || ($.trim( email_admin ) == '') || ($.trim( mdp_admin ) == '')){
      $('.del_message').css('color','red');
      $('.del_message').text('Veuillez entrer les informations');
    }
    else {
      $.post("php/delAccount.php", { email1: email1, email2: email2, email_admin: email_admin, mdp_admin: mdp_admin })
        .done(function(data) {
          if(data=='Suppression réussi') { $('.del_message').css('color','#0BDA51'); }
          else { $('.del_message').css('color','red'); }
          $('.del_message').text(data);
        });
    }

    clear_input();
    maj_utilisateurs();
  });



  function clear_input(){
    $('#email').val('');
    $('#username').val('');
    $('#password').val('');
    $('#password2').val('');

    $('#email_supp1').val('');
    $('#email_supp2').val('');
    $('#email_supp_admin').val('');
    $('#password_supp').val('');
  }

  function maj_utilisateurs(){
    $.post("php/utilisateurs.php")
      .done(function(data) {
        $('#maj_user').html(data);
      });
  }


});
