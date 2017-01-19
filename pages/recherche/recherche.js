$(document).ready(function() {

  // $("#menu-toggle").click(function(e) {
  //     e.preventDefault();
  //     $("#wrapper").toggleClass("toggled");
  //
  //     $.post("getChamps.php", false)
  //       .done(function(data) {
  //         $('.sidebar-nav').html(data);
  //     });
  //
  // });
  //
  // $.post("getChamps.php", false)
  //   .done(function(data) {
  //     $('.sidebar-nav').html(data);
  // });

  $("#searchbutton").click(function(e) {
    $( "#zone_resultats" ).load( "phpinfosbdd.php?id_patient=13" );
    var myParam;
  });


});
