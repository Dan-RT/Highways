    <?php

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




/*
    $data = [
        "duKm" => "10",
        "auKm" => "12",
        "ouvert" => true,
        "id_autoroute" => 1
    ];

    $portion = new portion($data);
    echo $portion->ouvert();
    $portion_m = new portion_manager();

    $portion_m->add($portion);
*/


    ?>




<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <title>Liste Autoroute</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="CSS/Liste_highways.css"/>

    </head>

    <body>



    <div class="container">
        <h2>Higways</h2>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nom Autoroute</th>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>


            <?php

            $i = 1;
            foreach ($autoroutes as $tmp_highway) {

                    ?>

                    <tr>
                        <td><?php echo $tmp_highway->code_autoroute(); ?></td>
                        <td></td>
                        <td>john@example.com</td>

                        <td>
                            <button name="show_button" value="<?php echo $tmp_highway->id_autoroute(); ?>" class="btn btn-xs btn-default"><span
                                    class="glyphicon glyphicon-align-left"></span></button>
                            <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span>
                            </button>
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




    <script src="js/lib/jquery.min.js"></script>
    <script src="js/Liste_Highways.js"></script>
    <script src="js/add_element.js"></script>

    </body>
</html>



