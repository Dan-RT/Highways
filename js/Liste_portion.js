$(function() {


    var show_hide_portion = 0;

    $('button[name=remove_portion]').click(function () {

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

         show_hide_portion++;

         if (show_hide_portion % 2 == 1) {

             $.get('modify_portion.php?id_portion='+portion, function(data) {
                $('#data_portion_modify').html(data);
             })

         } else {
             //alert("Hide");
             $('#data_portion_modify').empty();
         }
     });

    $('button[name=add_portion]').click(function () {
        show_hide_portion++;


        if (show_hide_portion % 2 == 1) {

            //alert("teub");
            var tmp = $('input[name=id_autoroute_hidden]').val();
            //alert(tmp);

            $.get('add_portion.php?id_autoroute='+tmp, function(data) {
                $('#data_portion_modify').html(data);
            })

        } else {
            //alert("Hide");
            $('#data_portion_modify').empty();

        }

    });

});

