    <?php

    require ('php/portion.php');
    require ('php/portion_manager.php');

    require ('php/highway_exit.php');
    require ('php/highway_exit_manager.php');

    $portion_m = new portion_manager();
    $portions = $portion_m->getList();


    $city_m = new highway_exit_manager();
    $cities = $city_m->getList();



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
                    <th>
                        <button name="add_portion" class="btn btn-xs btn-default">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
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
                    <tr>

                            <td>
                                <?php
                                echo $tmp_portion->code_troncon();
                                ?>
                            </td>

                            <td>
                                <?php
                                $flag = 0;
                                $cpt = 0;

                                foreach ($cities as $tmp_city) {
                                    if ($tmp_city->code_troncon() == $tmp_portion->code_troncon()) {
                                        echo $tmp_city->nom_ville();
                                        $flag = $cpt;
                                        break;
                                    }
                                    $cpt++;
                                }
                                ?>
                            </td>
                            <td>
                                 <?php

                                 $cpt = 0;
                                 foreach ($cities as $tmp_city) {
                                     if ($tmp_city->code_troncon() == $tmp_portion->code_troncon()) {
                                         if ($cpt != $flag) {
                                             echo $tmp_city->nom_ville();
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
                                <input name="id_autoroute_hidden" class="hidden" value="<?php echo $id_hgw; ?>">
                                <button name="modify_portion" value="<?php echo $tmp_portion->code_troncon(); ?>" class=" btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                                <button name="show_detail_portion" value="<?php echo $tmp_portion->code_troncon(); ?>" class="btn btn-xs btn-default"><span
                                        class="glyphicon glyphicon-align-left"></span></button>
                                <button name="remove_portion" value="<?php echo $tmp_portion->code_troncon(); ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></button>
                            </td>
                    </tr>

                            <?php

                        }
                            ?>

                        <tr id="data_cities_<?php echo $tmp_portion->code_troncon(); ?>">

                        </tr>

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



        </div>
    </div>



</div>







