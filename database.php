<?php

function query_database($SQLCommand, $var = null) {

    if (!$var) {

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
            $reponse = $bdd->query($SQLCommand);

            /*  check for existing id   */

                $data = $reponse;

                /*if ($data->fetch() != null) {
                    //echo "données trouvées";
                } else {
                    //echo "rien n'a renvoyer";
                }*/

            if ($reponse != NULL) {
                return $reponse;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    } else {

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');

            $reponse = $bdd->prepare($SQLCommand);
            $reponse->execute(array($var));

            return $reponse;

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

}


function insert_highway ($starting_city, $arriving_city, $name_highway) {

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->prepare('INSERT INTO Autoroute (english, spanish, french) 
VALUES(:starting_city, :arriving_city, :name_highway)');



    $req->execute(array('starting_city' => $starting_city,
        'arriving_city' => $arriving_city,
        'name_highway' => $name_highway));

    $req->closeCursor();
}

?>

