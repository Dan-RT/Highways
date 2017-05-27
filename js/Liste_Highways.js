$(function() {

    var show_hide = 0;

    alert("TEST1");
    $('tr[name=tr_]').click(function () {
        alert("CLick");
    });

    $('input').hide();
    $('.button_submit').hide();

    $('button[name=modify_highway]').click(function () {
        show_hide++;
        var autoroute = $(this).val();

        var name_input = "modify_name_highway_" + autoroute;
        var name_button = "submit_modif_highway_"+ autoroute;

        if (show_hide % 2 == 1) {
            $('#'+name_input).show();
            $('#'+name_button).show();
            $('#data_portion').empty();
        } else {
            $('#'+name_input).hide();
            $('#'+name_button).hide();
            $('#data_portion').empty();
        }

        $('#'+name_button).click(function () {
            if ($('#'+name_input).val() != 0) {
                $.post('send_data.php', {
                    type: 'highway',
                    action: 'modify',
                    name_autoroute: $('#modify_name_highway_'+autoroute).val(),
                    id_autoroute: autoroute
                }, function(data) {
                    $('#data_portion').html(data);
                });
            } else {
                alert("Veuillez renseigner un nom d'autoroute.");
            }
        });




    });

    $('button[name=remove_highway]').click(function () {
        var autoroute = $(this).val();

        var r = confirm("Remove this item. Are you sure ?");
        if (r == true) {
            $.post('send_data.php', {
                id_autoroute: autoroute,
                type: 'highway',
                action: 'remove'
            }, function(data) {
                $('#data_portion').html(data);
            });
        }
    });

    $('button[name=add_highway]').click(function () {

        var modulo = 0;

        if (modulo % 2 == 0) {
            $('#data_portion').html('<label id="name_new_hg">Nom nouvelle autoroute : <input name="name_new_hg_input" > </label><button id="submit_hg" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>');
            modulo++;

            $('#submit_hg').click(function () {

                if ($('input[name=name_new_hg_input]').val() == "") {
                    alert("Veuillez renseigner un nom d'autoroute.")
                } else {
                    $.post('send_data.php', {
                        type: 'highway',
                        action: 'add',
                        name_autoroute: $('input[name=name_new_hg_input]').val()
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




        $('button[name=show_button]').click(function () {

        var autoroute = $(this).val();

        show_hide++;

        $.get('Liste_portion.php?id_autoroute='+autoroute, function(data) {
            $('#data_portion').empty();
            $('#data_portion').html(data);
        });


    });

});