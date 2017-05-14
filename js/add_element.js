$(function() {

    $('#data_element').hide();
    $('#paid_part').hide();
    $('#closed_part').hide();

    //permet de savoir sur quoi on travaille
    var element = $('input[name=data_element]').val();


    //alert(element);

    //Choix de l'autoroute
    if (element == "highway") {

        $('#add_button').click(function () {

            alert($('select[name=starting_city]').val() + $('select[name=arriving_city]').val() + $('input[name=name_highway]').val());

            if ($('select[name=starting_city]').val() == 0 || $('select[name=arriving_city]').val() == 0 || $('input[name=name_highway]').val() == "") {
                alert("Tous les champs doivent être renseignés.");
            } else if ($('select[name=starting_city]').val() == $('select[name=arriving_city]').val()) {
                alert("Une même ville ne peut pas être le départ et l'arrivée d'une même autoroute.");
            } else {

                $('#add_section').hide();

                $.post('send_data.php', {
                    starting_city: $('select[name=starting_city]').val(),
                    arriving_city: $('select[name=arriving_city]').val(),
                    name_highway: $('input[name=name_highway]').val()
                }, function(data) {
                    $('#data_app').html(data);
                });

            }
        })

    }

    $('input[name=paid]').click(function () {

        var paid_choice = $('input[name=paid]:checked').val();

        if (paid_choice == 2) {
            $('#paid_part').show();
        } else {
            $('#paid_part').hide();
        }

    })

    $('input[name=opened]').click(function () {

        var open_choice = $('input[name=opened]:checked').val();

        if (open_choice == 2) {
            $('#closed_part').show();
        } else {
            $('#closed_part').hide();
        }

    })


    $('select[name=number_portion]').change(function () {

        var nb_choice = $('select[name=number_portion]').val();

        alert(nb_choice);

    })

});