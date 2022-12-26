  $(document).ready(function() {
    /**
     * click insert btnSave 
     */
    $("#btnSave").click(function() {
      post_data = {

        /**
         * adding mineral
         */
        'btn'       : 'save',
        'name'      : $('input[name=name]').val(),
        'formula'   : $('input[name=formula]').val()
      };
      
      /**
       * sendet Ajax Posts an Server
       * JSON Daten holen und Benachrichtigung im Formular anzeigen
       * nach erfolgreichen versenden Benachrichtigung anzeigen
       * und Eingabefelder reseten  
       */
      $.post('ajax/add_mineral.php', post_data, function(response){
        if(response.type === 'success'){
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