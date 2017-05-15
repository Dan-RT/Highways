$(function() {

    var show_hide = 0;
    $('input').hide();


    $('button').click(function () {

        alert("bouton cliqué");


        var autoroute = $(this).val();

        alert(autoroute);
        show_hide++;

        if (show_hide % 2 == 1) {

            $.get('Liste_portion.php?id_autoroute='+autoroute, function(data) {

                $('#data_portion').html(data);
            })
        } else {
            $('#data_portion').empty();
        }

    })





});