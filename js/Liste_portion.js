$(function() {

    var show_hide_portion = 0;

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

            //problème ici pour l'id autoroute
            $.get('add_portion.php?id_autoroute'+$('input[name=id_autoroute_hidden]').val(), function(data) {
                $('#data_portion_modify').html(data);
            })

        } else {
            //alert("Hide");
            $('#data_portion_modify').empty();

        }

    });

});