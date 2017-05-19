
$(function() {


    $('#code_troncon_hidden').hide();

    $('button[name=submit_modif_portion]').click(function () {

        //alert($('#id_autoroute_hidden_2').val());
        if ($('#modify_duKm').val() == "" || $('#modify_auKm').val() == "") {
            alert("Tous les champs doivent être renseignés.");
        } else {

            var tmp_ouvert = $('input[name=optradio]:checked').val();

            alert(tmp_ouvert);
            if ($('#code_troncon_hidden').val() == 'X') {
                //ajout d'un élément
                $.post('send_data.php', {
                    type: 'portion',
                    action: 'add',
                    id_autoroute: $('#id_autoroute_hidden_2').val(),
                    duKm: $('#modify_duKm').val(),
                    auKm: $('#modify_auKm').val(),
                    ouvert: tmp_ouvert
                }, function(data) {
                    $('#data_portion_modify').html(data);
                });
            } else {
                var tmp_code = $('#code_troncon_hidden').val();
                var tmp_ouvert = $('input[name=optradio]:checked').val();

                alert(tmp_ouvert);
                //modif d'un élément
                $.post('send_data.php', {
                    code_troncon: tmp_code,
                    type: 'portion',
                    action: 'modify',
                    duKm: $('#modify_duKm').val(),
                    auKm: $('#modify_auKm').val(),
                    ouvert: tmp_ouvert
                }, function(data) {
                    $('#data_portion_modify').html(data);
                });
            }
        }
    })

});


