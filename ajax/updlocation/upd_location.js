$(document).ready(function() {
  /**
   * click update btnUser 
   */
  $("#btnUpd").click(function() {
    post_data = {

      /**
       * updating location
       */
      'btn'              : 'update',
      'id'               : $('input[name=id]').val(),
      'location'         : $('input[name=location]').val(),
      'country'          : $('input[name=country]').val()
    };

    /**
     * sendet Ajax Posts an Server
     * JSON Daten holen und Benachrichtigung im Formular anzeigen
     * nach erfolgreichen versenden Benachrichtigung anzeigen
     * und Eingabefelder reseten  
     */
    $.post('ajax/upd_location.php', post_data, function(response){
      if(response.type === 'success'){
        //set new profile
        $("#mineral").html('<p id="user"><b>Fundort: </b>'+response.location+'</p>');
        $("#formula").html('<p id="user"><b>Land, Bezirk. Region: </b>'+response.country+'</p>');
        //reset inputs
        $('.clr').val('');
      }
      $.notify({
        title: response.title,
        message: response.text,
        icon: response.icon 
      },{
        type: response.alert
      });
    }, 'json');
  });
});