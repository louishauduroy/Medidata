$(document).ready(function() {

  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");

      $.post("getChamps.php", false)
        .done(function(data) {
          $('.sidebar-nav').html(data);
      });

  })

  $("#searchbutton").click(function(e) {
    var values = {};
    var valuesname = {};
    var lien = "phpinfosbdd.php";
    var premier = true;

    $('.data').each(function() {
      if (this.value != ""){
          values[this.id] = this.value;
          console.log(this.id + "=" + values[this.id]);
          if (premier == true)
          {
            lien = lien + "?" + this.id + "=" + this.value;
            premier = false;
          }
          else {
            lien = lien + "&&" + this.id + "=" + this.value + "";
          }
      }
    });
    console.log(lien);
    console.log("coucou");


    $( "#zone_resultats" ).load(lien);
    $("#wrapper").toggleClass("toggled");

  });


});
