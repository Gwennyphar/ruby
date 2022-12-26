/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    /**
     * click remove files 
     */    
    $(".remove-file").click(function() {
        var imgVal = $(this).attr('value');
        var imgId = $(this).attr('id');
        var newsId = $(this).attr('news-id');
        swal({
            title: "Datei Löschen?",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Nein",
            confirmButtonText: "Ja, löschen!",
            
            closeOnConfirm: true,
            closeOnCancel: true
      	}, function(isConfirm) {
            if (isConfirm) {
                swal("Gelöscht!", "Datei erfolgreich gelöscht", "success");
                
                post_data = {
                  /**
                   * get current value
                   */
                  'imgVal' : imgVal,
                  'imgId'  : imgId,
                  'id'     : newsId,
                  'btn'    : 'delAttachment'

                };
                /**
                 * sendet Ajax Posts an Server
                 * JSON Daten holen und Benachrichtigung im Formular anzeigen
                 * nach erfolgreichen versenden Benachrichtigung anzeigen
                 * und Eingabefelder reseten  
                 */
                $.post('ajax/del_files.php', post_data, function(response){
                    if(response.type === 'success'){
                      $('#idrow'+post_data.imgId).remove();
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
                swal("Abgebrochen", "Datei nicht gelöscht", "error");
            }
      	});
    });
});

