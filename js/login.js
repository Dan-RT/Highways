$('form').submit(function () {


    var id = $('input[name=user_name]').val();
    var password = $('input[name=password]').val();

    if (id  == '' || password == '') {
        alert('Veuillez remplir tous les champs.');
        return false;
    } else if (id != "admin" && password != "admin") {
        $('#data_portion').html('<div style="color: white;">Les données saisies sont inconnues.</div>');
        return false;
    }

});