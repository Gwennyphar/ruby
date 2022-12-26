
  /**
   * click delete btn 
   */    
  $(document).on("click",".btnDel",function() {
      var id = $(this).attr('value');
      var name = $('#name'+id).text();
      var formula = $('#formula'+id).text();
      var mineral = name+' '+formula;
      swal({
        title: mineral+" löschen?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Nein",
        confirmButtonText: "Ja, löschen!",

        closeOnConfirm: true,
        closeOnCancel: true
      }, function(isConfirm) {
          if (isConfirm) {
            post_data = {
              /**
               * delete mineral
               */
              'id' : id
            };
            /**
             * sendet Ajax Posts an Server
             * JSON Daten holen und Benachrichtigung im Formular anzeigen
             * nach erfolgreichen versenden Benachrichtigung anzeigen
             * und Eingabefelder reseten  
             */
            $.post('ajax/del_mineral.php', post_data, function(response){
                if(response.type === 'success'){
                    $("#sampleTable").on('click','.btnDel');
                    $('#idrow'+id).remove();
                }
                $.notify({
                  title: response.title,
                  message: response.text,
                  icon: response.icon 
                },{
                  type: response.alert
                });
            }, 'json');
          } else {
              swal("Abgebrochen", mineral+" nicht gelöscht", "error");
          }
      });
  });