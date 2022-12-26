$(document).ready(function() {
    /**
     * click delete btn 
     */    
    $(".btnDel").click(function() {
        swal({
            title: "Fundstelle Löschen?",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Nein",
            confirmButtonText: "Ja, löschen!",
            
            closeOnConfirm: true,
            closeOnCancel: true
      	}, function(isConfirm) {
            if (isConfirm) {
              setTimeout(function(){ window.location.replace("page-locations.php"); }, 2000);
              post_data = {
                  /**
                   * delete entry
                   */
                  'id'    :  $('input[name=id]').val(),
                  'location'  :  $('input[name=location]').val()
              };

              /**
               * sendet Ajax Posts an Server
               * JSON Daten holen und Benachrichtigung im Formular anzeigen
               * nach erfolgreichen versenden Benachrichtigung anzeigen
               * und Eingabefelder reseten  
               */
              $.post('ajax/del_location.php', post_data, function(response){
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
            }
      	});
    });
});