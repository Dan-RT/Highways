$(function() {


    //alert("test");

    $('button[name=show_detail_portion]').click(function () {
/*
        var code_portion = $(this).val();
        alert("test");
        //data_cities
        $.get('liste_cities.php?id_portion='+code_portion, function(data) {
            alert("get test");
            $('#data_cities_'+code_portion).html(data);
        });
        */
    });

    var show_hide_portion = 0;

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

        show_hide_portion++;

        if (show_hide_portion % 2 == 1) {

         $.get('modify_portion.php?id_portion='+portion+'&id_autoroute='+autoroute, function(data) {
            $('#data_portion_modify').html(data);
         });

        } else {
         //alert("Hide");
         $('#data_portion_modify').empty();
        }
     });

    $('button[name=add_portion]').click(function () {
        show_hide_portion++;

        alert("add portion");

        if (show_hide_portion % 2 == 1) {

            //alert("teub");
            var tmp = 0;
            if ($('input[name=no_portion]').val() == 0) {
                tmp = $('input[name=id_autoroute_hidden_3]').val();
            } else {
                tmp = $('input[name=id_autoroute_hidden]').val();
            }

            $.get('add_portion.php?id_autoroute='+tmp, function(data) {
                $('#data_portion_modify').html(data);
            })

        } else {
            //alert("Hide");
            $('#data_portion_modify').empty();

        }

    });

});

