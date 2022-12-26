$(document).ready(function() {
  /**
   * click update news 
   */
  $(".btnUpd").click(function() {
    var newsId = $(this).attr('value');
    post_data = {

      /**
       * updating news
       */
      'btn'           : 'update',
      'id'            : newsId,
      'title'         : $('input[name=title'+newsId+']').val(),
      'start'         : $('input[name=start_date'+newsId+']').val(),
      'end'           : $('input[name=end_date'+newsId+']').val(),
      'shorttext'     : $('#shorttext'+newsId).val(),
      'description'   : $('#description'+newsId).val(),
      'attachment'    : $('#attachment').attr('value'),
      'upload'        : uploadFile(),
      'imgVal'        : $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')

    };

    /**
     * sendet Ajax Posts an Server
     * JSON Daten holen und Benachrichtigung im Formular anzeigen
     * nach erfolgreichen versenden Benachrichtigung anzeigen
     * und Eingabefelder reseten  
     */
    $.post('ajax/upd_news.php', post_data, function(response){
      if(response.type === 'success'){

        //set new profile
        $(".content").html('<h5><strong>'+post_data.title+'</strong></h5><p class="text-muted"><small>'+post_data.start+'</small></p>');
        $(".post-content").html('<p>'+post_data.shorttext+'</p>');
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