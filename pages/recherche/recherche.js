$(document).ready(function() {
  $( "#zone_resultats" ).load("php/phpinfosbdd.php?");

  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");

      $.post("php/getChamps.php", false)
        .done(function(data) {
          $('.sidebar-nav').html(data);
      });

  })

  $("#searchbutton").click(function(e) {
    var values = {};
    var valuesname = {};
    var lien = "php/phpinfosbdd.php";
    var premier = true;

    $('.data').each(function() {
      if (this.value != ""){
          var value = encodeURIComponent(this.value.trim())
          values[this.id] = value;
          if (premier == true)
          {
            lien = lien + "?" + this.id + "=" + value;
            premier = false;
          }
          else {
            lien = lien + "&&" + this.id + "=" + value + "";
          }
      }
    });
    console.log(lien);


    $( "#zone_resultats" ).load(lien);
    $("#wrapper").toggleClass("toggled");

  });


});
