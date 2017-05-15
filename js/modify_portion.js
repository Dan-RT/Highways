$(function() {

    $('#code_troncon_hidden').hide();

    $('button[name=submit_modif_portion]').click(function () {

        if ($('#modify_duKm').val() == "" || $('#modify_auKm').val() == "" || $('#modify_ouvert').val() == "") {
            alert("Tous les champs doivent être renseignés.");
        } else {
            $.post('send_data.php', {
                type: 'portion',
                action: 'modify',
                code_troncon: $('#code_troncon_hidden').val(),
                duKm: $('#modify_duKm').val(),
                auKm: $('#modify_auKm').val(),
                ouvert: $('#modify_ouvert').val()
            }, function(data) {
                $('#data_portion_modify').html(data);
            });

        }

    })

});


