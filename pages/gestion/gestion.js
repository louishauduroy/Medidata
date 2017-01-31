$(document).ready(function() {

  $.post("php/getChamps.php", false)
    .done(function(data) {
      $('#liste').html(data);
  });

  $('#btn-add').click(function() {
    var champs = $('#nameAdd').val();
    var type = $('.selectpicker').find("option:selected").text();
    $('.del_message').text("");

    $.post("php/addChamps.php", { champs: champs, type: type })
      .done(function(data) {
        console.log(data);
        if(data == 'Champ ajouté !'){
          $('.add_message').css('color','#0BDA51');
          $('.add_message').text(data);
          $.post("php/getChamps.php", false)
            .done(function(data) {
              $('#liste').html(data);
          });
        }
        else {
          $('.add_message').css('color','red');
          $('.add_message').text(data);
        }
      });

    $('#nameAdd').val("");
  });


  $('#btn-del').click(function() {
    var champs = $('#nameDel').val();
    $('.add_message').text("");

    $.post("php/delChamps.php", { champs: champs })
      .done(function(data) {
        if(data == 'Champ supprimé !'){
          $('.del_message').css('color','#0BDA51');
          $('.del_message').text(data);
          $.post("php/getChamps.php", false)
            .done(function(data) {
              $('#liste').html(data);
          });
        }
        else {
          $('.del_message').css('color','red');
          $('.del_message').text(data);
        }
      });
    $('#nameDel').val("");
  });

});
