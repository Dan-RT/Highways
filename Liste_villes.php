<?php

require ('php/city.php');
require ('php/city_manager.php');

$ville_m = new city_manager();
$cities = $ville_m->getList();

?>




<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Liste Villes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Liste_highways.css"/>

</head>

<body>

<?php include ("navbar.php"); ?>

<div class="container">

    <div class="row">
        <div class="col-lg-offset-3 col-sm-8">
            <h1>Listes des différentes Villes : </h1>
        </div>
    </div>
    <!--<h2>Cities</h2>
    <a href="index.php" class="btn btn-sm btn-default">Home</a>-->
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Nom Ville</th>
            <th></th>
            <th>Code Postal</th>
            <th></th>
            <th>
                <?php
                if ($_SESSION['connected'] == true) {
                    ?>
                    <button name="add_highway" class="btn btn-xs btn-default">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                    <?php
                }
                ?>

            </th>

        </tr>
        </thead>

        <tbody>


        <?php

        foreach ($cities as $tmp_city) {

            ?>

            <tr>
                <td><?php echo $tmp_city->nom_ville(); ?></td>
                <td>
                    <?php
                    if ($_SESSION['connected'] == true) {
                        ?>
                        <input id="modify_name_highway_<?php echo $tmp_city->id_city(); ?>" value="<?php echo $tmp_city->nom_ville(); ?>">
                        <?php
                    }
                    ?>
                 </td>
                <td><?php echo $tmp_city->code_postal(); ?></td>

                <td>
                    <?php
                    if ($_SESSION['connected'] == true) {
                        ?>
                        <input id="modify_code_highway_<?php echo $tmp_city->id_city(); ?>" value="<?php echo $tmp_city->code_postal(); ?>">
                        <?php
                    }
                    ?>
                </td>

                <td>
                    <?php
                    if ($_SESSION['connected'] == true) {
                        ?>
                        <button name="modify_highway" value="<?php echo $tmp_city->id_city(); ?>" class="btn btn-xs btn-default">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>

                        <button name="remove_highway" value="<?php echo $tmp_city->id_city(); ?>" class="btn btn-xs btn-default">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>

                        <button id="submit_modif_highway_<?php echo $tmp_city->id_city(); ?>" class="btn btn-xs btn-default button_submit"><span class="glyphicon glyphicon-ok"></span></button>

                        <?php
                    }
                    ?>


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
<script src="js/Liste_villes.js"></script>

</body>
</html>

