$(document).ready(function() {

  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");

      $.post("getChamps.php", false)
        .done(function(data) {
          $('.sidebar-nav').html(data);
      });
  });

});
