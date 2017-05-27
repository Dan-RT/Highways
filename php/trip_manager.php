<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 22/05/2017
 * Time: 15:08
 */
class trip_manager {

    private $_db; // Instance de PDO

    public function __construct() {
        $this->setDb();
    }

    public function setDb() {
        $this->_db = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    }

    public function add(trip $voyage) {

        $q = $this->_db->prepare('INSERT INTO se_deplacer (id_autoroute, id_city, id_city_Ville, id_voiture) VALUES(:id_autoroute, :id_city, :id_city_2, :id_voiture)');

        $q->bindValue(':id_autoroute', $voyage->id_autoroute());
        $q->bindValue(':id_city', $voyage->id_city());
        $q->bindValue(':id_city_2', $voyage->id_city_2());
        $q->bindValue(':id_voiture', $voyage->id_voiture());

        $q->execute();
    }

    public function delete(trip $voyage) {
        $this->_db->exec('DELETE FROM se_deplacer WHERE id_deplacement = '.$voyage->id_deplacement());
    }

    public function update(trip $voyage) {

        $q = $this->_db->prepare('UPDATE se_deplacer SET id_autoroute = :id_autoroute, id_city = :id_city, id_city_Ville = :id_city_2, id_voiture = :id_voiture  WHERE id_deplacement = :id_deplacement');

        $q->bindValue(':id_autoroute', $voyage->id_autoroute());
        $q->bindValue(':id_city', $voyage->id_city());
        $q->bindValue(':id_city_2', $voyage->id_city_2());
        $q->bindValue(':id_voiture', $voyage->id_voiture());
        $q->bindValue(':id_deplacement', $voyage->id_deplacement(), PDO::PARAM_INT);

        $q->execute();
    }

    public function getList() {
        $trips = [];

        $q = $this->_db->query('SELECT * FROM se_deplacer ORDER BY id_deplacement');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $trips[] = new trip($data);
        }

        return $trips;
    }

    public function get_name_city(trip $voyage) {


        $q = $this->_db->query('SELECT Ville.nom_ville
                                    FROM Ville
                                    INNER JOIN se_deplacer
                                        ON Ville.id_city = se_deplacer.id_city
                                    WHERE se_deplacer.id_deplacement = ' . $voyage->id_deplacement());

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            echo $data['nom_ville'];
        }

    }

    public function get_name_city_Ville(trip $voyage) {


        $q = $this->_db->query('SELECT Ville.nom_ville
                                    FROM Ville
                                    INNER JOIN se_deplacer
                                        ON Ville.id_city = se_deplacer.id_city_Ville
                                    WHERE se_deplacer.id_deplacement = ' . $voyage->id_deplacement());

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            echo $data['nom_ville'];
        }

    }


    public function get_autoroute_name(trip $voyage) {


        $q = $this->_db->query('SELECT Autoroute.code_autoroute
                                    FROM Autoroute
                                    INNER JOIN se_deplacer
                                        ON Autoroute.id_autoroute = se_deplacer.id_autoroute
                                    WHERE se_deplacer.id_deplacement = ' . $voyage->id_deplacement());

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            echo $data['code_autoroute'];
        }

    }



}