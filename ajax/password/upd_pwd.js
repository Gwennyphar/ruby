$(document).ready(function() {
    /**
     * click update btnUser 
     */
    $("#btnRandom").click(function() {
        post_data = {

            /**
             * updating user/password
             */
            'btn' : 'random',
            'uid' : $('input[name=uid]').val()
        };
        /**
         * sendet Ajax Posts an Server
         * JSON Daten holen und Benachrichtigung im Formular anzeigen
         * nach erfolgreichen versenden Benachrichtigung anzeigen
         * und Eingabefelder reseten  
         */
        $.post('ajax/password/upd_pwd.php', post_data, function(response){
            if(response.type === 'success'){
                
                //set new profile
                $("#new_pwd").html('<h5 class="pull-right" id="full">'+response.password+'</h5>');
                //reset inputs
//                $('.clr').val('');
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