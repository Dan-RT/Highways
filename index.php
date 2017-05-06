
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Highway to hell</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/index.css"/>

</head>

    <body>



        <div class="container-fullwidth container-fluid" id="style_container">
            <div class="row">
                <div class="col-lg-offset-4 col-sm-4" id="workplace">


                    <?php

                    require ('php/city.php');
                    require ('php/city_manager.php');


                    $ville_manager = new city_manager();

                    $ville = $ville_manager->getList();

                    echo "TEST";

                    if (empty($ville)) {
                        echo "Nothing to show";
                    } else {
                        foreach ($ville as $element) {
                            echo $element->nom_ville();
                        }
                    }

                    echo "TEST";



                    ?>


                    <div id="form_section">

                        <div class="row" id="initial_form">
                            <h3>Que souhaitez-vous faire ?</h3>
                            <select name="initial" id="initial_choice">
                                <option value="none">Choisir une action</option>
                                <option value="network">Afficher le réseau</option>
                                <option value="itineraire">Trouver votre itinéraire</option>
                                <option value="companies">Afficher sociétés d'autoroutes</option>
                                <option value="add">Ajouter un élément</option>
                                <option value="modify">Modifier un élément</option>
                                <option value="delete">Supprimer un élément</option>
                            </select>
                        </div>

                        <div class="row" id="choice_element_form">
                            <h3>Choisissez un élément :</h3>
                            <select name="choice_element" id="choice_element">
                                <option value="none">Choisir un élément</option>
                                <option value="highway">Autoroute</option>
                                <option value="city">Ville</option>
                                <option value="portion">Tronçon</option>
                            </select>

                        </div>

                        <button id="submit_button" class="btn btn-md btn-default submit_button" >
                            <span class="glyphicon glyphicon-ok"></span> Submit
                        </button>

                    </div>


                    <div id="data_app">

                    </div>


                </div>

            </div>
        </div>


        <script src="js/lib/jquery.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/add_element.js"></script>

    </body>
</html>
