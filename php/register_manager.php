<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 09/05/2017
 * Time: 00:12
 */

class register_manager {

    private $_db; // Instance de PDO

    public function __construct() {
        $this->setDb();
    }

    public function setDb() {
        $this->_db = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    }

    //good
    public function add(register $table) {

        $q = $this->_db->prepare('INSERT INTO Registre (cause_ferme) VALUES(:cause_ferme)');

        $q->bindValue(':cause_ferme', $table->cause_ferme());

        $q->execute();
    }

    //good
    public function delete(register $table) {
        $this->_db->exec('DELETE FROM Registre WHERE id_registre = '.$table->id_registre());
    }

    //good
    public function exists($info) {

        if (is_string($info) && strlen($info) <= 300) {

            $q = $this->_db->prepare('SELECT COUNT(*) FROM Registre WHERE cause_ferme = :cause_ferme');
            $q->execute([':cause_ferme' => $info]);

        } else if (is_int($info)) {
            $q = $this->_db->prepare('SELECT COUNT(*) FROM Registre WHERE id_registre = :id_registre');
            $q->execute([':id_registre' => $info]);

        }

        return (bool) $q->fetchColumn();
    }

    //not good for string
    public function get($code) {

        if (is_string($code) && strlen($code) <= 300) {
            //not good

            if ($this->exists($code)) {

                echo "cause : " . $code . "trouvé";

                $q = $this->_db->query('SELECT * FROM Registre WHERE cause_ferme ='.$code);

                $data = $q->fetch(PDO::FETCH_ASSOC);

                print_r($data);

                return new register($data);

            } else {
                echo $code . " n'existe pas dans la table.";
                return null;
            }

        } else if (is_int($code)) {
            //good

            if ($this->exists($code)) {

                $q = $this->_db->query('SELECT * FROM Registre WHERE id_registre = '.$code);
                $data = $q->fetch(PDO::FETCH_ASSOC);

                return new register($data);
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
        $tables = [];

        $q = $this->_db->query('SELECT * FROM Registre ORDER BY id_registre');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $tables[] = new register($data);
        }

        return $tables;
    }

    //good
    public function update(register $table) {

        $q = $this->_db->prepare('UPDATE Registre SET cause_ferme = :cause_ferme WHERE id_registre = :id_registre');

        $q->bindValue(':cause_ferme', $table->cause_ferme());
        $q->bindValue(':id_registre', $table->id_registre(), PDO::PARAM_INT);

        $q->execute();
    }

}




?>