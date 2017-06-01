    <?php

    session_start();
    require ('php/highway.php');
    require ('php/highway_manager.php');

    require ('php/city.php');
    require ('php/city_manager.php');


    require ('php/highway_exit.php');
    require ('php/highway_exit_manager.php');

    require ('php/register.php');
    require ('php/register_manager.php');

    require ('php/company.php');
    require ('php/company_manager.php');

    require ('php/toll.php');
    require ('php/toll_manager.php');

    $autoroute_manager = new highway_manager();
    $autoroutes = $autoroute_manager->getList();

    ?>




<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <title>Liste Autoroutes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="CSS/Liste_highways.css"/>

    </head>

    <body>


    <?php include ("navbar.php"); ?>

    <div class="container">


        <div class="row">
            <div class="col-lg-offset-3 col-sm-8">
                <h1>Listes des différentes Autoroutes :</h1>
            </div>
        </div>

        <!--<h2>Higways</h2>-->
        <!--<a href="index.php" class="btn btn-sm btn-default">Home</a>-->
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nom Autoroute</th>
                    <th></th>
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

            $i = 1;
            foreach ($autoroutes as $tmp_highway) {

                    ?>


                    <tr>
                        <td><?php echo $tmp_highway->code_autoroute(); ?></td>

                        <?php
                        if ($_SESSION['connected'] == true) {
                            ?>
                            <td>
                                <input id="modify_name_highway_<?php echo $tmp_highway->id_autoroute(); ?>" value="<?php echo $tmp_highway->code_autoroute(); ?>">
                            </td>
                            <?php
                        } else {
                        ?>
                            <td></td>
                            <?php
                        }
                        ?>

                        <td></td>

                        <td>
                            <button name="show_button" value="<?php echo $tmp_highway->id_autoroute(); ?>" class="btn btn-xs btn-default">
                                <span class="glyphicon glyphicon-align-left"></span>
                            </button>


                            <?php
                            if ($_SESSION['connected'] == true) {
                            ?>
                                <button name="modify_highway" value="<?php echo $tmp_highway->id_autoroute(); ?>" class="btn btn-xs btn-default">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>

                                <button name="remove_highway" value="<?php echo $tmp_highway->id_autoroute(); ?>" class="btn btn-xs btn-default">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>

                                <button id="submit_modif_highway_<?php echo $tmp_highway->id_autoroute(); ?>" class="btn btn-xs btn-default button_submit"><span class="glyphicon glyphicon-ok"></span></button>

                                <?php
                            }
                            ?>

                        </td>

                    </tr>

                    <?php
                $i++;
            }
            ?>




            </tbody>
        </table>
    </div>


    <div id="data_portion">

    </div>



    <?php include ("footer.php"); ?>


    <script src="js/lib/jquery.min.js"></script>
    <script src="js/Liste_Highways.js"></script>

    </body>
</html>



