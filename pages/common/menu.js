$(document).ready(function() {


  $('.logout').click(function() {
    $.post("../../phpBDD/logout.php", false);
    window.location = '../login/login.php';
  });

  $.post("../../phpBDD/admin.php", false)
    .done(function(data) {
      if(data == 'admin'){
        $('.dropdown-menu').prepend('<li><a class="naccount" href="../newaccount/createAccount.php">Gestion Admin</a></li>')
      }
      else {
        console.log('hoho');
      }
    });

});
