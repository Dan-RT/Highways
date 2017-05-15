
    <?php


    require ('php/highway.php');
    require ('php/highway_manager.php');
    require ('php/portion.php');
    require ('php/portion_manager.php');



    /*
    echo "Type : " . $_POST['type'];
    echo " Action : " . $_POST['action'];
    echo " Code_troncon : " . $_POST['code_troncon'];
    echo " duKM : " . $_POST['duKm'];
    echo " auKM : " . $_POST['auKm'];
    echo " Ouvert : " . $_POST['ouvert'];
*/


    switch ($_POST['type']) {

        case "portion":

            //echo $_POST['action'];

            if ($_POST['action'] == "modify") {
                $data = ([
                    "code_troncon" => $_POST['code_troncon'],
                    "duKM" => $_POST['duKm'],
                    "auKM" => $_POST['auKm']
                ]);

                $tmp_troncon = new portion($data);


                /*echo " Code_troncon : " . $tmp_troncon->code_troncon();
                echo " duKm : " . $tmp_troncon->duKm();
                echo " auKm : " . $tmp_troncon->auKm();*/
            ?>
                <script>
                    alert("Les données ont été mis à jour");
                    window.location.replace("Liste_highways.php");
                </script>
                <?php
                $tmp_troncon_m = new portion_manager();
                $tmp_troncon_m->update($tmp_troncon);

            }



            break;
        case 1:
            echo "i égal 1";
            break;
        case 2:
            echo "i égal 2";
            break;
    }


    ?>