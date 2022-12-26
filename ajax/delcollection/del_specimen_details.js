$(document).ready(function() {
    /**
     * click delete btn 
     */    
    $(".btnDel").click(function() {
      var mineral = $('select#sel_mineral :selected').text();
      swal({
        title: mineral+" Löschen?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Nein",
        confirmButtonText: "Ja, löschen!",

        closeOnConfirm: true,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
          swal("", mineral+" gelöscht", "success");
          setTimeout(function(){ window.location.replace("page-collection.php"); }, 2000);
          post_data = {
              /**
               * delete specimen
               */
              'id'      : $('input[name=id]').val(),
              'mineral' : $('input[name=mineral]').val()
          };

          /**
           * sendet Ajax Posts an Server
           * JSON Daten holen und Benachrichtigung im Formular anzeigen
           * nach erfolgreichen versenden Benachrichtigung anzeigen
           * und Eingabefelder reseten  
           */
          $.post('ajax/del_specimen.php', post_data, function(response){
              if(response.type === 'success'){
              
                $.notify({
                    title: response.title,
                    message: response.text,
                    icon: response.icon 
                },{
                    type: response.alert
                });
              }
          }, 'json');
        } else {
          mineral = $('select#sel_mineral :selected').text();
          swal("", mineral+" nicht gelöscht", "error");
        }
      });
    });
});