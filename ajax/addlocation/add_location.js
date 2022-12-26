  $(document).ready(function() {
    /**
     * click insert btnUser 
     */
    $("#btnSave").click(function() {
      post_data = {

        /**
         * adding location
         */
        'btn'       : 'save',
        'location'  : $('input[name=location]').val(),
        'country'   : $('input[name=country]').val()
      };
      console.log(post_data);
      
      /**
       * sendet Ajax Posts an Server
       * JSON Daten holen und Benachrichtigung im Formular anzeigen
       * nach erfolgreichen versenden Benachrichtigung anzeigen
       * und Eingabefelder reseten  
       */
      $.post('ajax/add_location.php', post_data, function(response){
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