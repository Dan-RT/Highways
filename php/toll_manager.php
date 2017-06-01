<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 12/05/2017
 * Time: 23:41
 */
class toll_manager {

    private $_db;

    public function __construct() {
        $this->setDb();
    }

    public function setDb() {
        $this->_db = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    }

    //good
    public function add(toll $peage) {

        $q = $this->_db->prepare('INSERT INTO Peage (pg_au_km, pg_du_km, prix, code_troncon, id_societe) VALUES(:pgAuKm, :pgDuKm, :prix, :code_troncon, :id_societe)');

        $q->bindValue(':pgAuKm', $peage->pgAuKm());
        $q->bindValue(':pgDuKm', $peage->pgDuKm());
        $q->bindValue(':prix', $peage->prix());
        $q->bindValue(':code_troncon', $peage->code_troncon());
        $q->bindValue(':id_societe', $peage->id_societe());

        $q->execute();
    }

    //good
    public function update(toll $peage) {

        $q = $this->_db->prepare('UPDATE Peage SET pg_au_km = :pgAuKm, pg_du_km = :pgDuKm, prix = :prix, code_troncon = :code_troncon, id_societe = :id_societe   WHERE id_peage = :id_peage');

        $q->bindValue(':pgAuKm', $peage->pgAuKm());
        $q->bindValue(':pgDuKm', $peage->pgDuKm());
        $q->bindValue(':prix', $peage->prix());
        $q->bindValue(':code_troncon', $peage->code_troncon());
        $q->bindValue(':id_societe', $peage->id_societe());
        $q->bindValue(':id_peage', $peage->id_peage());

        $q->execute();
    }

    //good
    public function delete(toll $peage) {
        $this->_db->exec('DELETE FROM Peage WHERE id_peage = '.$peage->id_peage());
    }

    //good
    public function exists($info) {

        if (is_int($info)) {
            $q = $this->_db->prepare('SELECT COUNT(*) FROM Peage WHERE id_peage = :id_peage');
            $q->execute([':id_peage' => $info]);
        }

        return (bool) $q->fetchColumn();
    }

    public function exists_troncon($info) {

        if ($info) {
            $q = $this->_db->prepare('SELECT COUNT(*) FROM Peage WHERE code_troncon = :code_troncon');
            $q->execute([':code_troncon' => $info]);
        }

        return (bool) $q->fetchColumn();
    }

    //good
    public function get($code) {

        if (is_int($code)) {

            if ($this->exists($code)) {

                $q = $this->_db->query('SELECT * FROM Peage WHERE id_peage = '.$code);
                $data = $q->fetch(PDO::FETCH_ASSOC);

                return new toll($data);

            } else {
                //echo $code . " n'existe pas dans la table.";
                return null;
            }

        } else {
            echo "Wrong format, needs integer.";
            return null;
        }
    }

    public function get_by_troncon($code) {

        if ($code) {

            if ($this->exists_troncon($code)) {

                $q = $this->_db->query('SELECT * FROM Peage WHERE code_troncon = '.$code);
                $data = $q->fetch(PDO::FETCH_ASSOC);

                return new toll($data);

            } else {
                //echo $code . " n'existe pas dans la table.";
                return null;
            }

        } else {
            //echo "Wrong format, needs integer.";
            return null;
        }
    }

    //good
    public function getList() {
        $peages = [];

        $q = $this->_db->query('SELECT * FROM Peage ORDER BY id_peage');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $peages[] = new toll($data);
        }

        return $peages;
    }

}