    <?php


    require ('php/trip.php');
    require ('php/trip_manager.php');


    $trip_m = new trip_manager();

    $data = ([
        "id_autoroute" => 1,
        "id_city" => 1,
        "id_city_2" => 6,
        "id_voiture" => 1
    ]);

    //$trip_tmp = new trip($data);



    //print_r($trip_m->getList());

    //$trip_m->add($trip_tmp);

    ?>

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

            <a href="Liste_highways.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-align-left"></span> Liste Autoroutes</a>
            <a href="Liste_villes.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-align-left"></span> Liste Villes</a>
            <a href="Liste_deplacement.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-align-left"></span> Déplacements</a>


        </div>

    </div>
</div>


<script src="js/lib/jquery.min.js"></script>
<script src="js/index.js"></script>
<script src="js/add_element.js"></script>

</body>
</html>
