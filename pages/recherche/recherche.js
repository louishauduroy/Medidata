$(document).ready(function() {
  $( "#zone_resultats" ).load("php/phpinfosbdd.php?");
  $( "#resultat_requete" ).load("php/nb_resultats.php?");

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
    var lien2 = "php/nb_resultats.php";
    var premier = true;

    $('.data').each(function() {
      if (this.value != ""){
          var value = (this.value).replace(/ /g,"%20");
          values[this.id] = value;
          if (premier == true)
          {
            lien = lien + "?" + this.id + "=" + value;
            lien2 = lien2 + "?" + this.id + "=" + value;
            premier = false;
          }
          else {
            lien = lien + "&&" + this.id + "=" + value + "";
            lien2 = lien2 + "&&" + this.id + "=" + value + "";
          }
      }
    });
    console.log(lien);
    console.log(lien2);

    $( "#zone_resultats" ).load(lien);
    $( "#resultat_requete" ).load(lien2);
    $("#wrapper").toggleClass("toggled");
  });


});
