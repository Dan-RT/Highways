
    <?php


    require ('php/highway.php');
    require ('php/highway_manager.php');
    require ('php/portion.php');
    require ('php/portion_manager.php');

    require ('php/highway_exit.php');
    require ('php/highway_exit_manager.php');



    echo " name_autoroute : " . $_POST['name_autoroute'];
    echo " Type : " . $_POST['type'];
    echo " Action : " . $_POST['action'];
    echo " id_autoroute : " . $_POST['id_autoroute'];


    /*
    echo " Code tronçon : " . $_POST['code_troncon'];
    echo " Type : " . $_POST['type'];
    echo " Action : " . $_POST['action'];
    echo " duKm : " . $_POST['duKm'];
    echo " auKm : " . $_POST['auKm'];
    echo " ouvert : " . $_POST['ouvert'];
    echo " starting_city : " . $_POST['starting_city'];
    echo " arriving_city : " . $_POST['arriving_city'];*/


    switch ($_POST['type']) {

        case "portion":

            if ($_POST['action'] == "modify") {

                $data = ([
                    "code_troncon" => $_POST['code_troncon'],
                    "duKM" => $_POST['duKm'],
                    "auKM" => $_POST['auKm'],
                    "ouvert" => $_POST['ouvert']
                ]);


                $tmp_troncon = new portion($data);
                $tmp_troncon_m = new portion_manager();
                $tmp_troncon_m->update($tmp_troncon);


                /*     Update villes     */

                $city_m = new highway_exit_manager();
                $cities = $city_m->getList();

                foreach ($cities as $tmp) {
                    //echo "\ncode troncon : ".$tmp->code_troncon();
                    $code_tmp = $tmp->code_troncon();
                    if ($code_tmp == $_POST['code_troncon']) {
                        $tmp->setCode_troncon(0);
                        $city_m->update($tmp);
                    }
                }

                foreach ($cities as $tmp) {
                    //echo "\ncode troncon arrivee : ".$tmp->code_troncon_arrivee();
                    $code_tmp = $tmp->code_troncon_arrivee();
                    if ($code_tmp == $_POST['code_troncon']) {
                        $tmp->setCode_troncon_arrivee(0);
                        $city_m->update($tmp);
                    }
                }

                $tmp_city = $city_m->get($_POST['starting_city']);
                $tmp_city->setCode_troncon($_POST['code_troncon']);


                $city_m->update($tmp_city);

                $tmp_city = $city_m->get($_POST['arriving_city']);
                $tmp_city->setCode_troncon_arrivee($_POST['code_troncon']);


                $city_m->update($tmp_city);



            ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
                <?php


            } else if ($_POST['action'] == "add") {

                echo $_POST['action'];
                $data = ([
                    "duKM" => $_POST['duKm'],
                    "auKM" => $_POST['auKm'],
                    "ouvert" => $_POST['ouvert'],
                    "id_autoroute" => $_POST['id_autoroute']
                ]);


                $tmp_troncon = new portion($data);
                echo "Ouvert : " . $tmp_troncon->ouvert();
                $tmp_troncon_m = new portion_manager();
                $tmp_troncon_m->add($tmp_troncon);


                $tmp_troncon = $tmp_troncon_m->getLast_added();
                echo "Code nouveau tronçon : " . $tmp_troncon->code_troncon();

                /*     Update villes     */

                $city_m = new highway_exit_manager();
                $cities = $city_m->getList();

                foreach ($cities as $tmp) {
                    echo "\ncode troncon : ".$tmp->code_troncon();
                    $code_tmp = $tmp->code_troncon();
                    if ($code_tmp == $_POST['code_troncon']) {
                        $tmp->setCode_troncon(0);
                        $city_m->update($tmp);
                    }
                }

                foreach ($cities as $tmp) {
                    echo "\ncode troncon arrivee : ".$tmp->code_troncon_arrivee();
                    $code_tmp = $tmp->code_troncon_arrivee();
                    if ($code_tmp == $_POST['code_troncon']) {
                        $tmp->setCode_troncon_arrivee(0);
                        $city_m->update($tmp);
                    }
                }



                $tmp_city = $city_m->get($_POST['starting_city']);
                $tmp_city->setCode_troncon($tmp_troncon->code_troncon());
                echo " Ville : " . $tmp_city->nom_ville();
                echo " code troncon (starting) : " . $tmp_city->code_troncon();

                $city_m->update($tmp_city);

                $tmp_city = $city_m->get($_POST['arriving_city']);
                $tmp_city->setCode_troncon_arrivee($tmp_troncon->code_troncon());

                echo " Ville : " . $tmp_city->nom_ville();
                echo " code troncon (arriving) : " . $tmp_city->code_troncon_arrivee();

                $city_m->update($tmp_city);


                ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
                <?php

            }  else if ($_POST['action'] == "remove") {

                $data = ([
                    "code_troncon" => $_POST['code_troncon']
                ]);



                $tmp_troncon = new portion($data);
                echo "Ouvert : " . $tmp_troncon->code_troncon();
                $tmp_troncon_m = new portion_manager();
                $tmp_troncon_m->delete($tmp_troncon);
                ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
                <?php
            }



            break;
        case "highway":

            if ($_POST['action'] == "modify") {


                echo " name_autoroute : " . $_POST['name_autoroute'];
                echo " Type : " . $_POST['type'];
                echo " Action : " . $_POST['action'];
                echo " id_autoroute : " . $_POST['id_autoroute'];


                $data = ([
                    "code_autoroute" => $_POST['name_autoroute'],
                    "id_autoroute" => $_POST['id_autoroute']
                ]);

                $tmp_highway = new highway($data);
                $highway_m = new highway_manager();

                $highway_m->update($tmp_highway);
    ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
    <?php
            } else if ($_POST['action'] == "add") {

                $data = ([
                    "code_autoroute" => $_POST['name_autoroute']
                ]);

                $tmp_highway = new highway($data);
                $highway_m = new highway_manager();

                $highway_m->add($tmp_highway);
                ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
                <?php

            } else if ($_POST['action'] == "remove") {
                $data = ([
                    "id_autoroute" => $_POST['id_autoroute']
                ]);

                $tmp = new highway($data);
                $tmp_highway_m = new highway_manager();
                $tmp_highway_m->delete($tmp);

                ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
                <?php
            }

            break;
        case 2:
            echo "i égal 2";
            break;
    }


    ?>



