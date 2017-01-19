$(document).ready(function() {

  $('.btn-mdp').click(function() {
    var email = $('#email').val();
    var Amdp = $('#Amdp').val();
    var Nmdp = $('#Nmdp').val();
    var Nmdp2 = $('#Nmdp2').val();
    $('.email_message').text("");
    $('.username_message').text("");

    $.post("../../phpBDD/changemdp.php", { email: email, Amdp: Amdp, Nmdp :Nmdp, Nmdp2 :Nmdp2 })
      .done(function(data) {
        if(data=='Changement mot de passe réussi !'){
          $('.mdp_message').css('color','#0BDA51');
        }
        else { $('.mdp_message').css('color','red'); }
          $('.mdp_message').text(data);
      });
    $('#email').val("");
    $('#Amdp').val("");
    $('#Nmdp').val("");
    $('#Nmdp2').val("");
  });

  $('.btn-email').click(function() {
    var Nemail = $('#Nemail').val();
    var Aemail = $('#Aemail').val();
    var mdp = $('#mdp').val();
    $('.mdp_message').text("");
    $('.username_message').text("");

    $.post("../../phpBDD/changemail.php", { Nemail: Nemail, Aemail: Aemail, mdp :mdp })
      .done(function(data) {
        if(data=='Changement email réussi !'){
          $('.email_message').css('color','#0BDA51');
        }
        else { $('.email_message').css('color','red'); }
          $('.email_message').text(data);
      });
    $('#Nemail').val("");
    $('#Aemail').val("");
    $('#mdp').val("");
  });

  $('.btn-username').click(function() {
    var email = $('#email2').val();
    var name = $('#username2').val();
    var mdp = $('#mdp2').val();
    $('.email_message').text("");
    $('.mdp_message').text("");

    $.post("../../phpBDD/changename.php", { email: email, name: name, mdp :mdp })
      .done(function(data) {
        if(data=='Changement username réussi !'){
          $('.username_message').css('color','#0BDA51');
          $.post("../../phpBDD/userlogged.php", false)
            .done(function(data) {
              $('.username').html(data+' <b class="caret"></b>');
            })
        }
        else { $('.username_message').css('color','red'); }
          $('.username_message').text(data);
      });
    $('#email2').val("");
    $('#username2').val("");
    $('#mdp2').val("");
  });

});
