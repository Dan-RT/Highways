
$(function() {



    $('#code_troncon_hidden').hide();
    $('#companies').hide();

    if ($('input[name=payant]:checked').val() == 1) {
        $('#companies').show();
    } else {
        $('#companies').hide();
    }

    $('input[name=payant]').change(function () {
        if ($('input[name=payant]:checked').val() == 1) {
            $('#companies').show();
        } else {
            $('#companies').hide();
        }
    });

    $('button[name=submit_modif_portion]').click(function () {

        //alert("submit");

        //alert($('#id_autoroute_hidden_2').val());
        if ($('#modify_duKm').val() == "" || $('#modify_auKm').val() == "" || $('select[name=starting_city]').val() == 0 || $('select[name=arriving_city]').val() == 0) {
            alert("Tous les champs doivent être renseignés.");
        } else if ($('select[name=starting_city]').val() == $('select[name=arriving_city]').val()) {
            alert("Une même ville ne peut pas être le départ et l'arrivée d'une même tronçon.");
        } else {

            var tmp_ouvert = $('input[name=ouvert]:checked').val();
            var tmp_payant = $('input[name=payant]:checked').val();
            var company = $('#companies').val();
            //alert("Payant : " + tmp_payant);
            var starting_city = $('select[name=starting_city]').val();
            var arriving_city = $('select[name=arriving_city]').val();

            if ($('#code_troncon_hidden').val() == 'X') {

                //ajout d'un élément
                $.post('send_data.php', {
                    type: 'portion',
                    action: 'add',
                    id_autoroute: $('#id_autoroute_hidden_2').val(),
                    duKm: $('#modify_duKm').val(),
                    auKm: $('#modify_auKm').val(),
                    ouvert: tmp_ouvert,
                    payant: tmp_payant,
                    company: company,
                    starting_city: starting_city,
                    arriving_city: arriving_city
                }, function(data) {
                    $('#data_portion_modify').html(data);
                });

            } else {
                var tmp_code = $('#code_troncon_hidden').val();

                //modif d'un élément
                $.post('send_data.php', {
                    code_troncon: tmp_code,
                    type: 'portion',
                    action: 'modify',
                    duKm: $('#modify_duKm').val(),
                    auKm: $('#modify_auKm').val(),
                    id_autoroute: $('#id_autoroute_hidden_2').val(),
                    ouvert: tmp_ouvert,
                    payant: tmp_payant,
                    company: company,
                    starting_city: starting_city,
                    arriving_city: arriving_city
                }, function(data) {
                    $('#data_portion_modify').html(data);
                });
            }
        }
    })

});


