/* global fileupload */

$(document).ready(function() {
  /**
   * click insert news 
   */
  $("#addNews").click(function() {
      post_data = {

        /**
         * adding news
         */
        'btn'           : 'addNews',
        'title'         : $('input[name=title]').val(),
        'start'         : $('input[name=start_date]').val(),
        'end'           : $('input[name=end_date]').val(),
        'shorttext'     : $('#shorttext').val(),
        'description'   : $('#description').val(),
        'upload'        : uploadFile(),
        'imgVal'        : $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
      };

      /**
       * sendet Ajax Posts an Server
       * JSON Daten holen und Benachrichtigung im Formular anzeigen
       * nach erfolgreichen versenden Benachrichtigung anzeigen
       * und Eingabefelder reseten  
       */
      $.post('ajax/add_news.php', post_data, function(response){
        if(response.type === 'success'){
          //reset inputs
          $('.clr').val('');
          $('.clr').text('');
          $('#result').text('');
          $('#btnUpload').html('<i class="fa fa-fw fa-lg fa-check-circle"></i>Hochladen');

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