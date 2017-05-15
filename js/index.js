$(function() {

    //$('#texteJQ').html('Hello world. Ce texte est affiché par jQuery.');

    $('#submit_button').hide();
    $('#choice_element_form').hide();

    $('select[name=initial]').click(function () {

        var initial_choice = $('#initial_choice option:selected').val();
        //var first_choice = $('input[name=first_choice]:checked').val();

        //alert("initial choice : " + initial_choice);

        if (initial_choice == "add" || initial_choice == "delete" || initial_choice == "modify") {

            $('#submit_button').hide();
            $('#choice_element_form').show();

            $('select[name=choice_element]').click(function () {
                var element_choice = $('#choice_element option:selected').val();

                if (element_choice != "none") {
                    $('#submit_button').show();
                } else {
                    $('#submit_button').hide();
                }

                $('#submit_button').click(function () {

                    $('#form_section').hide();
                    $('#submit_button').hide();


                    $.get('add_element.php?element='+element_choice, function(data) {

                        $('#data_app').html(data);
                    });


                    if (element_choice == "add") {

                    } else if (element_choice == 'delete') {

                    } else if (element_choice == 'modify') {

                    }

                })
            })

        } else if (initial_choice != "none") {

            $('#choice_element_form').hide();
            $('#submit_button').show();

        } else {

            $('#choice_element_form').hide();
            $('#submit_button').hide();
        }


    })



});

