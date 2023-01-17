  $(document).ready(function() {
    /**
     * click insert btnSave 
     */
    $("#btnSave").click(function() {
      post_data = {

        /**
         * adding systematc
         */
        'btn'        : 'save',
        'class'      : $('input[name=class]').val(),
        'department' : $('input[name=department]').val()
      };
      
      /**
       * sendet Ajax Posts an Server
       * JSON Daten holen und Benachrichtigung im Formular anzeigen
       * nach erfolgreichen versenden Benachrichtigung anzeigen
       * und Eingabefelder reseten  
       */
      $.post('ajax/add_systematic.php', post_data, function(response){
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