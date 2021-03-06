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

        $q = $this->_db->prepare('INSERT INTO Autoroute (code_autoroute) VALUES(:code_autoroute)');

                $q->bindValue(':code_autoroute', $autoroute->code_autoroute());

        $q->execute();
    }

    public function delete(highway $autoroute) {
        $this->_db->exec('DELETE FROM Autoroute WHERE id_autoroute = '.$autoroute->id_autoroute());
    }

    public function exists($info) {

        $q = $this->_db->prepare('SELECT COUNT(*) FROM Autoroute WHERE code_autoroute = :code_autoroute');
        $q->execute([':code_autoroute' => $info]);

        return (bool) $q->fetchColumn();
    }

    public function get($code) {

        if (is_string($code) && strlen($code) <= 30) {

            if ($this->exists($code)) {

                //not working
                echo "HEEELP";
                $q = $this->_db->query('SELECT * FROM Autoroute WHERE code_autoroute ='.$code);
                echo "HEEELP";
                //$q->bindValue(':code', $code);

                //$q->execute([':code' => $code]);

                $data = $q->fetch(PDO::FETCH_ASSOC);

                return new highway($data);

            } else {
                echo $code . " n'existe pas dans la table.";
                return null;
            }

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

        $q = $this->_db->prepare('UPDATE Autoroute SET code_autoroute = :code_autoroute WHERE id_autoroute = :id_autoroute');

        $q->bindValue(':code_autoroute', $autoroute->code_autoroute());
        $q->bindValue(':id_autoroute', $autoroute->id_autoroute(), PDO::PARAM_INT);

        $q->execute();
    }




    public function get_troncons(highway $autoroute) {

        $troncons = [];

        $q = $this->_db->query('SELECT *
                                    FROM Troncon
                                    INNER JOIN Autoroute
                                        ON Troncon.id_autoroute = Autoroute.id_autoroute
                                    WHERE Autoroute.id_autoroute = ' . $autoroute->id_autoroute());

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $troncons[] = new portion($data);
        }

        return $troncons;
    }




}


?>