$(document).ready(function() {

  $.post("getChamps.php", false)
    .done(function(data) {
      $('#liste').html(data);
  });

  $('#btn-add').click(function() {
    var champs = $('#nameAdd').val();
    $('.del_message').text("");

    $.post("addChamps.php", { champs: champs })
      .done(function(data) {
        if(data == "Ce champs existe déja!"){
          $('.add_message').css('color','red');
          $('.add_message').text(data);
        }
        else {
          $('.add_message').text(data);
          $('.add_message').css('color','#0BDA51');
          $.post("getChamps.php", false)
            .done(function(data) {
              $('#liste').html(data);
          });
        }
      });

    $('#nameAdd').val("");
  });


  $('#btn-del').click(function() {
    var champs = $('#nameDel').val();
    $('.add_message').text("");

    $.post("delChamps.php", { champs: champs })
      .done(function(data) {
        if(data == "Ce champs n'existe pas!"){
          $('.del_message').css('color','red');
          $('.del_message').text(data);
        }
        else {
          $('.del_message').text(data);
          $('.del_message').css('color','#0BDA51');
          $.post("getChamps.php", false)
            .done(function(data) {
              $('#liste').html(data);
          });
        }
      });
    $('#nameDel').val("");
  });

});
