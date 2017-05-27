$(function() {




    $('button[name=submit_modif_portion]').click(function () {

        if ($('select[name=starting_city]').val() == 0 || $('select[name=arriving_city]').val() == 0) {
            alert("Tous les champs doivent être renseignés.");
        } else if ($('select[name=starting_city]').val() == $('select[name=arriving_city]').val()) {
            alert("Veuillez choisir deux villes différentes.");
        } else {

            var starting_city = $('select[name=starting_city]').val();
            var arriving_city = $('select[name=arriving_city]').val();


            $.post('calcul_deplacement.php', {
                starting_city: starting_city,
                arriving_city: arriving_city
            }, function(data) {
                $('#data_portion').html(data);
            });

        }
    })




});