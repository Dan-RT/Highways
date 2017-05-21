    <?php

    $id_autoroute = $_GET['id_autoroute'];


    require ('php/highway_exit.php');
    require ('php/highway_exit_manager.php');
    $city_m = new highway_exit_manager();
    $cities = $city_m->getList();


    require ('php/company.php');
    require ('php/company_manager.php');

    $company_m = new company_manager();
    $companies = $company_m->getList();

    require ('php/city.php');
    require ('php/city_manager.php');

    $city_m = new city_manager();
    $cities = $city_m->getList();

    ?>


    <td>
        <input class="hidden" id="id_autoroute_hidden_2" value="<?php echo $id_autoroute; ?>">
        <input id="code_troncon_hidden" value="X">
        X
    </td>

    <td>
        <select name="starting_city" id="starting_city">
            <option value="0">Sélectionner une ville</option>

            <?php
            foreach ($cities as $tmp_city) {
                ?>
                <option value="<?php echo $tmp_city->id_city(); ?>"><?php echo $tmp_city->nom_ville(); ?></option>
                <?php
            }
            ?>

        </select>
    </td>

    <td>
        <select name="arriving_city" id="arriving_city">
            <option value="0">Sélectionner une ville</option>
            <?php
            foreach ($cities as $tmp_city) {
                ?>
                <option value="<?php echo $tmp_city->id_city(); ?>"><?php echo $tmp_city->nom_ville(); ?></option>
                <?php
            }
            ?>
        </select>
    </td>

    <td>
        <input id="modify_duKm" value="">
    </td>
    <td>
        <input id="modify_auKm" value="">
    </td>

    <td>
        <label class="radio-inline"><input type="radio" name="ouvert" value="1" checked>Ouvert</label>
        <label class="radio-inline"><input type="radio" name="ouvert" value="0">Fermé</label>
    </td>

    <td>
        <label class="radio-inline"><input type="radio" name="payant" value="1">Payant</label>
        <label class="radio-inline"><input type="radio" name="payant" value="0"checked>Gratuit</label>
    </td>

    <td>
        <select name="companies" id="companies">
            <option value="0">Sélectionner une société</option>

            <?php
            foreach ($companies as $tmp_company) {
                ?>
                <option value="<?php echo $tmp_company->id_societe(); ?>"><?php echo $tmp_company->nom_societe(); ?></option>
                <?php
            }
            ?>
        </select>
    </td>



    <td>
        <button name="submit_modif_portion" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
    </td>


    <?php

    echo "TEST";
    ?>

<script src="js/modify_portion.js"></script>