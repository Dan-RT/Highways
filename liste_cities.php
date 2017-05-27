    <?php


    echo "TEST";

    echo "Id_portion : " . $_GET['id_portion'];


    $portion_m = new portion_manager();
    $portion = $portion_m->get($_GET['id_portion']);

    $city_m = new highway_exit_manager();
    $cities = $city_m->getList();

    foreach ($cities as $tmp_city) {
        if ($tmp_city->code_troncon() == $portion->code_troncon()) {
            echo $tmp_city->nom_ville();
        }
    }
    ?>