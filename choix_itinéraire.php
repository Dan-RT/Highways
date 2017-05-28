    <?php

    require ('php/city.php');
    require ('php/city_manager.php');


    $city_m = new city_manager();
    $cities = $city_m->getList();


    ?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Itinéraire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/itineraire.css"/>

</head>

<body>

<?php include ("navbar.php"); ?>

    <div class="container-fullwidth container-fluid " id="style_container">

        <div class="row">
            <div class="col-lg-offset-4 col-sm-8">
                <h1>Calculez votre itinéraire :</h1>
            </div>
        </div>


        <div class="col-lg-offset-4 col-sm-4 itineraire" id="workplace">

            <div class="row">
                <select name="starting_city" id="starting_city">
                    <option value="0">Sélectionner une ville de départ</option>

                    <?php
                    foreach ($cities as $tmp_city) {
                        ?>
                        <option value="<?php echo $tmp_city->id_city(); ?>"><?php echo $tmp_city->nom_ville(); ?></option>
                        <?php
                    }
                    ?>

                </select>
            </div>

            <div class="row">
                <select name="arriving_city" id="arriving_city">
                    <option value="0">Sélectionner une ville d'arrivée</option>
                    <?php
                    foreach ($cities as $tmp_city) {
                        ?>
                        <option value="<?php echo $tmp_city->id_city(); ?>"><?php echo $tmp_city->nom_ville(); ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="row">
                <!--<a href="index.php" class="btn btn-sm btn-default">Home</a>-->
                <button name="submit_modif_portion" class="btn btn-md btn-default">Rechercher <span class="glyphicon glyphicon-ok"></span></button>
            </div>

        </div>

        <div class="col-lg-offset-4 col-sm-4">
            <div id="data_portion">

            </div>
        </div>



    </div>



<?php include ("footer.php"); ?>


<script src="js/lib/jquery.min.js"></script>
<script src="js/itineraire.js"></script>

</body>
</html>
