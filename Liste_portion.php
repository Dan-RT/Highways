    <?php

    session_start();

    require ('php/portion.php');
    require ('php/portion_manager.php');

    $portion_m = new portion_manager();
    $portions = $portion_m->getList();


    require ('php/highway_exit.php');
    require ('php/highway_exit_manager.php');

    $sortie_m = new highway_exit_manager();
    $sorties = $sortie_m->getList();

    $id_element = $_GET['id_autoroute'];

    $cpt = 0;
    $id_hgw = 0;


    ?>

<link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="js/Liste_portion.js"></script>

    <div class="container">
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Tronçon</th>

                    <th>Ville départ</th>
                    <th>Ville arrivée</th>
                    <th>Km initial</th>
                    <th>Km final</th>
                    <th>État</th>
                    <th>Prix</th>
                    <th>Société </th>
                    <th>
                        <?php
                        if ($_SESSION['connected'] == true) {
                            ?>
                            <button name="add_portion" class="btn btn-xs btn-default">
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

                    foreach ($portions as $tmp_portion) {

                        $id_hgw = $tmp_portion->id_autoroute();

                        if ($tmp_portion->id_autoroute() == $id_element) {
                            $cpt++;

                            ?>
                        <tr name="tr_<?php //echo $tmp_portion->id_autoroute() ?>">
                                <td>
                                    <?php
                                    echo $tmp_portion->code_troncon();
                                    ?>
                                </td>

                                <td>
                                    <?php

                                    $flag = 0;
                                    $cpt = 0;

                                    foreach ($sorties as $tmp_exit) {
                                        if ($tmp_exit->code_troncon() != null) {
                                            if ($tmp_exit->code_troncon() == $tmp_portion->code_troncon()) {
                                                echo $sortie_m->get_nom_city($tmp_exit->id_city());
                                                $flag = $cpt;
                                                break;
                                            }
                                        }

                                        $cpt++;
                                    }
                                    ?>
                                </td>
                                <td>
                                     <?php

                                     $cpt = 0;
                                     foreach ($sorties as $tmp_exit) {
                                         if ($tmp_exit->code_troncon_arrivee() != null) {

                                             if ($tmp_exit->code_troncon_arrivee() == $tmp_portion->code_troncon()) {
                                                 echo $sortie_m->get_nom_city($tmp_exit->id_city());
                                                 break;
                                             }
                                         }

                                         $cpt++;
                                     }

                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $tmp_portion->duKm();
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $tmp_portion->auKm();
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($tmp_portion->ouvert()) {
                                        echo "Ouvert";
                                    } else {
                                        echo "Fermé";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($tmp_portion->payant()) {
                                        echo "Payant";
                                    } else {
                                        echo "Gratuit";
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                        if ($tmp_portion->payant()) {
                                            $portion_m->get_societe($tmp_portion);
                                        } else {
                                            echo "Aucune";
                                        }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($_SESSION['connected'] == true) {
                                        ?>
                                        <input name="id_autoroute_hidden" class="hidden" value="<?php echo $id_hgw; ?>">
                                        <button name="modify_portion" value="<?php echo $tmp_portion->code_troncon(); ?>" class=" btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                                        <button name="remove_portion" value="<?php echo $tmp_portion->code_troncon(); ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></button>
                                        <?php
                                    }
                                    ?>
                                    </td>
                        </tr>



                            <?php

                        }
                            ?>



                        <?php
                    }

                    if ($cpt == 0) {
                        ?>

                        <tr>
                            <td>Aucune donnée à afficher</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <?php
                    }

                    ?>


                    <tr id="data_portion_modify">

                    </tr>

                </tbody>
            </table>


            <input name="no_portion" class="hidden" value="<?php echo $cpt; ?>">
            <input name="id_autoroute_hidden_3" class="hidden" value="<?php echo $id_element; ?>">


        </div>
    </div>



</div>







