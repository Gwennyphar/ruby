$(document).ready(function() {
    /**
     * click update btnUser 
     */
    $("#btnRandom").click(function() {
        post_data = {
          /**
           * create user/password
           */
          'btn' : 'random'
        };
        /**
         * sendet Ajax Posts an Server
         * JSON Daten holen und Benachrichtigung im Formular anzeigen
         * nach erfolgreichen versenden Benachrichtigung anzeigen
         * und Eingabefelder reseten  
         */
        $.post('ajax/password/create_pwd.php', post_data, function(response){
          if(response.type === 'success'){
            $("#new_pwd").val(response.pwTxt);
            $("#show_pwd").text(response.pwTxt);
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