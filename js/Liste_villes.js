$(function() {

    var show_hide = 0;

    $('input').hide();
    $('.button_submit').hide();

    $('button[name=modify_highway]').click(function () {
        show_hide++;
        var city = $(this).val();

        var name_input = "modify_name_highway_" + city;
        var name_button = "submit_modif_highway_"+ city;
        var code_input = "modify_code_highway_" + city;

        if (show_hide % 2 == 1) {
            $('#'+name_input).show();
            $('#'+code_input).show();
            $('#'+name_button).show();
            $('#data_portion').empty();
        } else {
            $('#'+name_input).hide();
            $('#'+code_input).hide();
            $('#'+name_button).hide();
            $('#data_portion').empty();
        }

        $('#'+name_button).click(function () {
            if ($('#'+name_input).val() != 0) {
                $.post('send_data.php', {
                    type: 'city',
                    action: 'modify',
                    nom_ville: $('#modify_name_highway_'+city).val(),
                    code_postal: $('#modify_code_highway_'+city).val(),
                    id_city: city
                }, function(data) {
                    $('#data_portion').html(data);
                });
            } else {
                alert("Veuillez renseigner un nom de ville.");
            }
        });




    });

    $('button[name=remove_highway]').click(function () {
        var city = $(this).val();

        var r = confirm("Remove this item. Are you sure ?");
        if (r == true) {
            $.post('send_data.php', {
                id_city: city,
                type: 'city',
                action: 'remove'
            }, function(data) {
                $('#data_portion').html(data);
            });
        }
    });

    $('button[name=add_highway]').click(function () {

        var modulo = 0;

        if (modulo % 2 == 0) {
            $('#data_portion').html('<label id="name_new_hg">Nom nouvelle ville : <input name="name_new_hg_input"> </label><label id="code_new_hg">  Code : <input name="code_new_hg_input"> </label><button id="submit_hg" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>');
            modulo++;

            $('#submit_hg').click(function () {

                if ($('input[name=name_new_hg_input]').val() == "") {
                    alert("Veuillez renseigner un nom de ville.")
                } else {
                    $.post('send_data.php', {
                        type: 'city',
                        action: 'add',
                        nom_ville: $('input[name=name_new_hg_input]').val(),
                        code_postal: $('input[name=code_new_hg_input]').val()
                    }, function(data) {
                        $('#data_portion').html(data);
                    });
                }
            });

        } else {
            $('#data_portion').empty();
            modulo++;
        }

    });



});