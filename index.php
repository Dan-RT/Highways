    <?php

    session_start();

    require ('php/portion.php');
    require ('php/portion_manager.php');

    $data = ([
        "code_troncon" => 81
    ]);

    $tmp = new portion($data);
    $portion_m = new portion_manager();


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

    <?php include ("navbar.php"); ?>


    <div class="container-fullwidth container-fluid" id="style_container">

        <div class="row">
            <div class="col-lg-offset-2 col-sm-8">
                <h1>Gestionnaires d'Autoroutes :</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-4 col-sm-4" id="workplace">

                <a href="Liste_highways.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-align-left"></span> Liste Autoroutes</a>
                <a href="Liste_villes.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-align-left"></span> Liste Villes</a>
                <!--<a href="Liste_deplacement.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-align-left"></span> Déplacements</a>-->
                <a href="choix_itinéraire.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-align-left"></span> Itinéraire</a>
            </div>

        </div>
    </div>

    <?php include ("footer.php"); ?>

    <script src="js/lib/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/add_element.js"></script>

</body>
</html>
