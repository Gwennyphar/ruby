/* global fileupload */

$(document).ready(function() {
  /**
   * click insert specimen 
   */
  $("#btnSave").click(function() {

    post_data = {
      /**
       *  adding specimen
       */
      'btn'           : 'btnSave',
      'type'          : $("input[name='type']:checked").val(),
      'title'         : $('input[name=title]').val(),
      'mineral'       : $('select#sel_mineral :selected').val(),
      'date'          : $('input[name=date]').val(),
      'location'      : $('select#sel_local :selected').val(),
      'number'        : $('input[name=number]').val(),
      'description'   : $('#description').val(),
      'upload'        : uploadFile(),
      'imgVal'        : $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
     };

//      console.log(post_data);

      /**
       * sendet Ajax Posts an Server
       * JSON Daten holen und Benachrichtigung im Formular anzeigen
       * nach erfolgreichen versenden Benachrichtigung anzeigen
       * und Eingabefelder reseten  
       */
      $.post('ajax/add_specimen.php', post_data, function(response){
        if(response.type === 'success'){
          //reset inputs
          $('select').prop('selectedIndex', 0);
          $('.clr').val('');
          $("#fileupload").val('');
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
    
    
    
    /**
     * click copy specimen 
     */
    $("#addCopyBtn").click(function() {

      post_data = {
        /**
         *  adding specimen
         */
        'btn'           : 'btnSave',
        'type'          : $("input[name='type']:checked").val(),
        'title'         : $('input[name=title]').val(),
        'mineral'       : $('select#sel_mineral :selected').val(),
        'date'          : $('input[name=date]').val(),
        'location'      : $('select#sel_local :selected').val(),
        'number'        : $('input[name=number]').val(),
        'description'   : $('#description').val(),
        'upload'        : uploadFile(),
        'imgVal'        : $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
       };

      console.log(post_data);

      /**
       * sendet Ajax Posts an Server
       * JSON Daten holen und Benachrichtigung im Formular anzeigen
       * nach erfolgreichen versenden Benachrichtigung anzeigen
       * und Eingabefelder reseten  
       */
      $.post('ajax/add_specimen.php', post_data, function(response){
        if(response.type === 'success'){
          //reset inputs
          $('select').prop('selectedIndex', 0);
          $('.clr').val('');
          $('#btnUpload').html('<i class="fa fa-fw fa-lg fa-check-circle"></i>Hochladen');
          $("#fileupload").val('');
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