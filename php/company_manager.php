<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 12/05/2017
 * Time: 23:00
 */
class company_manager {

    private $_db;

    public function __construct() {
        $this->setDb();
    }

    public function setDb() {
        $this->_db = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    }

    //good
    public function add(company $societe) {

        $q = $this->_db->prepare('INSERT INTO Societe (code_societe, nom_societe, ca_societe) VALUES(:code_societe, :nom_societe, :ca_societe)');

        $q->bindValue(':code_societe', $societe->code_societe(), PDO::PARAM_INT);
        $q->bindValue(':nom_societe', $societe->nom_societe());
        $q->bindValue(':ca_societe', $societe->ca_societe(), PDO::PARAM_INT);

        $q->execute();
    }

    //good
    public function update(company $societe) {

        $q = $this->_db->prepare('UPDATE Societe SET code_societe = :code_societe, nom_societe = :nom_societe, ca_societe = :ca_societe  WHERE id_societe = :id_societe');

        $q->bindValue(':code_societe', $societe->code_societe(), PDO::PARAM_INT);
        $q->bindValue(':nom_societe', $societe->nom_societe());
        $q->bindValue(':ca_societe', $societe->ca_societe(), PDO::PARAM_INT);
        $q->bindValue(':id_societe', $societe->id_societe(), PDO::PARAM_INT);

        $q->execute();
    }

    //good
    public function delete(company $societe) {

        $this->_db->exec('DELETE FROM Societe WHERE id_societe = '.$societe->id_societe());
    }

    //good
    public function exists($info) {

        if (is_string($info) && strlen($info) <= 300) {

            $q = $this->_db->prepare('SELECT COUNT(*) FROM Societe WHERE nom_societe = :nom_societe');
            $q->execute([':nom_societe' => $info]);

        } else if (is_int($info)) {
            $q = $this->_db->prepare('SELECT COUNT(*) FROM Societe WHERE code_societe = :code_societe');
            $q->execute([':code_societe' => $info]);
        }

        return (bool) $q->fetchColumn();
    }

    ////not good for string
    public function get($code) {

        if (is_string($code) && strlen($code) <= 300) {
            //not good

            if ($this->exists($code)) {

                echo "nom_societe : " . $code . " trouvé";

                $q = $this->_db->query('SELECT * FROM Societe WHERE nom_societe ='.$code);

                $data = $q->fetch(PDO::FETCH_ASSOC);

                print_r($data);

                return new company($data);

            } else {
                echo $code . " n'existe pas dans la table.";
                return null;
            }

        } else if (is_int($code)) {
            //good

            if ($this->exists($code)) {

                $q = $this->_db->query('SELECT * FROM Societe WHERE code_societe = '.$code);
                $data = $q->fetch(PDO::FETCH_ASSOC);

                return new company($data);

            } else {
                echo $code . " n'existe pas dans la table.";
                return null;
            }

        } else {
            return null;
        }

    }

    //good
    public function getList() {
        $societes = [];

        $q = $this->_db->query('SELECT * FROM Societe ORDER BY id_societe');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $societes[] = new company($data);
        }

        return $societes;
    }



}