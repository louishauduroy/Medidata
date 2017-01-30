$(document).ready(function() {

  $.post("php/getChamps.php", false)
    .done(function(data) {
      $('.champs').html(data);
  });

});
