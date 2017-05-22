
<?php

require ('php/trip.php');
require ('php/trip_manager.php');

$trip_m = new trip_manager();
$trips = $trip_m->getList();


?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Liste Déplacements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Liste_highways.css"/>

</head>

<body>



<div class="container">
    <h2>Déplacements</h2>
    <a href="index.php" class="btn btn-sm btn-default">Home</a>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Ville de départ</th>
            <th></th>
            <th>Ville d'arrivée</th>
            <th>Autoroute</th>
            <th>
                <button name="add_highway" class="btn btn-xs btn-default">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </th>

        </tr>
        </thead>

        <tbody>


        <?php


        foreach ($trips as $tmp_trip) {
            ?>

            <tr>
                <td><?php $trip_m->get_name_city($tmp_trip); ?></td>
                <td>
                    <input id="modify_name_highway_<?php echo $tmp_trip->id_deplacement(); ?>" value="<?php echo $tmp_trip->id_deplacement(); ?>">
                </td>
                <td>
                    <?php $trip_m->get_name_city_Ville($tmp_trip);?>
                    <input id="modify_code_highway_<?php echo $tmp_trip->id_deplacement(); ?>" value="<?php echo $tmp_trip->id_deplacement(); ?>">
                </td>

                <td>
                    <?php $trip_m->get_autoroute_name($tmp_trip);?>
                </td>

                <td>

                    <button name="modify_highway" value="<?php echo $tmp_trip->id_deplacement(); ?>" class="btn btn-xs btn-default">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>

                    <button name="remove_highway" value="<?php echo $tmp_trip->id_deplacement(); ?>" class="btn btn-xs btn-default">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>

                    <button id="submit_modif_highway_<?php echo $tmp_trip->id_deplacement(); ?>" class="btn btn-xs btn-default button_submit"><span class="glyphicon glyphicon-ok"></span></button>

                </td>

            </tr>

            <?php
        }
        ?>




        </tbody>
    </table>
</div>


<div id="data_portion">

</div>





<script src="js/lib/jquery.min.js"></script>
<!--<script src="js/Liste_villes.js"></script>-->

</body>
</html>

