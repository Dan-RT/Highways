$(function() {




    $('button[name=remove_portion]').click(function () {

        //alert("chatte");

        var portion = $(this).val();

        var r = confirm("Remove this item. Are you sure ?");
        if (r == true) {
            $.post('send_data.php', {
                code_troncon: portion,
                type: 'portion',
                action: 'remove'
            }, function(data) {
                $('#data_portion_modify').html(data);
            });
        }


    });


    $('button[name=modify_portion]').click(function () {

        var portion = $(this).val();
        var autoroute = $('input[name=id_autoroute_hidden]').val();
        //alert("modify");
        //alert("Autoroute : " + autoroute);

        $.get('modify_portion.php?id_portion='+portion+'&id_autoroute='+autoroute, function(data) {
            $('#data_portion_modify').empty();
            $('#data_portion_modify').html(data);
        });
     });

    $('button[name=add_portion]').click(function () {


        var tmp = 0;
        if ($('input[name=no_portion]').val() == 0) {
            tmp = $('input[name=id_autoroute_hidden_3]').val();
        } else {
            tmp = $('input[name=id_autoroute_hidden]').val();
        }

        $.get('add_portion.php?id_autoroute='+tmp, function(data) {
            $('#data_portion_modify').empty();
            $('#data_portion_modify').html(data);
        });

    });

});

