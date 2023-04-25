/* global fileupload */

$(document).ready(function() {
  /**
   * click update btnUser 
   */
  $("#btnUpd").click(function() {
      post_data = {

         /**
         *  updating specimen
         */
        'btn'           : 'update',
        'id'            : $('input[name=id]').val(),
        'type'          : $("input[name='type']:checked").val(),
        'title'         : $('input[name=title]').val(),
        'id_mineral'    : $('select#sel_mineral :selected').val(),
        'mineral'       : $('select#sel_mineral :selected').text(),
        'date'          : $('input[name=date]').val(),
        'location'      : $('select#sel_local :selected').val(),
        'number'        : $('input[name=number]').val(),
        'description'   : $('#description').val(),
        'attachment'    : $('#attachment').attr('value'),
        'upload'        : uploadFile(),
        'imgVal'        : $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
      };

      /**
       * sendet Ajax Posts an Server
       * JSON Daten holen und Benachrichtigung im Formular anzeigen
       * nach erfolgreichen versenden Benachrichtigung anzeigen
       * und Eingabefelder reseten  
       */
      $.post('ajax/upd_specimen.php', post_data, function(response){
          if(response.type === 'success'){ 
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