<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 08/05/2017
 * Time: 19:09
 */

class portion_manager {

    private $_db;

    public function __construct() {
        $this->setDb();
    }

    public function setDb() {
        $this->_db = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    }

    public function add(portion $troncon) {

        //print_r($troncon);
        $q = $this->_db->prepare('INSERT INTO Troncon (duKm, auKm, ouvert, payant, id_autoroute) VALUES(:duKm, :auKm, :ouvert, :payant, :id_autoroute)');


        $q->bindValue(':duKm', $troncon->duKm(), PDO::PARAM_INT);
        $q->bindValue(':auKm', $troncon->auKm(), PDO::PARAM_INT);
        $q->bindValue(':ouvert', $troncon->ouvert());
        $q->bindValue(':payant', $troncon->payant());
        $q->bindValue(':id_autoroute', $troncon->id_autoroute());

        $q->execute();
    }

    public function delete(portion $troncon) {
        $this->_db->exec('DELETE FROM Troncon WHERE code_troncon = '.$troncon->code_troncon());
    }

    public function exists($info) {

        $q = $this->_db->prepare('SELECT COUNT(*) FROM Troncon WHERE code_troncon = :code_troncon');
        $q->execute([':code_troncon' => $info]);

        return (bool) $q->fetchColumn();
    }

    public function update(portion $troncon) {

        $q = $this->_db->prepare('UPDATE Troncon SET duKm = :duKm, 
                                                      auKm = :auKm,
                                                      ouvert = :ouvert,
                                                      payant = :payant
                                                      WHERE code_troncon = :code_troncon');

        $q->bindValue(':duKm', $troncon->duKm(), PDO::PARAM_INT);
        $q->bindValue(':auKm', $troncon->auKm(), PDO::PARAM_INT);
        $q->bindValue(':ouvert', $troncon->ouvert());
        $q->bindValue(':payant', $troncon->payant());
        $q->bindValue(':code_troncon', $troncon->code_troncon(), PDO::PARAM_INT);

        $q->execute();
    }

    public function get($code) {

        $code = (int) $code;

        if ($this->exists($code)) {

            $q = $this->_db->query('SELECT * FROM Troncon WHERE code_troncon = '.$code);
            $data = $q->fetch(PDO::FETCH_ASSOC);

            return new portion($data);
        } else {
            echo $code . " n'existe pas dans la table.";
            return null;
        }
    }

    public function getList() {

        $portions = [];

        $q = $this->_db->query('SELECT * FROM Troncon ORDER BY code_troncon');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {

            $portions[] = new portion($data);
        }

        return $portions;
    }

    public function getLast_added() {

        $q = $this->_db->query('SELECT * FROM Troncon ORDER BY code_troncon DESC LIMIT 1');
        $data = $q->fetch(PDO::FETCH_ASSOC);

        return new portion($data);
    }

    public function get_societe(portion $troncon) {

        $q = $this->_db->query('SELECT Societe.nom_societe
                                    FROM Societe
                                    INNER JOIN Peage
                                        ON Societe.id_societe = Peage.id_societe
                                    INNER JOIN Troncon
                                        ON Peage.code_troncon = Troncon.code_troncon
                                    WHERE Troncon.code_troncon = ' . $troncon->code_troncon());


        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            echo $data['nom_societe'];
        }

    }


    public function get_ville_depart(portion $troncon) {


        $q = $this->_db->query('SELECT *
                                    FROM Sortie
                                    INNER JOIN Troncon
                                        ON Sortie.code_troncon = Troncon.code_troncon
                                    WHERE Troncon.code_troncon = ' . $troncon->code_troncon());

        $data = $q->fetch(PDO::FETCH_ASSOC);

        return new highway_exit($data);

    }

    public function get_ville_arrivee(portion $troncon) {

        //$sorties = [];

        $q = $this->_db->query('SELECT *
                                    FROM Sortie
                                    INNER JOIN Troncon
                                        ON Sortie.code_troncon_arrivee = Troncon.code_troncon
                                    WHERE Troncon.code_troncon = ' . $troncon->code_troncon());

        $data = $q->fetch(PDO::FETCH_ASSOC);


        return new highway_exit($data);

    }





}

?>