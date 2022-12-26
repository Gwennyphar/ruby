$(document).ready(function() {
    /**
     * click delete btn 
     */    
    $(".btnDel").click(function() {
        var newsId = $(this).attr('value');
        swal({
            title: "Artikel Löschen?",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Nein",
            confirmButtonText: "Ja, löschen!",
            
            closeOnConfirm: true,
            closeOnCancel: true
      	}, function(isConfirm) {
            if (isConfirm) {
                swal("Gelöscht!", "Artikel erfolgreich gelöscht", "success");
                setTimeout(function(){ window.location.replace("page-news.php"); }, 2000);
                post_data = {
                    /**
                     * delete news
                     */
                    'btn' : 'delNews',
                    'id' : newsId
                };
                /**
                 * sendet Ajax Posts an Server
                 * JSON Daten holen und Benachrichtigung im Formular anzeigen
                 * nach erfolgreichen versenden Benachrichtigung anzeigen
                 * und Eingabefelder reseten  
                 */
                $.post('ajax/del_news.php', post_data, function(response){
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
            } else {
                swal("Abgebrochen", "Artikel nicht gelöscht", "error");
            }
      	});
    });
});