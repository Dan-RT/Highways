<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 06/05/2017
 * Time: 20:12
 */

class highway_manager {

    private $_db; // Instance de PDO

    public function __construct() {
        $this->setDb();
    }

    public function setDb() {
        $this->_db = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    }

    public function add(highway $autoroute) {

        $q = $this->_db->prepare('INSERT INTO Autoroute (code_autoroute, id_registre, code_societe) VALUES(:code_autoroute, :id_registre, :code_societe)');

                $q->bindValue(':code_autoroute', $autoroute->code_autoroute());
                $q->bindValue(':id_registre', $autoroute->id_registre(), PDO::PARAM_INT);
                $q->bindValue(':code_societe', $autoroute->code_societe(), PDO::PARAM_INT);

        $q->execute();
    }

    public function delete(highway $autoroute) {
        $this->_db->exec('DELETE FROM Autoroute WHERE code_autoroute = '.$autoroute->code_autoroute());
    }

    public function get($code) {

        if (is_string($code) && strlen($code) <= 30) {

            $q = $this->_db->query('SELECT * FROM Autoroute WHERE code_autoroute = '.$code);
            $data = $q->fetch(PDO::FETCH_ASSOC);

            return new highway($data);

        } else {
            return null;
        }

    }

    public function getList() {
        $autoroutes = [];

        $q = $this->_db->query('SELECT * FROM Autoroute ORDER BY code_autoroute');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $autoroutes[] = new highway($data);
        }

        return $autoroutes;
    }

    public function update(highway $autoroute) {

        $q = $this->_db->prepare('UPDATE Autoroute SET id_registre = :id_registre, code_societe = :code_societe WHERE code_autoroute = :code_autoroute');


        $q->bindValue(':id_registre', $autoroute->id_registre(), PDO::PARAM_INT);
        $q->bindValue(':code_societe', $autoroute->code_societe(), PDO::PARAM_INT);

        $q->execute();
    }



}


?>