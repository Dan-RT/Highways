
    <?php


    require ('php/highway.php');
    require ('php/highway_manager.php');

    require ('php/portion.php');
    require ('php/portion_manager.php');

    require ('php/highway_exit.php');
    require ('php/highway_exit_manager.php');

    require ('php/company.php');
    require ('php/company_manager.php');

    require ('php/toll.php');
    require ('php/toll_manager.php');

    require ('php/city.php');
    require ('php/city_manager.php');


    /*
        echo " name_autoroute : " . $_POST['name_autoroute'];
        echo " Type : " . $_POST['type'];
        echo " Action : " . $_POST['action'];
        echo " id_autoroute : " . $_POST['id_autoroute'];



        echo " Code tronçon : " . $_POST['code_troncon'];
        echo " Type : " . $_POST['type'];
        echo " Action : " . $_POST['action'];
        echo " duKm : " . $_POST['duKm'];
        echo " auKm : " . $_POST['auKm'];
        echo " ouvert : " . $_POST['ouvert'];
        echo " payant : " . $_POST['payant'];
        echo " prix : " . $_POST['price'];
        echo " company : " . $_POST['company'];
        echo " starting_city : " . $_POST['starting_city'];
        echo " arriving_city : " . $_POST['arriving_city'];*/


    switch ($_POST['type']) {

        case "portion":

            if ($_POST['action'] == "modify") {

                $data = ([
                    "code_troncon" => $_POST['code_troncon'],
                    "duKM" => $_POST['duKm'],
                    "auKM" => $_POST['auKm'],
                    "ouvert" => $_POST['ouvert'],
                    "payant" => $_POST['payant']
                ]);


                $tmp_troncon = new portion($data);
                $tmp_troncon_m = new portion_manager();
                $tmp_troncon_m->update($tmp_troncon);


                /*     Update villes     */

                $city_m = new highway_exit_manager();
                $exits = $city_m->getList();

                foreach ($exits as $tmp) {

                    $code_tmp = $tmp->code_troncon();
                    $id_tmp = $tmp->id_city();
                    $id_autoroute_tmp = $tmp->id_autoroute();

                    /*echo " Code : " . $tmp->code_troncon();
                    echo " id_city : " . $tmp->id_city() . " : " . $_POST['starting_city'];
                    echo " id_autoroute : " . $tmp->id_autoroute() . " : " . $_POST['id_autoroute'];*/
                    //echo " numero_sortie : " . $tmp->numero_sortie();

                    if ($id_tmp == $_POST['starting_city'] && $code_tmp != null && $id_autoroute_tmp == $_POST['id_autoroute']) {
                         $city_m->delete($tmp);
                    }
                }


                foreach ($exits as $tmp) {
                    $code_tmp = $tmp->code_troncon_arrivee();
                    $id_tmp = $tmp->id_city();
                    $id_autoroute_tmp = $tmp->id_autoroute();
                    if ($id_tmp == $_POST['arriving_city'] && $code_tmp != null && $id_autoroute_tmp == $_POST['id_autoroute']) {
                        $city_m->delete($tmp);
                    }
                }



                $data_3 = ([
                    "id_city" => $_POST['starting_city'],
                    "code_troncon" => $tmp_troncon->code_troncon(),
                    "id_autoroute" => $_POST['id_autoroute']
                ]);

                $tmp_city = new highway_exit($data_3);

                $city_m->add($tmp_city);




                $data_4 = ([
                    "id_city" => $_POST['arriving_city'],
                    "code_troncon_arrivee" => $tmp_troncon->code_troncon(),
                    "id_autoroute" => $_POST['id_autoroute']
                ]);

                $tmp_city_2 = new highway_exit($data_4);

                $city_m->add($tmp_city_2);



                /*     Update Toll     */

                if ($_POST['payant'] != 0) {

                    $data_5 = ([
                        "code_troncon" => $_POST['code_troncon'],
                        "id_societe" => $_POST['company']
                    ]);

                    $peage_m = new toll_manager();
                    //$peage = $peage_m->get_by_troncon($_POST['code_troncon']);

                    $peage = new toll($data_5);

                    //$peage->setId_societe($_POST['company']);

                    $peage_m->add($peage);
                } else {
                    $peage_m = new toll_manager();
                    $peage = $peage_m->get_by_troncon($_POST['code_troncon']);
                    if ($peage != null) {
                        $peage_m->delete($peage);
                    }


                }


            ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
                <?php


            }
            else if ($_POST['action'] == "add") {

                echo $_POST['action'];
                $data = ([
                    "duKM" => $_POST['duKm'],
                    "auKM" => $_POST['auKm'],
                    "ouvert" => $_POST['ouvert'],
                    "payant" => $_POST['payant'],
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
                    $code_tmp = $tmp->code_troncon();
                    $id_tmp = $tmp->id_city();
                    $id_autoroute_tmp = $tmp->id_autoroute();
                    if (($id_tmp == $_POST['starting_city'] && $code_tmp != null) && $id_autoroute_tmp == $_POST['id_autoroute']) {
                        $city_m->delete($tmp);
                    }
                }

                foreach ($cities as $tmp) {
                    //echo "\ncode troncon arrivee : ".$tmp->code_troncon_arrivee();
                    $code_tmp = $tmp->code_troncon_arrivee();
                    $id_tmp = $tmp->id_city();
                    $id_autoroute_tmp = $tmp->id_autoroute();
                    if (($id_tmp == $_POST['arriving_city'] && $code_tmp != null) && $id_autoroute_tmp == $_POST['id_autoroute']) {
                        $city_m->delete($tmp);
                    }
                }

                $data_3 = ([
                    "id_city" => $_POST['starting_city'],
                    "code_troncon" => $tmp_troncon->code_troncon(),
                    "id_autoroute" => $_POST['id_autoroute']
                ]);

                $tmp_city = new highway_exit($data_3);


                echo " ID city : " . $tmp_city->id_city();
                echo " Code tronçon : " . $tmp_city->code_troncon();
                echo " code_troncon_arrivee : " . $tmp_city->code_troncon_arrivee();
                echo " id_autoroute : " . $tmp_city->id_autoroute();


                $city_m->add($tmp_city);


                $data_4 = ([
                    "id_city" => $_POST['arriving_city'],
                    "code_troncon_arrivee" => $tmp_troncon->code_troncon(),
                    "id_autoroute" => $_POST['id_autoroute']
                ]);

                $tmp_city_2 = new highway_exit($data_4);

                echo " ID city : " . $tmp_city_2->id_city();
                echo " Code tronçon : " . $tmp_city_2->code_troncon();
                echo " code_troncon_arrivee : " . $tmp_city_2->code_troncon_arrivee();
                echo " id_autoroute : " . $tmp_city_2->id_autoroute();


                $city_m->add($tmp_city_2);


                /*     Update Toll     */

                if ($_POST['payant'] != 0) {
                    echo "TEST";
                    $data_2 = ([
                        "code_troncon" => $tmp_troncon->code_troncon(),
                        "id_societe" => $_POST['company']
                        //"prix" => $_POST['price'],
                    ]);
                    $peage = new toll($data_2);
                    $peage_m = new toll_manager();
                    $peage_m->add($peage);
                }


                ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
                <?php

            }  else if ($_POST['action'] == "remove") {

                $exit_m = new highway_exit_manager();
                $sorties = $exit_m->getList();

                foreach ($sorties as $tmp_exit) {
                    if ($tmp_exit->code_troncon() == $_POST['code_troncon'] || $tmp_exit->code_troncon_arrivee() == $_POST['code_troncon']) {
                        $exit_m->delete($tmp_exit);
                    }
                }

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

                echo "Id autoroute : " . $_POST['id_autoroute'];

                $sortie_m = new highway_exit_manager();
                $sorties = $sortie_m->getList();

                $troncon_m = new portion_manager();
                $portions = $troncon_m->getList();

                $toll_m = new toll_manager();
                $peages = $toll_m->getList();

                print_r($peages);

/*
                $troncon_m = new portion_manager();
                $portions = $troncon_m->getList();

                $toll_m = new toll_manager();
                $peages = $toll_m->getList();

*/

                foreach ($sorties as $temp_exit) {

                    if ($temp_exit->id_autoroute() == $_POST['id_autoroute']) {
                        echo "delete exit " . $temp_exit->numero_sortie();
                        $sortie_m->delete($temp_exit);
                    }
                }



                foreach ($portions as $tmp_portion) {

                    if ($tmp_portion->id_autoroute() == $_POST['id_autoroute']) {
                        foreach ($peages as $tmp_toll) {
                            if ($tmp_portion->code_troncon() == $tmp_toll->code_troncon()) {
                                echo "delete toll " . $tmp_toll->id_peage();
                                $toll_m->delete($tmp_toll);
                            }
                        }
                        echo "delete portion " . $tmp_portion->code_troncon();
                        $troncon_m->delete($tmp_portion);
                    }
                }



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

        case "city":

            $ville_m = new city_manager();

            if ($_POST['action'] == "modify") {

                echo " Nom Ville : " . $_POST['nom_ville'];
                echo " Type : " . $_POST['type'];
                echo " Action : " . $_POST['action'];
                echo " Id city : " . $_POST['id_city'];


                $data = ([
                    "nom_ville" => $_POST['nom_ville'],
                    "id_city" => $_POST['id_city'],
                    "code_postal" => $_POST['code_postal']
                ]);

                $tmp_city = new city($data);
                $ville_m->update($tmp_city);

                ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_villes.php");
                </script>
                <?php


            } else if ($_POST['action'] == "add") {

                $data = ([
                    "nom_ville" => $_POST['nom_ville'],
                    "code_postal" => $_POST['code_postal']
                ]);


                $tmp_city = new city($data);
                $ville_m->add($tmp_city);

                ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_villes.php");
                </script>
                <?php

            } else if ($_POST['action'] == "remove") {

                echo "Removing city";
                $data = ([
                    "id_city" => $_POST['id_city']
                ]);


                $tmp_city = new city($data);
                $ville_m->delete($tmp_city);

                ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_villes.php");
                </script>
                <?php


            }
            break;
    }


    ?>



