$(document).ready(function() {
  /**
   * click update btnUser 
   */
  $("#btnUpd").click(function() {
    post_data = {

      /**
       * updating mineral
       */
      'btn'              : 'update',
      'id'               : $('input[name=id]').val(),
      'mineral'          : $('input[name=mineral]').val(),
      'formula'          : $('input[name=formula]').val()
    };

    /**
     * sendet Ajax Posts an Server
     * JSON Daten holen und Benachrichtigung im Formular anzeigen
     * nach erfolgreichen versenden Benachrichtigung anzeigen
     * und Eingabefelder reseten  
     */
    $.post('ajax/upd_mineral.php', post_data, function(response){
      if(response.type === 'success'){
        //set new profile
        $("#mineral").html('<p id="user"><b>Mineralienname: </b>'+response.mineral+'</p>');
        $("#formula").html('<p id="user"><b>Chemische Formel: </b>'+response.formula+'</p>');
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