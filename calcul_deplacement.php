
    <?php

    require ('php/highway.php');
    require ('php/highway_manager.php');

    $highway_m = new highway_manager();
    $autoroutes = $highway_m->getList();


    require ('php/city.php');
    require ('php/city_manager.php');

    require ('php/portion.php');
    require ('php/portion_manager.php');

    require ('php/highway_exit.php');
    require ('php/highway_exit_manager.php');

    $portion_m = new portion_manager();

    $data = ([
        "id_city" => 1,
        "nom_city" => "Lyon"
    ]);

    $data = ([
        "id_city" => 11,
        "nom_city" => "Strasbourg"
    ]);

    $tmp_city_depart = new city($data);
    $tmp_city_arrivee = new city($data);

    $flag_general = 0;





    foreach ($autoroutes as $tmp_autoroute) {

        //echo "Autoroute " . $tmp_autoroute->code_autoroute() . " testée.";

        $troncon_precised = $highway_m->get_troncons($tmp_autoroute);

        $flag = 0;
        $ferme = 0;
        $nb_portion = 1;

        foreach ($troncon_precised as $tmp_troncon) {

            $exit_depart = $portion_m->get_ville_depart($tmp_troncon);
            $exit_arrivee = $portion_m->get_ville_arrivee($tmp_troncon);

            if ($flag) {
                $nb_portion++;
            }

            if ($_POST["starting_city"] == $exit_depart->id_city() || $_POST["starting_city"] == $exit_arrivee->id_city()) {

                if ($tmp_troncon->ouvert) {
                    $flag++;
                    $ferme++;
                }


            }

            if ($_POST["arriving_city"] == $exit_depart->id_city() || $_POST["arriving_city"] == $exit_arrivee->id_city()) {

                if ($tmp_troncon->ouvert) {
                    $flag++;

                }

            }


        }

        if ($flag == 2) {

            ?>

            <div>
                <?php echo "  Itinéraire trouvé sur l'autoroute " . $tmp_autoroute->code_autoroute() . " long de " . $nb_portion . " troncon(s)."

                ;?>
            </div>
    <?php


            $flag_general++;
        }
        $ferme = 0;
        $flag = 0;
        $nb_portion = 1;


    }

    //echo "TEST";



    if ($flag_general == 0) {
        echo "Aucun itinéraire ouvert a été trouvé sur le réseau d'autoroutes. ";
    }


    ?>