
    <?php


    require ('php/highway.php');
    require ('php/highway_manager.php');


    $starting_city = $_POST['starting_city'];
    echo $starting_city;

    $arriving_city = $_POST['arriving_city'];
    echo $arriving_city;

    $name_highway = $_POST['name_highway'];
    echo $name_highway;




    $data = [
        'code_autoroute' => $name_highway
    ];

    $autoroute = new highway($data);
    $autoroute_manager = new highway_manager();

    $autoroute_manager->add($autoroute);



    ?>


<div>Les données ont bien été envoyées vers le serveur.<div>