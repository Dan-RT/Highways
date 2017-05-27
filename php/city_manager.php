<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 06/05/2017
 * Time: 21:21
 */


class city_manager {

    private $_db;

    public function __construct() {
        $this->setDb();
    }

    public function setDb() {
        $this->_db = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    }

    public function add(city $ville) {


        $q = $this->_db->prepare('INSERT INTO Ville (code_postal, nom_ville) VALUES(:code_postal, :nom_ville)');

        $q->bindValue(':code_postal', $ville->code_postal(), PDO::PARAM_INT);
        $q->bindValue(':nom_ville', $ville->nom_ville());

        $q->execute();
    }

    public function delete(city $ville) {
        $this->_db->exec('DELETE FROM Ville WHERE id_city = '.$ville->id_city());
    }

    public function exists($info) {

        if (is_int($info)) {
            return (bool) $this->_db->query('SELECT COUNT(*) FROM Ville WHERE id_city = '.$info)->fetchColumn();
        }

        $q = $this->_db->prepare('SELECT COUNT(*) FROM Ville WHERE nom_ville = :nom_ville');
        $q->execute([':nom_ville' => $info]);

        return (bool) $q->fetchColumn();
    }

    public function get($code) {

        $code = (int) $code;

        if ($this->exists($code)) {

            $q = $this->_db->query('SELECT * FROM Ville WHERE id_city = '.$code);
            $data = $q->fetch(PDO::FETCH_ASSOC);

            return new city($data);
        } else {
            echo $code . " n'existe pas dans la table.";
            return null;
        }
    }

    public function getList() {

        $ville = [];

        $q = $this->_db->query('SELECT * FROM Ville ORDER BY id_city');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {

            $ville[] = new city($data);
        }

        return $ville;
    }

    public function update(city $ville) {

        $q = $this->_db->prepare('UPDATE Ville SET nom_ville = :nom_ville, code_postal = :code_postal  WHERE id_city = :id_city');


        $q->bindValue(':nom_ville', $ville->nom_ville());
        $q->bindValue(':code_postal', $ville->code_postal());
        $q->bindValue(':id_city', $ville->id_city(), PDO::PARAM_INT);

        $q->execute();
    }

}


?>