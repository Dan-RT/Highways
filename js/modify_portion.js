
$(function() {

    $('#code_troncon_hidden').hide();


    $('button[name=submit_modif_portion]').click(function () {

        alert($('#id_autoroute_hidden_2').val());
        if ($('#modify_duKm').val() == "" || $('#modify_auKm').val() == "") {
            alert("Tous les champs doivent être renseignés.");
        } else {

            if ($('#code_troncon_hidden').val() == 'X') {
                //ajout d'un élément
                $.post('send_data.php', {
                    type: 'portion',
                    action: 'add',
                    id_autoroute: $('#id_autoroute_hidden_2').val(),
                    duKm: $('#modify_duKm').val(),
                    auKm: $('#modify_auKm').val(),
                    ouvert: $('input:radio').val()
                }, function(data) {
                    $('#data_portion_modify').html(data);
                });
            } else {
                //modif d'un élément
                $.post('send_data.php', {
                    type: 'portion',
                    action: 'modify',
                    code_troncon: $('#code_troncon_hidden').val(),
                    duKm: $('#modify_duKm').val(),
                    auKm: $('#modify_auKm').val(),
                    ouvert: $('input:radio').val()
                }, function(data) {
                    $('#data_portion_modify').html(data);
                });
            }

        }
    })



});


