$(function() {

    var show_hide = 0;

    $('button[name=remove_highway]').click(function () {
        alert("Remove");
    });


    $('button[name=show_button]').click(function () {

        var autoroute = $(this).val();

        show_hide++;

        if (show_hide % 2 == 1) {

            $.get('Liste_portion.php?id_autoroute='+autoroute, function(data) {

                $('#data_portion').html(data);
            })

        } else {
            $('#data_portion').empty();
        }

    });

});