$(document).ready(function() {
    /**
     * click update btnUser 
     */
    $("#updProfile").click(function() {
        post_data = {

            /**
             * updating user/password
             */
            'btn'              : 'updProfile',
            'username'         : $('input[name=username]').val(),
            'curnt_pwd'        : $('input[name=curnt_pwd]').val(),
            'new_pwd'          : $('input[name=new_pwd]').val(),
            'repeat_pwd'       : $('input[name=repeat_pwd]').val()
        };
        /**
         * sendet Ajax Posts an Server
         * JSON Daten holen und Benachrichtigung im Formular anzeigen
         * nach erfolgreichen versenden Benachrichtigung anzeigen
         * und Eingabefelder reseten  
         */
        $.post('ajax/upd_profile.php', post_data, function(response){
            if(response.type === 'success'){
                
                //set new profile
                $("#full").html('<h5 class="pull-right" id="full">'+response.fullname+'</h5>');
                $("#user").html('<p id="user"><b>Benutzername: </b>'+response.user+'</p>');
                $("#pw").html('<p id="pw"><b>Kennwort: </b>'+response.pw+'</p>');
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